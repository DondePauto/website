@extends('dondepauto::website.base')

@section('content')
    <div class="row text-center full-viewport vertical-center" id="banner-buscar">
        <div class="full-width vertical-center-content">
            <h1 class="heading">
                <span>Encuentra los mejores</span>
                <span><br>espacios de pauta para tu marca o producto</span>
            </h1>
            <div id="form">
                <div class="input-group input-group-lg">
                    <input type="text" placeholder="Busca aquí" class="form-control" id="palabra">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger" id="btn-buscar">
                            <i class="fa fa-fw fa-lg fa-search fa-flip-horizontal d-block d-sm-none"></i>
                            <b class="d-none d-sm-block">Buscar</b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center full-viewport vertical-center" id="banner-info">
        <div class="full-width vertical-center-content">
            <img src="images/home/icon-info.png">
            <h2>Haz crecer tu negocio con publicidad efectiva</h2>
            <p>En DóndePauto encuentras los medios publicitarios más efectivos para tu negocio y asesoría especializada para que llegues a tus verdaderos clientes.</p>
            <p>Contamos con más de 800 espacios de pauta en todo Colombia para que puedas dar a conocer tu empresa y aumentar la confianza de los clientes que ya te conocen.</p>
        </div>
    </div>
    <div class="row text-center full-viewport vertical-center" id="banner-registrar">
        <div class="full-width vertical-center-content">
            <div class="heading">
                <span>Haz crecer tu negocio</span>
                <span><br>pautando en los mejores espacios publicitarios</span>
            </div>
            <a href="/registro" type="button" class="btn btn-lg btn-orange" id="btn-registrar">
                <span>¡Registrarme ya!</span> <i class="fa fa-fw fa-chevron-right"></i>
            </a><br>
            <a href="#" id="btn-medios">¿Quieres ofertar tus espacios en DondePauto?</a>
        </div>
    </div>
    <div class="row text-center" id="espacios-destacados">
        <div class="full-width">
            <img src="images/home/icon-destacados.png">
            <h2>Los espacios más destacados</h2>
            <div class="row">
                @foreach( DondePauto\Models\Espacio::destacados() as $espacio )
                    <div class="col-6 col-sm-3">
                        <div class="card espacio">
                            <div class="card-img-top" style="background-image:url(//files.dondepauto.co/{{ $espacio->miniatura }});"></div>
                            <div class="card-body text-center">
                                <div class="card-title">{{ $espacio->titulo }}</div>
                                <hr class="card-separator">
                                <div class="categoria">{{ $espacio->data->categoria->nombre }}</div>
                                <a href="/espacios/{{ $espacio->slug }}" type="button" class="btn btn-sm btn-danger">
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

@section('javascript')
<script type="text/javascript">
    /* global $ */
    document.addEventListener('DOMContentLoaded', function(event) {
        $(function() {
            $(window).resize(function() {
                $('.espacio .card-img-top').css('minHeight', $('.espacio .card-img-top').width());
                $('.espacio .card-img-top').css('maxHeight', $('.espacio .card-img-top').width());
            }).resize();
        });
    });
</script>
@endsection

@section('css')
<style type="text/css">
    a[type=button] {
        -webkit-appearance: none;
    }
    [id^=banner-] {
        height: calc(100vh - 45px);
        background-color: lightgray;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    [id^=banner-] .full-width {
        width: calc(100vw - 30px);
        padding: 0 15px;
    }
    .heading {
        font-size: 2.25rem;
        font-weight: bold;
        line-height: 2.25rem;
        text-transform: uppercase;
        text-shadow: 3px 3px 12px rgba(0, 0, 0, 0.7);
    }
    .heading span:last-of-type {
        font-size: 1.5rem;
        line-height: 1.5rem;
        text-transform: none;
    }
    h2 {
        font-size: 1.75rem;
        font-weight: bold;
    }
    #banner-buscar,
    #banner-registrar {
        color: white;
    }
    #banner-buscar {
        background-image: url(images/home/banner-buscar.png);
    }
    #banner-info {
        background-image: url(images/home/banner-info.png);
    }
    #banner-registrar {
        height: 75vh;
        background-image: url(images/home/banner-registrar.png);
    }
    #banner-buscar #form {
        margin-top: 45px;
    }
    #banner-info img,
    #espacios-destacados .full-width>img {
        max-width: 100%;
        margin-bottom: 15px;
    }
    #banner-info h2 {
        color: {{ config('dondepauto.colores.lightblue') }};
    }
    #banner-registrar .heading {
        text-transform: none;
    }
    #banner-registrar #btn-registrar,
    #espacios-destacados #btn-buscar-espacios {
        margin: 20px auto;
        font-size: 16px;
        font-weight: bold;
        color: white;
    }
    #banner-registrar #btn-medios {
        padding: 2.5px;
        color: white;
        text-decoration: underline;
        display: inline-block;
    }
    #espacios-destacados .full-width {
        padding: 15px;
    }
    #espacios-destacados h2 {
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
        height: 49px;
        max-height: 49px;
        margin: 5px 5px 0;
        font-size: 16px;
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
        height: 29px;
        max-height: 29px;
        font-size: 14px;
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
    @media(max-width:576px) {
        #banner-buscar {
            background-position-x: 100%;
        }
        #banner-registrar .heading span:last-of-type {
            font-size: 1.25rem;
        }
    }
    @media(min-width:576px) {
        [id^=banner-] {
            height: 100vh;
        }
        [id^=banner-] .full-width {
            width: calc(100vw - 120px);
            padding: 0 60px;
        }
        .heading {
            font-size: 3.25rem;
            line-height: 3.25rem;
        }
        .heading span:last-of-type {
            font-size: 2.25rem;
            line-height: 2.25rem;
        }
        h2 {
            margin-bottom: 30px;
            font-size: 2.75rem;
        }
        #banner-buscar #form {
            width: 75%;
            margin: 45px 12.5% 0;
        }
        #banner-info p {
            font-size: 1.5rem;
        }
        #banner-registrar #btn-registrar,
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
