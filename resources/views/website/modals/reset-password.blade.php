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
                <div class="row">
                    <div class="col-12 text-center">
                        Para recuperar tu clave por favor ingresa tu dirección de correo electrónico.<br>
                        Recibirás un correo con un enlace para que puedas recuperar el acceso a tu cuenta en <b class="text-lightblue">DóndePauto</b>.
                    </div>
                    <form method="POST" action="/reset" class="col-12 col-sm-6" id="form-reset">
                        {{ csrf_field() }}
                        <div class="text-center text-uppercase font-weight-bold">Ya tengo cuenta</div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-orange" value="Ingresar">
                        </div>
                    </form>
                    <div id="form-separator"></div>
                    <div class="col-12 col-sm-6" id="form-registro">
                        <div class="text-center">
                            <span class="text-uppercase font-weight-bold">Crear nueva cuenta</span><br>
                            <i class="fa fa-fw fa-3x fa-user-circle text-lightblue" style="margin: 10px auto;"></i><br>
                            <span>Quiero acceder a los beneficios que ofrece <span class="text-lightblue font-weight-bold">DóndePauto</span>.</span><br>
                            <a href="{{ route('registro') }}" type="button" class="btn btn-orange" id="btn-registro">Registrarme</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
