<div class="sidebar d-none d-sm-block">
    @guest
        <div class="sidebar-panel" id="sidebar-precio">
            <img src="/images/espacio/icon-precio.png"></img>
            <a id="sidebar-link-login" data-toggle="modal" data-target="#modal-login">Inicia sesión para ver el precio</a>
        </div>
    @endguest
    <div class="sidebar-panel" id="sidebar-cotizar">
        <div class="text-center">
            <b>¿Te interesa este espacio de pauta?</b>
            <button type="button" class="btn btn-orange" id="sidebar-btn-cotizar" data-toggle="modal" data-target="#modal-cotizar">
                <b>Cotizar</b>
            </button>
        </div>
        @guest
            <a id="link-agregar-favorito" data-toggle="modal" data-target="#modal-login">
                <i class="fa fa-fw fa-heart-o"></i>&nbsp;Añadir a mis favoritos
            </a>
        @endguest
        <div class="text-center">
            @guest
                <a type="button" class="btn btn-sm btn-secondary" id="link-favoritos" data-toggle="modal" data-target="#modal-login">
                    <b>Ir a mis favoritos</b>
                </a>
            @endguest
        </div>
    </div>
    <div class="sidebar-panel text-center" id="compartir">
        <b>Compartir este espacio de pauta</b><br><br>
        <?php $body    = setting('website.descripcion').'%0A%0A'.request()->fullUrl(); ?>
        <?php $subject = 'Hola! Te comparto este espacio de pauta'; ?>
        <a href="//facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}" class="btn-share">
            <i class="fa fa-fw fa-3x fa-facebook text-lightblue"></i>
        </a>
        <a href="//twitter.com/intent/tweet?text={{ $body }}" class="btn-share">
            <i class="fa fa-fw fa-3x fa-twitter text-lightblue"></i>
        </a>
        <a href="mailto:@?subject={{ $subject }}&body={{ $body }}" class="btn-share">
            <i class="fa fa-fw fa-3x fa-envelope text-lightblue"></i>
        </a>
    </div>

    <style type="text/css">
        .sidebar {
            width: calc(33.3333% + 15px);
            position: absolute;
            right: 0;
        }
        .sidebar-panel {
            margin: 15px;
            padding: 15px;
            font-size: 12px;
            border-radius: 5px;
            background-color: {{ config('dondepauto.colores.lightgray') }};
        }
        #sidebar-precio #sidebar-link-login {
            text-decoration: underline;
            color: {{ config('dondepauto.colores.lightblue') }};
        }
        #sidebar-cotizar #sidebar-btn-cotizar {
            width: 75%;
            margin: 5px 0 15px;
            text-transform: uppercase;
            color: white;
        }
        #sidebar-cotizar #link-agregar-favorito {
            font-size: 14px;
        }
        #sidebar-cotizar #link-favoritos {
            margin: 5px 0;
            color: white;
        }
        #sidebar-compartir .btn-share {
            text-decoration: none;
        }
    </style>
</div>
