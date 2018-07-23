@extends('dondepauto::website.base')

@section('navbar-bg', 'bg-opaque')

@section('content')
    <div class="row activar-content">
        <div class="container-fluid text-center">
            <h1 class="h1">Bienvenido {{ $usuario->nombre }}</h1>
            <h2 class="h2">
                Tu cuenta ha sido activada. Estás a un paso de iniciar el proceso de búsqueda, cotización y
                compra de los medios publicitarios más efectivos para tu empresa.
            </h2>
            <hr style="margin: 0 0 25px; border: 2.5px solid {{ config('dondepauto.colores.lightblue') }};">
            <div class="row justify-content-center text-left">
                <div class="col-12 col-sm-5 form-fields">
                    <div class="text-center">
                        <b>Completando tu información podrás acceder a los siguientes beneficios:</b>
                        <hr style="width: 80%; margin: 12.5px 10%; border: 1px solid white;">
                    </div>
                    <ul class="fa-ul">
                        <li>
                            <i class="fa fa-fw fa-lg fa-li fa-check-circle text-success"></i>
                            <span>Búsqueda de espacios publicitarios: Conoce la información completa (precios, audiencias y más).</span>
                            <br><br>
                        </li>
                        <li>
                            <i class="fa fa-fw fa-lg fa-li fa-check-circle text-success"></i>
                            <span>Asesoría especializada: Un asesor experto que te ayudará a diseñar la mejor marca para tu campaña.</span>
                            <br><br>
                        </li>
                        <li>
                            <i class="fa fa-fw fa-lg fa-li fa-check-circle text-success"></i>
                            <span>Gestión de compras: Gestionamos todos los aspectos de la compra, desde la orden hasta la facturación.</span>
                            <br><br>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-7 form-fields">
                    <div class="text-center">
                        <b>Completa tu registro ingresando los siguientes datos</b>
                        <hr style="width: 80%; margin: 12.5px 10%; border: 1px solid {{ config('dondepauto.colores.lightblue') }};">
                    </div>
                    <div class="row justify-content-center text-left form">
                        <input type="hidden" name="codigo" value="{{ $codigo }}">
                        <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                        <div class="col-12 form-group">
                            <label for="empresa">Empresa</label>
                            <input type="text" name="empresa" value="{{ $usuario->empresa->nombre }}" class="form-control" disabled>
                        </div>
                        <div class="col-6 form-group animated">
                            <label for="actividad">Actividad Económica</label>
                            <select name="actividad" class="form-control">
                                <option value="">Seleccionar...</option>
                                @foreach( \DondePauto\Models\Extras\Termino::actividades_economicas() as $actividad )
                                    <option value="{{ $actividad->id }}">{{ $actividad->nombre }}</option>
                                @endforeach
                            </select>
                            <div class="feedback text-danger" id="feedback-actividad"></div>
                        </div>
                        <div class="col-6 form-group animated">
                            <label for="cargo">Cargo <b class="text-danger">*</b></label>
                            <input type="text" name="cargo" class="form-control">
                            <div class="feedback text-danger" id="feedback-cargo"></div>
                        </div>
                        <div class="col-6 form-group animated">
                            <label for="telefono">Teléfono <b class="text-danger">*</b></label>
                            <input type="text" name="telefono" class="form-control">
                            <div class="feedback text-danger" id="feedback-telefono"></div>
                        </div>
                        <div class="col-6 form-group animated">
                            <label for="celular">Celular <b class="text-danger">*</b></label>
                            <input type="text" name="celular" value="{{ isset($usuario->data->celular) ? $usuario->data->celular : '' }}" class="form-control">
                            <div class="feedback text-danger" id="feedback-celular"></div>
                        </div>
                        <div class="col-6 form-group animated">
                            <label for="ciudad">Ciudad <b class="text-danger">*</b></label>
                            <select name="ciudad" class="form-control">
                                <option value="">Seleccionar...</option>
                                @foreach( \DondePauto\Models\Extras\Termino::ciudades() as $ciudad )
                                    <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                @endforeach
                            </select>
                            <div class="feedback text-danger" id="feedback-ciudad"></div>
                        </div>
                        <div class="col-6 form-group animated">
                            <label for="direccion">Dirección <b class="text-danger">*</b></label>
                            <input type="text" name="direccion" class="form-control">
                            <div class="feedback text-danger" id="feedback-direccion"></div>
                        </div>
                        <div class="col-6 form-group animated">
                            <label for="contrasena">Contraseña  <b class="text-danger">*</b></label>
                            <input type="password" name="contrasena" class="form-control">
                            <div class="feedback text-danger" id="feedback-contrasena"></div>
                        </div>
                        <div class="col-6 form-group animated">
                            <label for="contrasena_confirmation">Confirmar contraseña  <b class="text-danger">*</b></label>
                            <input type="password" name="contrasena_confirmation" class="form-control">
                            <div class="feedback text-danger" id="feedback-contrasena_confirmation"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-lg btn-orange" id="btn-submit">Completar mi registro</button>
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
    .activar-content {
        width: 100vw;
        max-width: 768px;
        margin: 15px -15px;
        padding: 15px 0;
    }
    .activar-content>.container-fluid {
        padding: 15px;
        font-size: 12px;
        background-color: white;
        position: relative;
    }
    .activar-content .h1 {
        font-size: 20px;
        line-height: 24px;
        color: {{ config('dondepauto.colores.gray') }};
    }
    .activar-content .h2 {
        font-size: 12px;
        line-height: 14px;
        color: {{ config('dondepauto.colores.gray') }};
    }
    .activar-content .form .col-radio {
        padding: 0 7.5px;
    }
    .activar-content .form label.radio {
        margin: 7.5px 0;
    }
    .activar-content .form select {
        border: 1px solid {{ config('dondepauto.colores.lightgray') }};
        border-radius: 0.25rem;
    }
    .activar-content .form label.radio>input + div {
        height: fit-content;
        padding: 15px;
        border: 1px solid {{ config('dondepauto.colores.lightgray') }};
        border-radius: 0.25rem;
    }
    .activar-content .form label.radio.is-invalid>input + div {
        color: {{ config('dondepauto.colores.red') }} !important;
        border-color: {{ config('dondepauto.colores.red') }} !important;
    }
    .activar-content .form label.radio.is-invalid>input + div * {
        color: {{ config('dondepauto.colores.red') }} !important;
    }
    .activar-content .form label.radio:hover>input + div {
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.25);
    }
    .activar-content .form label.radio>input:checked + div {
        color: white;
        border-color: {{ config('dondepauto.colores.lightblue') }};
        background-color: {{ config('dondepauto.colores.lightblue') }};
        box-shadow: 0px 0px 10px 0px rgba(0, 174, 239, 0.25);
    }
    .activar-content .form label.radio>input:checked + div * {
        color: white;
        background-color: {{ config('dondepauto.colores.lightblue') }};
    }
    .activar-content #btn-submit {
        width: 50%;
        margin: 10px auto;
        font-size: 16px;
        font-weight: bold;
        color: white;
    }
    @media(min-width: 576px) {
        .activar-content {
            width: 100%;
            margin: 0 auto;
            margin-top: 125px;
            margin-bottom: 15px;
        }
        .activar-content>.container-fluid {
            padding: 25px;
            font-size: 14px;
        }
        .activar-content .h1 {
            font-size: 24px;
            line-height: 28px;
        }
        .activar-content .h2 {
            font-size: 14px;
            line-height: 16px;
        }
        .activar-content .form label.radio>input + div {
            margin: 15px;
        }
        .activar-content #btn-submit {
            margin: 25px auto;
            font-size: 25px;
        }
    }
</style>
@endsection
