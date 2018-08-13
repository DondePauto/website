<div class="sidebar d-none d-sm-block">
    <div class="sidebar-panel" id="sidebar-precio">
        <img src="/images/espacio/icon-precio.png">
        @if( auth()->check() )
            <span style="font-size: 24px; font-weight: bold; position: relative; top: 6px;">
                <?php $precio = isset($espacio->data->precio->valor) ? $espacio->data->precio->valor : 0; ?>
                <?php $margen = isset($espacio->data->precio->margen) ? $espacio->data->precio->margen : 15; ?>
                {{ '$ '.number_format((100/(100 - $margen))*$precio) }}
            </span>
            <span style="position: relative; top: 6px;">
                / {{ isset($espacio->data->periodo) ? strtolower($espacio->data->periodo) : '' }}
            </span>
        @else
            <a id="sidebar-link-login" data-toggle="modal" data-target="#modal-login">Inicia sesión para ver el precio</a>
        @endif
    </div>
    <div class="sidebar-panel" id="sidebar-cotizar">
        <div class="text-center">
            <b>¿Te interesa este espacio de pauta?</b>
            <button type="button" class="btn btn-orange" id="sidebar-btn-cotizar" data-toggle="modal" data-target="#modal-cotizar">
                <b>Cotizar</b>
            </button>
        </div>
        @if( auth()->check() and auth()->user()->role->name=='anunciante' )
            <a id="link-agregar-favorito">
                <i class="fa fa-fw fa-heart-o"></i>&nbsp;Añadir a mis favoritos
            </a>
            <div class="text-center">
                <a type="button" class="btn btn-sm btn-secondary" id="link-favoritos">
                    <b>Ir a mis favoritos</b>
                </a>
            </div>
        @else
            <a id="link-agregar-favorito" data-toggle="modal" data-target="#modal-login">
                <i class="fa fa-fw fa-heart-o"></i>&nbsp;Añadir a mis favoritos
            </a>
            <div class="text-center">
                <a type="button" class="btn btn-sm btn-secondary" id="link-favoritos" data-toggle="modal" data-target="#modal-login">
                    <b>Ir a mis favoritos</b>
                </a>
            </div>
        @endif
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
