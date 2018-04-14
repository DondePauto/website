@extends('dondepauto::website.base')

@section('content')
    @include('dondepauto::website.partials.home.banner-buscar')

    @include('dondepauto::website.partials.home.banner-info')

    @include('dondepauto::website.partials.home.banner-registrar')

    <div class="row text-center" id="espacios-destacados">
        <div class="full-width">
            <img src="images/home/icon-destacados.png" class="header-icon">
            <h2 class="h2">Los espacios más destacados</h2>
            <div class="row">
                @foreach( DondePauto\Models\Espacio::destacados() as $espacio )
                    <div class="col-6 col-sm-3">
                        <div class="card espacio">
                            <div class="card-img-top" style="background-image:url(//files.dondepauto.co/{{ $espacio->miniatura }});"></div>
                            <div class="card-body text-center">
                                <div class="card-title">{{ $espacio->titulo }}</div>
                                <hr class="card-separator">
                                <div class="categoria">{{ $espacio->data->categoria->nombre }}</div>
                                <a href="/espacios/{{ $espacio->slug }}" type="button" class="btn btn-danger">
                                    <b>Ver más</b>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="/buscar" type="button" class="btn btn-lg btn-danger" id="btn-buscar-espacios">
                <span>Conoce nuestros espacios</span> <i class="fa fa-fw fa-chevron-right"></i>
            </a><br>
        </div>
    </div>
@endsection

@section('css')
<style type="text/css">
    .home .h1 {
        text-transform: uppercase;
        text-shadow: 3px 3px 12px rgba(0, 0, 0, 0.7);
    }
    .home .h1 span:last-of-type {
        font-size: 1.5rem;
        line-height: 1.5rem;
        text-transform: none;
    }
    #espacios-destacados #btn-buscar-espacios {
        margin: 20px auto;
        font-size: 16px;
        font-weight: bold;
        color: white;
    }
    #espacios-destacados .full-width {
        padding: 15px;
    }
    #espacios-destacados .h2 {
        margin-bottom: 15px;
    }
    #espacios-destacados .row {
        margin-right: -7.5px;
        margin-left: -7.5px;
    }
    #espacios-destacados .row>div {
        padding: 0 7.5px;
    }
    #espacios-destacados .espacio {
        min-height: 260px;
        margin-bottom: 15px;
        padding: 5px;
        background-color: lightgray;
    }
    #espacios-destacados .espacio .card-img-top {
        background-color: lightgray;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    #espacios-destacados .espacio .card-body {
        padding: 5px 0;
        position: relative;
    }
    #espacios-destacados .espacio .card-title {
        height: 55px;
        max-height: 55px;
        margin: 5px 5px 0;
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
        text-overflow: ellipsis;
        display: block;
        display: -webkit-box;
        overflow: hidden;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
    #espacios-destacados .espacio .card-separator {
        width: 80%;
        margin: 10px 10%;
    }
    #espacios-destacados .espacio .categoria {
        height: 33px;
        max-height: 33px;
        font-size: 16px;
        line-height: 1;
        text-overflow: ellipsis;
        display: block;
        display: -webkit-box;
        overflow: hidden;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    #espacios-destacados .espacio a {
        margin-top: 15px;
    }
    @media(min-width:576px) {
        .home .h1 span:last-of-type {
            font-size: 2.25rem;
            line-height: 2.25rem;
        }
        .home .h2 {
            margin-bottom: 30px;
        }
        #espacios-destacados #btn-buscar-espacios {
            margin: 50px auto;
            font-size: 25px;
        }
        #espacios-destacados .row {
            margin-right: calc(5% - 7.5px);
            margin-left: calc(5% - 7.5px);
        }
    }
</style>
@endsection
