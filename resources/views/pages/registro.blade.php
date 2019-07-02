@extends('dondepauto::website.base')

@section('navbar-bg', 'bg-opaque')

@section('content')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div class="row registro-content">
        <div class="container-fluid text-center">
            <h1 class="h1">Crea tu cuenta y accede a los servicios y herramientas que te ofrece DóndePauto.CO</h1>
            <hr style="margin: 0 0 25px; border: 2.5px solid {{ config('dondepauto.colores.lightblue') }};">
            <form method="POST" action="https://dondepauto.co/registro" class="row justify-content-center text-left form">
                {{ csrf_field() }}
                <input type="hidden" name="validate_email" value="true">
                @if( request()->has('redirect') )
                    <input type="hidden" name="redirect" value="https://{{ request()->redirect }}">
                @endif
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="nombre">Nombre <b class="text-danger">*</b></label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
                    @if( $errors->has('nombre') )
                        <div class="feedback text-danger" id="feedback-nombre">{{ $errors->first('nombre') }}</div>
                    @endif
                </div>
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="apellido">Apellido <b class="text-danger">*</b></label>
                    <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control">
                    @if( $errors->has('apellido') )
                        <div class="feedback text-danger" id="feedback-apellido">{{ $errors->first('apellido') }}</div>
                    @endif
                </div>
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="email">Correo electrónico <b class="text-danger">*</b></label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                    @if( $errors->has('email') )
                        <div class="feedback text-danger" id="feedback-email">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="celular">Celular  <b class="text-danger">*</b></label>
                    <input type="text" name="celular" value="{{ old('celular') }}" class="form-control">
                    @if( $errors->has('celular') )
                        <div class="feedback text-danger" id="feedback-celular">{{ $errors->first('celular') }}</div>
                    @endif
                </div>
                <div class="col-12 form-group animated">
                    <label for="empresa">Empresa <b class="text-danger">*</b></label>
                    <input type="text" name="empresa" value="{{ old('empresa') }}" class="form-control">
                    @if( $errors->has('empresa') )
                        <div class="feedback text-danger" id="feedback-empresa">{{ $errors->first('empresa') }}</div>
                    @endif
                </div>
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="contrasena">Contraseña  <b class="text-danger">*</b></label>
                    <input type="password" name="contrasena" class="form-control">
                    @if( $errors->has('contrasena') )
                        <div class="feedback text-danger" id="feedback-contrasena">{{ $errors->first('contrasena') }}</div>
                    @endif
                </div>
                <div class="col-12 col-sm-6 form-group animated">
                    <label for="contrasena_confirmation">Confirmar contraseña  <b class="text-danger">*</b></label>
                    <input type="password" name="contrasena_confirmation" class="form-control">
                    @if( $errors->has('contrasena_confirmation') )
                        <div class="feedback text-danger" id="feedback-contrasena_confirmation">{{ $errors->first('contrasena_confirmation') }}</div>
                    @endif
                </div>
                <div class="col-12 text-center">
                    <b class="text-lightblue">Selecciona cómo deseas registrarte en DóndePauto:</b>
                    @if( $errors->has('role') )
                        <div class="feedback text-danger" id="feedback-role">{{ $errors->first('role') }}</div>
                    @endif
                </div>
                <div class="col-6 col-sm-5 text-center form-group col-radio">
                    <label class="radio animated">
                        @if( old('role')=='Anunciante' or request()->has('anunciante') )
                            <input type="radio" name="role" value="Anunciante" checked>
                        @else
                            <input type="radio" name="role" value="Anunciante">
                        @endif
                        <div>
                            <div class="voyager voyager-bubble"></div>
                            <b>Anunciante</b><br>
                            <span>Si quieres promocionar tu marca o producto en medios publicitarios y recibir asesoría y acompañamiento durante el proceso.</span>
                        </div>
                    </label>
                </div>
                <div class="col-6 col-sm-5 text-center form-group col-radio">
                    <label class="radio animated">
                        @if( old('role')=='Medio Publicitario' or request()->has('medio') )
                            <input type="radio" name="role" value="Medio Publicitario" checked>
                        @else
                            <input type="radio" name="role" value="Medio Publicitario">
                        @endif
                        <div>
                            <div class="voyager voyager-megaphone"></div>
                            <b>Medio publicitario</b><br>
                            <span>Si vendes espacios publicitarios y quieres ampliar tu alcance comercial llegando a nuevos anunciantes.</span>
                        </div>
                    </label>
                </div>
                <div class="col-6 text-left" id="consent">
                    <input type="hidden" name="consent" value="yes">
                    <input type="hidden" name="consent_timestamp" value="{{ time() }}">
                    <span>
                        <i class="fa fa-fw fa-lg fa-check-square text-lightblue" id="icon-consent"></i>
                        <span>
                            Acepto los <a href="{{ route('documento', ['documento' => 'terminos-condiciones']) }}">términos y condiciones de uso</a>
                            y la <a href="{{ route('documento', ['documento' => 'politica-privacidad']) }}">política de tratamiento de datos</a> de DóndePauto.
                        </span>
                    </span>
                </div>
                <div class="col-6 text-left">
                    @if( $errors->first('captcha') )
                        <div class="feedback text-danger" id="feedback-captcha">{{ $errors->first('captcha') }}</div>
                    @endif
                    <div class="g-recaptcha" data-sitekey="6LcBtpwUAAAAAFehpm8J4OETM8KQPMm182_TMGwK"></div>
                </div>
                <div class="col-12 text-center">
                    <input type="submit" value="Registrarme" class="btn btn-lg btn-orange" id="btn-submit">
                </div>
                <div class="col-12 text-center">
                    ¿Ya estás registrado?, inicia sesión <a data-toggle="modal" data-target="#modal-login">aquí</a>.<br>
                    ¿Olvidaste tu contraseña?, recuperala <a data-toggle="modal" data-target="#modal-reset-password">aquí</a>.<br>
                </div>
            </form>
        </div>
    </div>

    {{-- MODALS --}}
    @include('dondepauto::website.modals.login')
    @include('dondepauto::website.modals.reset-password')
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
