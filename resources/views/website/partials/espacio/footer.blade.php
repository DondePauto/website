<div class="row footer d-flex d-sm-none">
    @guest
        <div class="col-12 footer-panel" id="footer-precio">
            <img src="/images/espacio/icon-precio.png"></img>
            <a id="footer-link-login" data-toggle="modal" data-target="#modal-login">Inicia sesión para ver el precio</a>
        </div>
    @endguest
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
            bottom: 0;
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
        }
        #footer-precio #footer-link-login {
            text-decoration: underline;
            color: {{ config('dondepauto.colores.lightblue') }};
        }
    </style>
</div>