@extends('dondepauto::website.base')

@section('navbar-bg', 'bg-opaque')

@section('title', config('app.name').' - Nuestra visión del marketing y la publicidad')

@section('content')
    <?php $total  = DondePauto\Models\Extras\Blog::count(); ?>
    <?php $ultimo = DondePauto\Models\Extras\Blog::orderBy('created_at', 'desc')->first(); ?>
    <div class="row blogs-content">
        <div class="col-12">
            <div class="text-center">
                <h1 class="h1">Blog</h1>
                <h2 class="h2">Nuestra visión del marketing y la publicidad</h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="text-center" style="width: 100%;">
                <div class="row text-left" style="width: calc(100% - 60px); margin: 0 30px;">
                    <div class="col-12">
                        <img src="//files.dondepauto.co/{{ $ultimo->miniatura }}" style="width: 100%; margin-bottom: 15px;">
                        <div class="fecha" style="margin-bottom: 5px; font-size: 15px; color: {{ config('dondepauto.colores.gray') }};">
                            {{ $ultimo->fecha }}
                        </div>
                        <h2 class="h2" style="font-size: 25px; color: {{ config('dondepauto.colores.darkgray') }};">
                            {{ $ultimo->titulo }}
                        </h2>
                        <div style="margin-bottom: 10px; font-size: 16px;">{{ $ultimo->resumen }}</div>
                        <a href="/blog/{{ $ultimo->slug }}" type="button" class="btn btn-lg btn-danger btn-leer">
                            <b>Leer</b>
                        </a>
                    </div>
                </div>
                <img src="images/home/icon-blog.png" class="header-icon">
                <h2 class="h2" style="font-size: 25px; line-height: 27px; color: {{ config('dondepauto.colores.lightblue') }};">
                    Artículos anteriores
                </h2>
                <div class="row">
                    @foreach( DondePauto\Models\Extras\Blog::ultimos($total, $ultimo->id) as $blog )
                        <div class="col-12 col-sm-6">
                            <div class="card card-blog">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="card-img-top" style="background-image: url(//files.dondepauto.co/{{ $blog->miniatura }});"></div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="card-body">
                                            <div class="fecha">{{ $blog->fecha }}</div>
                                            <div class="card-title">
                                                <b>{{ $blog->titulo }}</b>
                                            </div>
                                            <a href="/blog/{{ $blog->slug }}" type="button" class="btn btn-danger btn-leer">
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
@endsection

@section('css')
<style type="text/css">
    .main {
        background-color: {{ config('dondepauto.colores.lightgray') }};
    }
    .blogs-content {
        width: 100vw;
        max-width: 992px;
        margin: 15px -15px;
        padding: 15px 0;
    }
    .blogs-content>.container-fluid {
        margin-top: 12px;
        padding: 15px;
        font-size: 12px;
        background-color: white;
        position: relative;
    }
    .blogs-content .h1,
    .blogs-content .h2 {
        color: {{ config('dondepauto.colores.gray') }};
    }
    .blogs-content .h1 {
        font-size: 24px;
        line-height: 26px;
    }
    .blogs-content .h2 {
        font-size: 14px;
        line-height: 16px;
    }
    .btn-leer {
        width: 150px;
    }
    @media(min-width: 576px) {
        .blogs-content {
            width: 100%;
            margin: 0 auto;
            margin-top: 125px;
            margin-bottom: 15px;
        }
        .blogs-content>.container-fluid {
            margin-top: 24px;
            padding: 25px;
            font-size: 14px;
        }
        .blogs-content .h1 {
            font-size: 48px;
            line-height: 52px;
        }
        .blogs-content .h2 {
            font-size: 18px;
            line-height: 20px;
        }
    }
</style>
@endsection
