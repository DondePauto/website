<header class="navbar navbar-expand-sm fixed-top @yield('navbar-bg', 'bg-transparent')">
    <a href="{{ config('app.url') }}" class="navbar-brand">
        <img src="//files.dondepauto.co/brand/logo-light_-h35.png" class="d-inline d-sm-none">
        <img src="//files.dondepauto.co/brand/logo-light_-h50.png" class="d-none d-sm-inline brand-light">
        <img src="//files.dondepauto.co/brand/logo-dark_-h50.png" class="d-none d-sm-inline brand-dark">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse"
        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    <div class="navbar-backdrop" data-toggle="collapse"></div>
    <div class="navbar-collapse" data-toggle="collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-block d-sm-none" id="link-home">
                <a class="nav-link" href="{{ config('app.url') }}">
                    <img src="//files.dondepauto.co/brand/logo-light_-h35-cwhite.png">
                </a>
            </li>
            <li class="nav-item" id="link-buscar">
                <a class="nav-link" href="{{ config('app.url') }}/buscar">
                    <span class="d-block d-sm-none">Espacios de pauta</span>
                    <span class="d-none d-sm-block">Conoce nuestros espacios</span>
                </a>
            </li>
            <li class="nav-item nav-separator d-none d-sm-block"></li>
            <li class="nav-item">
                <a class="nav-link btn btn-nav-orange" href="{{ config('app.url') }}/registro">Regístrate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-nav-orange" data-toggle="modal" data-target="#modal-login">Ingresa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-nav-orange-dark" href="{{ config('app.url') }}/registro">Vende tus espacios</a>
            </li>
        </ul>
    </div>
</header>
