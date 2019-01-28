<header class="navbar navbar-expand-sm fixed-top @yield('navbar-bg', 'bg-transparent')">
    <a href="{{ route('home') }}" class="navbar-brand">
        <img src="{{ route('files.brand', ['path' => 'logo-light_-h35']) }}" class="d-inline d-sm-none">
        <img src="{{ route('files.brand', ['path' => 'logo-light_-h50']) }}" class="d-none d-sm-inline brand-light">
        <img src="{{ route('files.brand', ['path' => 'logo-dark_-h50']) }}" class="d-none d-sm-inline brand-dark">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse"
        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    <div class="navbar-backdrop" data-toggle="collapse"></div>
    <div class="navbar-collapse" data-toggle="collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-block d-sm-none" id="link-home">
                <a class="nav-link" href="{{ route('home') }}">
                    <img src="{{ route('files.brand', ['path' => 'logo-light_-h35-cwhite']) }}">
                </a>
            </li>
            <li class="nav-item" id="link-buscar">
                <a class="nav-link" href="{{ route('buscar') }}">
                    <span>Medios publicitarios</span>
                </a>
            </li>
            <div class="form-inline">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <i class="fa fa-fw fa-search"></i>
                    </div>
                    <input class="form-control form-control-sm" type="search" placeholder="Buscar medio" aria-label="Buscar">
                </div>
                <style type="text/css">
                    header .form-inline .input-group-prepend {
                        height: 29px;
                        padding: 6px 3px;
                        border: 1px solid {{ config('dondepauto.colores.orange') }};
                        border-right: none;
                        background: rgba(0, 0, 0, 0.5);
                        color: white;
                        position: relative;
                        top: -1px;
                        left: 14px;
                    }
                    header .form-inline input {
                        height: 29px;
                        margin: -1px 15px 0;
                        border: 1px solid {{ config('dondepauto.colores.orange') }} !important;
                        border-left: none !important;
                        color: white !important;
                        background: rgba(0, 0, 0, 0.5) !important;
                    }
                </style>
            </div>
            <li class="nav-item">
                @if( auth()->check() and in_array(auth()->user()->role->name, ['admin', 'medio']) )
                    <a class="nav-link btn btn-nav-orange" href="https://admin.dondepauto.co">Publicar medio</a>
                @else
                    <a class="nav-link btn btn-nav-orange" href="{{ config('app.url') }}/registro?medio">Publicar medio</a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ config('app.url') }}/registro">Regístrate</a>
            </li>
            <li class="nav-item">
                @if( auth()->check() )
                    <a class="nav-link">
                        <form action="https://api.dondepauto.co/logout" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-block" value="Cerrar sesión"
                                style="padding: 0; font-weight: bold; color: white; border: none; background: none;"/>
                        </form>
                    </a>
                @else
                    <a class="nav-link" data-toggle="modal" data-target="#modal-login">Iniciar sesión</a>
                @endif
            </li>
        </ul>
    </div>
</header>
