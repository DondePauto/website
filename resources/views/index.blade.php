@extends('dondepauto::website.base')

@section('content')
    <div class="row text-center full-viewport vertical-center" id="banner-buscar">
        <div class="full-width vertical-center-content">
            <h1>
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
@endsection

@section('css')
<style type="text/css">
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
    #banner-buscar {
        color: white;
        background-image: url(images/home/banner-buscar.png);
    }
    #banner-buscar h1 {
        font-size: 2.25rem;
        font-weight: bold;
        line-height: 2.25rem;
        text-transform: uppercase;
    }
    #banner-buscar h1 span:last-of-type {
        font-size: 1.5rem;
        line-height: 1.5rem;
        text-transform: none;
    }
    #banner-buscar #form {
        margin-top: 45px;
    }
    #banner-info {
        background-image: url(images/home/banner-info.png);
    }
    #banner-info img {
        max-width: 100%;
        margin-bottom: 15px;
    }
    #banner-info h2 {
        font-size: 1.75rem;
        font-weight: bold;
        color: {{ config('dondepauto.colores.lightblue') }};
    }
    @media(max-width:576px) {
        #banner-buscar {
            background-position-x: 100%;
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
        #banner-buscar h1 {
            font-size: 3.25rem;
            line-height: 3.25rem;
            text-shadow: 3px 3px 12px rgba(0, 0, 0, 0.7);
        }
        #banner-buscar h1 span:last-of-type {
            font-size: 2.25rem;
            line-height: 2.25rem;
        }
        #banner-buscar #form {
            width: 75%;
            margin: 45px 12.5% 0;
        }
        #banner-info h2 {
            margin-bottom: 30px;
            font-size: 2.75rem;
        }
        #banner-info p {
            font-size: 1.5rem;
        }
    }
</style>
@endsection
