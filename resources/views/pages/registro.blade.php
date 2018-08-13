@extends('dondepauto::website.base')

@section('navbar-bg', 'bg-opaque')

@section('content')
    <div class="row registro-content">
        <div class="container-fluid text-center">
            <h1 class="h1">Crea tu cuenta y accede a los servicios y herramientas que te ofrece DóndePauto.CO</h1>
            <hr style="margin: 0 0 25px; border: 2.5px solid {{ config('dondepauto.colores.lightblue') }};">
            <div class="row justify-content-center text-left form">
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="nombre">Nombre <b class="text-danger">*</b></label>
                    <input type="text" name="nombre" class="form-control">
                    <div class="feedback text-danger" id="feedback-nombre"></div>
                </div>
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="apellido">Apellido <b class="text-danger">*</b></label>
                    <input type="text" name="apellido" class="form-control">
                    <div class="feedback text-danger" id="feedback-apellido"></div>
                </div>
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="email">Correo electrónico <b class="text-danger">*</b></label>
                    <input type="email" name="email" class="form-control">
                    <div class="feedback text-danger" id="feedback-email"></div>
                </div>
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="celular">Celular  <b class="text-danger">*</b></label>
                    <input type="text" name="celular" class="form-control">
                    <div class="feedback text-danger" id="feedback-celular"></div>
                </div>
                <div class="col-12 form-group animated">
                    <label for="empresa">Empresa <b class="text-danger">*</b></label>
                    <input type="text" name="empresa" class="form-control">
                    <div class="feedback text-danger" id="feedback-empresa"></div>
                </div>
                <div class="col-12 text-center">
                    <b class="text-lightblue">Selecciona cómo deseas registrarte en DóndePauto:</b>
                    <div class="feedback text-danger" id="feedback-role"></div>
                </div>
                <div class="col-6 col-sm-5 text-center form-group col-radio">
                    <label class="radio animated">
                        <input type="radio" name="role" value="Anunciante">
                        <div>
                            <div class="voyager voyager-bubble"></div>
                            <b>Anunciante</b><br>
                            <span>Si quieres promocionar tu marca o producto en medios publicitarios y recibir asesoría y acompañamiento durante el proceso.</span>
                        </div>
                    </label>
                </div>
                <div class="col-6 col-sm-5 text-center form-group col-radio">
                    <label class="radio animated">
                        <input type="radio" name="role" value="Medio Publicitario">
                        <div>
                            <div class="voyager voyager-megaphone"></div>
                            <b>Medio publicitario</b><br>
                            <span>Si vendes espacios publicitarios y quieres ampliar tu alcance comercial llegando a nuevos anunciantes.</span>
                        </div>
                    </label>
                </div>
                <div class="col-12 text-left" id="consent">
                    <input type="hidden" name="consent" value="no">
                    <input type="hidden" name="consent_timestamp" value="">
                    <span>
                        <i class="fa fa-fw fa-lg fa-square-o text-lightgray" id="icon-consent"></i>
                        <span>
                            Acepto los <a href="{{ route('documento', ['documento' => 'terminos-condiciones']) }}">términos y condiciones de uso</a>
                            y la <a href="{{ route('documento', ['documento' => 'politica-privacidad']) }}">política de tratamiento de datos</a> de DóndePauto.
                        </span>
                    </span>
                </div>
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-lg btn-orange" id="btn-submit">Registrarme</button>
                </div>
                <div class="col-12 text-center">
                    ¿Ya estás registrado?, inicia sesión <a data-toggle="modal" data-target="#modal-login">aquí</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
<style type="text/css">
    @font-face {
        font-family: voyager;
        src: url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.eot') }});
        src: url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.eot?#iefix') }}) format("embedded-opentype"),
             url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.woff') }}) format("woff"),
             url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.ttf') }}) format("truetype"),
             url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.svg#voyager') }}) format("svg");
        font-weight:400;
        font-style:normal;
    }
    .voyager { font-family: voyager; font-size: 25px; }
    .voyager-bubble:before { content:"\e011" } .voyager-megaphone:before { content:"\e00e" }
    .main {
        background-color: {{ config('dondepauto.colores.lightgray') }};
    }
    .registro-content {
        width: 100vw;
        max-width: 768px;
        margin: 15px -15px;
        padding: 15px 0;
    }
    .registro-content>.container-fluid {
        padding: 15px;
        font-size: 12px;
        background-color: white;
        position: relative;
    }
    .registro-content .h1 {
        font-size: 12px;
        line-height: 14px;
        color: {{ config('dondepauto.colores.gray') }};
    }
    .registro-content .form .col-radio {
        padding: 0 7.5px;
    }
    .registro-content .form label.radio {
        margin: 7.5px 0;
    }
    .registro-content .form label.radio>input + div {
        height: fit-content;
        padding: 15px;
        border: 1px solid {{ config('dondepauto.colores.lightgray') }};
        border-radius: 0.25rem;
    }
    .registro-content .form label.radio.is-invalid>input + div {
        color: {{ config('dondepauto.colores.red') }} !important;
        border-color: {{ config('dondepauto.colores.red') }} !important;
    }
    .registro-content .form label.radio.is-invalid>input + div * {
        color: {{ config('dondepauto.colores.red') }} !important;
    }
    .registro-content .form label.radio:hover>input + div {
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.25);
    }
    .registro-content .form label.radio>input:checked + div {
        color: white;
        border-color: {{ config('dondepauto.colores.lightblue') }};
        background-color: {{ config('dondepauto.colores.lightblue') }};
        box-shadow: 0px 0px 10px 0px rgba(0, 174, 239, 0.25);
    }
    .registro-content .form label.radio>input:checked + div * {
        color: white;
        background-color: {{ config('dondepauto.colores.lightblue') }};
    }
    .registro-content #btn-submit {
        width: 50%;
        margin: 10px auto;
        font-size: 16px;
        font-weight: bold;
        color: white;
    }
    @media(min-width: 576px) {
        .registro-content {
            width: 100%;
            margin: 0 auto;
            margin-top: 125px;
            margin-bottom: 15px;
        }
        .registro-content>.container-fluid {
            padding: 25px;
            font-size: 14px;
        }
        .registro-content .h1 {
            font-size: 14px;
            line-height: 16px;
        }
        .registro-content .form label.radio>input + div {
            margin: 15px;
        }
        .registro-content #btn-submit {
            margin: 25px auto;
            font-size: 25px;
        }
    }
</style>
@endsection
