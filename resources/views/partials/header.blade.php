<header class="navbar navbar-expand-sm fixed-top">
    <a href="{{ home_url('/') }}" class="navbar-brand">
        <img src="https://files.dondepauto.co/brand/logo-white.png?h=35" class="d-inline d-sm-none">
        <img src="https://files.dondepauto.co/brand/logo-white.png?h=50" class="d-none d-sm-block">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse"
        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-fw fa-bars"></i>
    </button>
    <div class="navbar-backdrop" data-toggle="collapse"></div>
    <div class="navbar-collapse" data-toggle="collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-block d-sm-none" id="link-home">
                <a class="nav-link" href="{{ home_url('/') }}">
                    <img src="https://files.dondepauto.co/brand/logo-icon-h.png?h=35&color=white">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ home_url('/buscar') }}">
                    <span class="d-block d-sm-none">Espacios de pauta</span>
                    <span class="d-none d-sm-block">Conoce nuestros espacios</span>
                </a>
            </li>
            <li class="nav-item nav-separator d-none d-sm-block"></li>
            <li class="nav-item">
                <a class="nav-link btn btn-orange" href="{{ home_url('/registro') }}">Regístrate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-orange" data-toggle="modal" data-target="#modal-login">Ingresa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-orange-dark" href="{{ home_url('/registro') }}">Vende tus espacios</a>
            </li>
        </ul>
    </div>
</header>
