<div class="row text-center banner" id="banner-home">
    <div class="full-width vertical-center-content">
        <div class="row">
            <div class="col-12 col-sm-8 d-none d-sm-inline-block" id="banner-text">
                <div style="position: absolute; top: 50%; transform: translateY(-50%);">
                    <h1 class="h1">
                        <div style="font-size: 3.225rem; line-height: 3.225rem;">Encuentra los mejores</div>
                        <div>
                            <span>
                                <a href="/buscar" id="banner-home-link">medios publicitarios</a> para tu marca o producto
                            </span>
                        </div>
                    </h1>
                    <div>
                        Accede de forma inmediata y gratuita a un inventario de más de {{ DondePauto\Models\Espacio::total() }}
                        espacios publicitarios en Colombia, con información de tarifas ubicaciones y audiencias a las que puedes llegar.
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4" id="form-register">
                <form method="POST" action="https://dondepauto.co/registro" class="text-center">
                    {{  csrf_field() }}
                    <input type="hidden" name="fuente_registro" value="asesoria">
                    <input type="hidden" name="role" value="anunciante">
                    <div style="margin-bottom: 10px;">
                        <b>En DóndePauto te ayudamos a encontrar el medio publicitario que estás buscando</b>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control form-control-sm" required>
                        </div>
                        <div class="col form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" name="email" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" name="celular" class="form-control form-control-sm" required>
                    </div>
                    <input type="submit" id="btn-banner-registro-submit" class="btn" value="Solicitar asesoría">
                    <script type="text/javascript">
                        document.addEventListener("DOMContentLoaded", function() {
                            $('#form-register form').submit(function() {
                                alert([
                                    'Hemos recibido tu solicitud de asesoría.',
                                    'Muy pronto nos pondremos en contacto contigo para ayudarte con toda la información que necesites.'
                                ].join('\n'));
                                return true;
                            });
                        });
                    </script>
                </form>
                <div class="text-center">
                    <?php $phone = json_decode(setting('contacto.telefonos'))[0]; ?>
                    <b>¡Llámanos ya! {{ $phone->valor }}</b><hr>
                    <div class="disclaimer">
                        Al hacer click en "Solicitar asesoría", usted acepta los
                        <a href="/documento/terminos-condiciones">Términos y Condiciones</a> y
                        la <a href="/documento/terminos-condiciones">Política de Tratamiento de Datos</a> de DóndePauto.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        #banner-home {
            color: white;
            background-image: url(images/home/banner-home.png);
            background-size: 132.5%;
            background-position: 15% 0%;
        }
        #banner-home>.full-width {
            padding: 0 40px;
        }
        #banner-home #banner-text div {
            width: 740px;
            margin: 0 auto;
        }
        #banner-home h1 span:last-of-type {
            font-size: 1.75rem;
            line-height: 1.75rem;
            position: relative;
            top: -5px;
        }
        #banner-home-link {
            color: {{ config('dondepauto.colores.orange') }};
            text-transform: uppercase;
            text-decoration: none;
        }
        #banner-home #form-register {
            padding: 15px;
            background: {{ config('dondepauto.colores.orange') }};
            color: white;
        }
        #banner-home #form-register .form-group {
            text-align: left;
        }
        #banner-home #form-register .form-group input {
            margin-top: -5px;
        }
        #banner-home #form-register input[type=submit] {
            width: 100%;
            margin: 10px 0;
            font-weight: bold;
            color: {{ config('dondepauto.colores.orange') }};
            background: white;
            text-transform: uppercase;
        }
        #banner-home #form-register hr {
            width: 80%;
            margin: 5px 10%;
            border-color: white;
        }
        #banner-home #form-register .disclaimer {
            font-size: 11px;
            line-height: 12px;
        }
        #banner-home #form-register .disclaimer a {
            color: white !important;
            text-decoration: underline;
        }
        @media(max-width: 576px) {
            #banner-home>.full-width {
                padding: 0 20px;
            }
            #banner-home {
                background-size: cover;
                background-position-x: 0%;
            }
        }
        @media(min-width: 576px) {
            #banner-home #form {
                width: 75%;
                margin: 45px 12.5% 0;
            }
        }
    </style>
</div>
