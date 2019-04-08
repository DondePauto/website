@extends('dondepauto::website.base')

@section('navbar-bg', 'bg-opaque')

@section('title', config('app.name').' - '.$blog->titulo)
@section('image', '//s3.amazonaws.com/3387999ee42855936824-files/'.$blog->miniatura)

@section('content')
    <?php $CURRENT_URL = preg_replace('/https?:\/\//', '', request()->fullUrl()); ?>
    <div class="row blog-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <img src="//s3.amazonaws.com/3387999ee42855936824-files/{{ $blog->miniatura }}" style="width: 100%; margin-bottom: 7.5px;">
                    <div class="text-left" style="margin: 7.5px 0; color: #888;">{{ $blog->fecha }}</div>
                    <h1 class="h1">{{ $blog->titulo }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-8 section-content">
                    {!! $blog->contenido !!}
                    <hr>
                    <div class="row" id="blog-pagination">
                        <div class="col-6 col-sm-5">
                            @if( $blog->anterior() )
                                <a type="button" class="btn btn-danger" href="/blog/{{ $blog->anterior()->slug }}">
                                    <i class="fa fa-fw fa-chevron-left"></i>
                                    <span class="d-inline d-sm-none">Anterior</span>
                                    <span class="d-none d-sm-inline">Artículo anterior</span>
                                </a>
                            @endif
                        </div>
                        <div class="col-6 col-sm-5 offset-sm-2 text-right">
                            @if( $blog->siguiente() )
                                <a type="button" class="btn btn-danger" href="/blog/{{ $blog->siguiente()->slug }}">
                                    <span class="d-inline d-sm-none">Siguiente</span>
                                    <span class="d-none d-sm-inline">Artículo siguiente</span>
                                    <i class="fa fa-fw fa-chevron-right"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="sidebar-panel text-center" id="sidebar-compartir">
                        <b>Compartir este artículo</b><br><br>
                        <?php $body    = $blog->titulo.'%0A%0A'.request()->fullUrl(); ?>
                        <?php $subject = 'Hola! Te comparto este artículo'; ?>
                        <a href="//facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}" target="_blank" class="btn-share">
                            <i class="fa fa-fw fa-3x fa-facebook text-lightblue"></i>
                        </a>
                        <a href="//twitter.com/intent/tweet?text={{ $body }}&via=Dondepauto" target="_blank" class="btn-share">
                            <i class="fa fa-fw fa-3x fa-twitter text-lightblue"></i>
                        </a>
                        <a href="mailto:@?subject={{ $subject }}&body={{ $body }}" target="_blank" class="btn-share">
                            <i class="fa fa-fw fa-3x fa-envelope text-lightblue"></i>
                        </a>
                    </div>
                    <div class="sidebar-panel text-center" id="sidebar-registro">
                        <a href="{{ config('app.url') }}/registro?redirect={{ $CURRENT_URL }}">
                            <b style="font-size: 15px;">Si estás buscando pautar</b><br>
                            <b style="font-size: 25px;">REGÍSTRATE YA</b>
                        </a>
                    </div>
                    <div class="sidebar-panel text-left" id="sidebar-recientes">
                        <h2 class="h2 text-center text-lightblue">Artículos recientes</h2>
                        <div class="row">
                            @foreach( DondePauto\Models\Extras\Blog::ultimos(4, $blog->id) as $reciente )
                                <div class="col-12">
                                    <div class="card card-blog">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-img-top" style="background-image: url(//s3.amazonaws.com/3387999ee42855936824-files/{{ $reciente->miniatura }});"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="card-body">
                                                    <div class="fecha">{{ $reciente->fecha }}</div>
                                                    <div class="card-title">
                                                        <b>{{ $reciente->titulo }}</b>
                                                    </div>
                                                    <a href="/blog/{{ $reciente->slug }}" type="button" class="btn btn-danger btn-leer">
                                                        <b>Leer</b>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BOTON DE ASESORIA --}}
    <button type="button" class="btn btn-success btn-fab" id="btn-soporte" data-toggle="modal" data-target="#modal-asesoria">
        <img src="/images/icon-soporte.png" data-toggle="tooltip" data-placement="left" title="Solicitar asesoría">
    </button>

    {{-- MODALS --}}
    @include('dondepauto::website.modals.asesoria')
    @if( !auth()->check() )
        @include('dondepauto::website.modals.home-registro')
    @endif
    @include('dondepauto::website.modals.login')
    @include('dondepauto::website.modals.reset-password')
@endsection

@section('css')
<style type="text/css">
    .main {
        background-color: {{ config('dondepauto.colores.lightgray') }};
    }
    .blog-content {
        width: 100vw;
        max-width: 992px;
        margin: 15px -15px;
        padding: 15px 0;
        background-color: white;
    }
    .blog-content>.container-fluid {
        position: relative;
    }
    .blog-content .h1 {
        font-size: 1.5rem;
        line-height: 1.75rem;
    }
    .blog-content .h2 {
        font-size: 1.25rem;
        line-height: 1.5rem;
    }
    .blog-content .section-content {
        margin-top: 5px;
        margin-bottom: 10px;
        font-size: 14px;
        text-align: justify;
    }
    .sidebar-panel {
        margin: 15px 0;
        padding: 15px;
        font-size: 12px;
        border-radius: 5px;
        background-color: {{ config('dondepauto.colores.lightgray') }};
    }
    #blog-pagination a {
        width: 100%;
    }
    #sidebar-compartir .btn-share {
        text-decoration: none;
    }
    #sidebar-registro {
        background-color: {{ config('dondepauto.colores.orange') }};
    }
    #sidebar-registro a {
        color: white;
        text-decoration: none;
    }
    #sidebar-recientes {
        background: transparent;
    }
    #sidebar-recientes .h2 {
        padding-bottom: 10px;
    }
    #sidebar-recientes .card-blog {
        margin-bottom: 15px;
    }
    #sidebar-recientes .card-blog .card-body {
        left: 0;
    }
    #sidebar-recientes .card-blog .card-title {
        height: auto;
        max-height: unset;
    }
    @media(min-width: 576px) {
        .blog-content {
            width: 100%;
            margin: 0 auto;
            margin-top: 125px;
            margin-bottom: 15px;
        }
        .blog-content>.container-fluid {
            padding: 30px 45px;
        }
        .blog-content .h1 {
            font-size: 2rem;
            line-height: 2.25rem;
        }
        .blog-content .section-content {
            padding: 0 15px;
            font-size: 16px;
        }
    }
</style>
@endsection
