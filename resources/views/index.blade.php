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
@endsection

@section('css')
<style type="text/css">
    [id^=banner-] .full-width {
        width: calc(100vw - 60px);
        padding: 0 30px;
    }
    #banner-buscar {
        color: white;
        background-color: lightgray;
        background-image: url(images/home/banner-buscar.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    #banner-buscar #form {
        margin-top: 45px;
    }
    #banner-buscar h1 {
        font-size: 3.25rem;
        line-height: 3.25rem;
        font-weight: bold;
        text-transform: uppercase;
        text-shadow: 3px 3px 12px rgba(0, 0, 0, 0.7);
    }
    #banner-buscar h1 span:last-of-type {
        font-size: 2.25rem;
        line-height: 2.25rem;
        text-transform: none;
    }
    @media(max-width:576px) {
        [id^=banner-] .full-width {
            width: calc(100vw - 30px);
            padding: 0 15px;
        }
        #banner-buscar {
            height: calc(100vh - 45px);
            background-position-x: 100%;
        }
        #banner-buscar h1 {
            font-size: 2.25rem;
            line-height: 2.25rem;
        }
        #banner-buscar h1 span:last-of-type {
            font-size: 1.5rem;
            line-height: 1.5rem;
        }
    }
    @media(min-width:576px) {
        #banner-buscar #form {
            width: 75%;
            margin: 45px 12.5% 0;
        }
    }
</style>
@endsection
