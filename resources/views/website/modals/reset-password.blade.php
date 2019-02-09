<?php $query   = isset(array_keys(request()->query())[0]) ? array_keys(request()->query())[0] : null; ?>
<?php $usuario = \DondePauto\Models\Usuario::where('password', 'like', 'reset:'.$query.',%')->first(); ?>
<div class="modal fade" id="modal-reset-password" tabindex="-1" role="dialog" aria-labelledby="#modal-reset-password" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center font-weight-bold" style="width: 100vw;">Recuperar contraseña</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    @if( $query!==null && $usuario!==null )
                        <div class="col-10 text-center">
                            Ingresa la nueva contraseña para el usuario {{ $usuario->email }}:
                        </div>
                        <form method="POST" action="{{ route('password.update') }}" class="col-8 text-center" id="form-update">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $query }}">
                            <input type="hidden" name="email" value="{{ $usuario->email }}">
                            <div class="form-group" style="margin-top: 15px;">
                                <input type="password" name="password" class="form-control text-left" placeholder="Contraseña">
                            </div>
                            <div class="form-group" style="margin-top: 5px;">
                                <input type="password" name="password_confirmation" class="form-control text-left" placeholder="Confirma tu contraseña">
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <input type="submit" class="btn btn-lg btn-orange" value="Recuperar contraseña">
                            </div>
                        </form>
                    @else
                        <div class="col-10 text-center">
                            Para recuperar tu clave por favor ingresa tu dirección de correo electrónico.<br>
                            Recibirás un correo con un enlace para que puedas recuperar el acceso a tu cuenta en <b class="text-lightblue">DóndePauto</b>.
                        </div>
                        <form method="POST" action="{{ route('password.request') }}" class="col-8 text-center" id="form-reset">
                            {{ csrf_field() }}
                            <div class="form-group" style="margin-top: 15px;">
                                <input type="email" name="email" class="form-control text-left" placeholder="Correo">
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <input type="submit" class="btn btn-lg btn-orange" value="Recuperar contraseña">
                            </div>
                            <div class="text-center" style="margin-top: 10px;">
                                <a data-toggle="modal" data-target="#modal-login"
                                    style="font-size: 12px; color: {{ config('dondepauto.colores.lightblue') }}">
                                    Iniciar sesión
                                </a>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        $(function() {
            @if( $query!==null && $usuario!==null )
                $('.modal').modal('hide');
                $('#modal-reset-password').modal();
            @endif
            @if( session('status') )
                $('#modal-alert #modal-alert-title').html('Recuperar contraseña');
                $('#modal-alert .modal-body').addClass('text-center')
                    .html('{{ config('dondepauto.mensajes.login.enlace_enviado') }}');
                $('.modal').modal('hide');
                $('#modal-alert').modal();
            @endif
        });
    });
</script>

<style type="text/css">
    .modal#modal-reset-password #btn-registro {
        margin: 10px auto;
    }
    @media(max-width: 575px) {
        .modal#modal-reset-password #form-separator {
            width: 90%;
            height: 1px;
            margin: 15px 5%;
            border-top: 1px dotted {{ config('dondepauto.colores.gray') }};
        }
    }
    @media(min-width: 576px) {
        .modal#modal-reset-password .modal-body {
            padding-top: 0;
        }
        .modal#modal-reset-password #form-separator {
            width: 1px;
            height: 230px;
            margin: 0 -15px 0 14px;
            border-left: 1px dotted {{ config('dondepauto.colores.gray') }};
        }
        .modal#modal-reset-password #form-registro span:not(.text-uppercase) {
            font-size: 14px;
        }
    }
</style>
