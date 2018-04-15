@extends('dondepauto::website.base')

@section('content')
    <div class="row text-center full-viewport vertical-center" id="banner-buscar">
        <div class="full-viewport" id="not-found"></div>
        <div class="full-width vertical-center-content">
            <h1 class="heading">
                <span><img src="//files.dondepauto.co/brand/icon_-h150-cwhite.png"></span>
                <span><br>La página que buscas no existe</span>
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

@section('javascript')
<script type="text/javascript">
    /* global $ */
    document.addEventListener('DOMContentLoaded', function() {
        $(function() {
            setTimeout(function() { $(window).resize(); }, 0);
        });
    });
</script>
@endsection

@section('css')
<style type="text/css">
    [id^=banner-],
    #not-found {
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
    #banner-buscar {
        color: white;
    }
    #banner-buscar #not-found {
        background-image: url(/images/home/banner-buscar.png);
        -webkit-filter: blur(5px) grayscale(1);
        filter: blur(5px) grayscale(1);
    }
    #banner-buscar #form {
        margin-top: 45px;
    }
    @media(max-width:576px) {
        #banner-buscar,
        #banner-buscar #not-found {
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
        .heading {
            font-size: 3.25rem;
            line-height: 3.25rem;
        }
        .heading span:last-of-type {
            font-size: 2.25rem;
            line-height: 2.25rem;
        }
        #banner-buscar #form {
            width: 75%;
            margin: 45px 12.5% 0;
        }
    }
</style>
@endsection
