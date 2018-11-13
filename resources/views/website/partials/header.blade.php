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
                    <span class="d-block d-sm-none">Espacios de pauta</span>
                    <span class="d-none d-sm-block">Conoce nuestros espacios</span>
                </a>
            </li>
            <li class="nav-item nav-separator d-none d-sm-block"></li>
            <li class="nav-item">
                <a class="nav-link btn btn-nav-orange" href="{{ config('app.url') }}/registro">Regístrate</a>
            </li>
            @if( !auth()->check() )
                <li class="nav-item">
                    <a class="nav-link btn btn-nav-orange" data-toggle="modal" data-target="#modal-login">Ingresa</a>
                </li>
            @endif
            <li class="nav-item">
                @if( auth()->check() and in_array(auth()->user()->role->name, ['admin', 'medio']) )
                    <a class="nav-link btn btn-nav-orange-dark" href="https://admin.dondepauto.co">Vende tus espacios</a>
                @else
                    <a class="nav-link btn btn-nav-orange-dark" href="{{ config('app.url') }}/registro">Vende tus espacios</a>
                @endif
            </li>
            @if( auth()->check() )
                <li class="nav-item">
                    <a class="nav-link">
                        <form action="https://api.dondepauto.co/logout" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-block" value="Cerrar sesión"
                                style="padding: 0; font-weight: bold; color: white; border: none; background: none;"/>
                        </form>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</header>
