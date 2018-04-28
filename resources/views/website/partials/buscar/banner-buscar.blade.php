<div class="row text-center banner" id="banner-buscar">
    <div class="full-width vertical-center-content">
        <h1 class="h1">
            <span>Espacios de pauta</span>
        </h1>
        <div id="form">
            <div class="input-group input-group-lg">
                <input type="text" placeholder="Busca aquí" class="form-control" id="palabra">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger" id="btn-buscar">
                        <i class="fa fa-fw fa-lg fa-search fa-flip-horizontal d-block d-sm-none"></i>
                        <b class="d-none d-sm-block">Buscar</b>
                    </button>
                </div>
            </div>
            <div class="row text-left" id="filtros">
                <div class="col-6 col-sm-3 col-xl-2 btn-group">
                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle" id="dropdown-categorias"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown-categorias">
                        @foreach( DondePauto\Models\Extras\Termino::categorias() as $categoria )
                            <a class="dropdown-item" data-type="categoria" data-target="{{ $categoria->id }}">{{ $categoria->nombre }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-6 col-sm-3 col-xl-2 btn-group">
                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Escenarios
                    </button>
                    <div class="dropdown-menu">
                        @foreach( DondePauto\Models\Extras\Termino::escenarios() as $escenario )
                            <a class="dropdown-item" data-type="escenario" data-target="{{ $escenario->id }}">{{ $escenario->nombre }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-6 col-sm-3 col-xl-2 btn-group">
                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Audiencias
                    </button>
                    <div class="dropdown-menu">
                        @foreach( DondePauto\Models\Extras\Termino::audiencias() as $tipo )
                            <h6 class="dropdown-header" data-type="{{ $tipo->tipo_slug }}">{{ $tipo->tipo }}</h6>
                            @foreach( $tipo->audiencias as $audiencia )
                                <a class="dropdown-item dropdown-audiencia" data-type="{{ $tipo->tipo_slug }}" data-target="{{ $audiencia->id }}">
                                    {{ $audiencia->nombre }}
                                </a>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="col-6 col-sm-3 col-xl-2 btn-group">
                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ciudades
                    </button>
                    <div class="dropdown-menu">
                        @foreach( DondePauto\Models\Extras\Termino::ciudades() as $ciudad )
                            <a class="dropdown-item" data-type="ciudad" data-target="{{ $ciudad->id }}">{{ $ciudad->nombre }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        #banner-buscar {
            height: 60vh;
            color: white;
            background-image: url(/images/buscar/banner-buscar.png);
            z-index: 1;
        }
        #banner-buscar #form {
            margin-top: 45px;
        }
        #banner-buscar #filtros {
            margin: 0 -7.5px;
        }
        #banner-buscar #filtros .btn-group {
            padding: 0 7.5px;
        }
        #banner-buscar #filtros .dropdown-toggle {
            width: 100%;
            margin-top: 15px;
            font-size: 12px;
            font-weight: bold;
        }
        #banner-buscar #filtros .dropdown-toggle::after {
            float: right;
            position: relative;
            top: 7px;
        }
        #banner-buscar #filtros .dropdown-menu {
            min-width: 200px;
            max-height: 300px;
            padding: 0;
            font-size: 12px;
            overflow: hidden;
        }
        #banner-buscar #filtros .dropdown-header,
        #banner-buscar #filtros .dropdown-item {
            font-size: 12px;
        }
        #banner-buscar #filtros .dropdown-header {
            padding: 0.75rem 0.75rem 0.25rem;
        }
        #banner-buscar #filtros .dropdown-item {
            padding: 0.25rem 0.75rem;
        }
        #banner-buscar #filtros .dropdown-audiencia {
            padding: 0.25rem 1.5rem;
        }
        @media(max-width: 576px) {
            #banner-buscar #filtros .dropdown-menu {
                top: 43px !important;
                left: 7px !important;
                transform: none !important;
            }
        }
        @media(min-width: 576px) {
            #banner-buscar #form {
                width: 90%;
                margin: 45px 5% 0;
            }
        }
        @media(min-width: 768px) {
            #banner-buscar #form {
                width: 80%;
                margin: 45px 10% 0;
            }
        }
    </style>
</div>
