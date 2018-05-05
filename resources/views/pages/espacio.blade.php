@extends('dondepauto::website.base')

@section('navbar-bg', 'bg-opaque')

@section('title', config('app.name').' - '.$espacio->titulo)
@section('image', '//files.dondepauto.co/'.$espacio->miniatura)

@section('content')
    <div class="row espacio-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <h1 class="h1">{{ $espacio->titulo }}</h1>
                    <div id="aviso">* La información de este producto es de referencia. Siempre tendrás la opción de modificar cantidades, tiempos y frecuencias de acuerdo a tus necesidades.</div>
                </div>
            </div>

            @include('dondepauto::website.partials.espacio.imagenes')
            @include('dondepauto::website.partials.espacio.informacion-basica')
            @include('dondepauto::website.partials.espacio.audiencias')
            @include('dondepauto::website.partials.espacio.restricciones')
            @include('dondepauto::website.partials.espacio.descripcion')
            @include('dondepauto::website.partials.espacio.etiquetas')

            @include('dondepauto::website.partials.espacio.sidebar')
            @include('dondepauto::website.partials.espacio.footer')
        </div>
    </div>

    <div class="full-width" id="espacios-relacionados">
        <h2 class="h2 text-center">Espacios relacionados</h2>
        <div class="row">
            @foreach( $espacio->relacionados() as $relacionado )
                <div class="col-6 col-sm-3">
                    <div class="card card-espacio">
                        <div class="card-img-top" style="background-image:url(//files.dondepauto.co/{{ $relacionado->miniatura }});"></div>
                        <div class="card-body text-center">
                            <div class="card-title">{{ $relacionado->titulo }}</div>
                            <hr class="card-separator">
                            <div class="categoria">{{ $relacionado->data->categoria==null ? '' : $relacionado->data->categoria->nombre }}</div>
                            <a href="/espacios/{{ $relacionado->slug }}" type="button" class="btn btn-danger btn-ver-mas">
                                <b>Ver más</b>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('dondepauto::website.partials.banner-contactanos')
@endsection

@section('css')
<style type="text/css">
    .main {
        background-color: {{ config('dondepauto.colores.lightgray') }};
    }
    .espacio-content {
        width: 100vw;
        max-width: 992px;
        margin: 15px -15px;
        padding: 15px 0;
        background-color: white;
    }
    .espacio-content>.container-fluid {
        position: relative;
    }
    .espacio-content .h1 {
        font-size: 1.5rem;
        line-height: 1.75rem;
    }
    .espacio-content #aviso {
        font-size: 12px;
    }
    .espacio-content .section-header {
        width: calc(100% - 30px);
        margin: 15px 15px 5px;
        padding: 10px;
        font-weight: bold;
    }
    .espacio-content .section-header:not(.lightblue) {
        background-color: {{ config('dondepauto.colores.lightgray') }};
    }
    .espacio-content .section-header:not(.lightblue) .fa {
        color: {{ config('dondepauto.colores.lightblue') }};
    }
    .espacio-content .section-header.lightblue {
        color: white;
        background-color: {{ config('dondepauto.colores.lightblue') }};
    }
    .espacio-content .section-content {
        margin-top: 5px;
        margin-bottom: 10px;
        font-size: 12px;
    }
    #espacios-relacionados {
        margin: 0 -15px;
        padding: 15px;
        background-color: white;
    }
    #espacios-relacionados .h2 {
        margin-bottom: 15px;
        font-size: 1.25rem;
        line-height: 1.5rem;
    }
    #espacios-relacionados .row {
        margin-right: -7.5px;
        margin-left: -7.5px;
    }
    #espacios-relacionados .row>div {
        padding: 0 7.5px;
    }
    @media(min-width: 576px) {
        .espacio-content {
            width: 100%;
            margin: 0 auto;
            margin-top: 125px;
            margin-bottom: 15px;
        }
        .espacio-content .h1 {
            font-size: 2rem;
            line-height: 2.25rem;
        }
        .espacio-content .section-header {
            width: calc(66.6666% - 30px);
        }
        .espacio-content .section-content {
            font-size: 14px;
        }
        #espacios-relacionados .h2 {
            font-size: 1.75rem;
            line-height: 2rem;
        }
        #espacios-relacionados .row {
            margin-right: calc(5% - 7.5px);
            margin-left: calc(5% - 7.5px);
        }
    }
</style>
@endsection
