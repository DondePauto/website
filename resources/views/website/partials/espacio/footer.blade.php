<div class="row footer d-flex d-sm-none">
    @if( auth()->check() )
        <div class="col-12 footer-panel" id="footer-precio">
            <img src="/images/espacio/icon-precio.png">
            <span style="font-size: 24px; font-weight: bold; position: relative; top: 6px;">
                <?php $precio = isset($espacio->data->precio->valor) ? $espacio->data->precio->valor : 0; ?>
                <?php $margen = isset($espacio->data->precio->margen) ? $espacio->data->precio->margen : 15; ?>
                {{ '$ '.number_format((100/(100 - $margen))*$precio) }}
            </span>
            <span style="position: relative; top: 6px;">
                / {{ isset($espacio->data->periodo) ? strtolower($espacio->data->periodo) : '' }}
            </span>
        </div>
    @else
        <div class="col-12 footer-panel" id="footer-precio">
            <img src="/images/espacio/icon-precio.png">
            <a id="footer-link-login" data-toggle="modal" data-target="#modal-login">Inicia sesión para ver el precio</a>
        </div>
    @endif
    <div class="col-6 footer-panel" id="footer-cotizar">
        <button type="button" class="btn btn-lg btn-orange" id="footer-btn-cotizar" data-toggle="modal" data-target="#modal-cotizar">
            <b>Cotizar</b>
        </button>
    </div>
    <div class="col-6 footer-panel" id="footer-asesoria">
        <button type="button" class="btn btn-lg btn-success" id="footer-btn-asesoria" data-toggle="modal" data-target="#modal-asesoria">
            <b>Solicitar asesoría</b>
        </button>
    </div>

    <style type="text/css">
        .footer {
            width: 100vw;
            margin-bottom: -15px;
            position: sticky;
            position: -webkit-sticky;
            position: -moz-sticky;
            position: -ms-sticky;
            position: -o-sticky;
            bottom: 55px;
            z-index: 15;
        }
        .footer-panel {
            font-size: 12px;
            background-color: {{ config('dondepauto.colores.darkgray') }};
        }
        .footer-panel .btn {
            width: calc(100% + 30px);
            margin: 0 -15px;
            padding: 15px 0;
            font-size: 12px;
            text-transform: uppercase;
            color: white;
        }
        #footer-precio {
            padding: 7.5px;
            color: #ccc;
        }
        #footer-precio #footer-link-login {
            text-decoration: underline;
            color: {{ config('dondepauto.colores.lightblue') }};
        }
    </style>
</div>