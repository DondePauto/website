<div class="row text-center banner" id="banner-buscar">
    <div class="full-width vertical-center-content">
        <h1 class="h1">
            <span>Encuentra los mejores</span>
            <span><br><a href="/buscar" id="banner-home-link">medios publicitarios</a> para tu marca o producto</span>
        </h1>
        <div id="form">
            <div class="input-group input-group-lg">
                <input type="text" placeholder="Buscar medio" class="form-control" id="palabra">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger" id="btn-buscar">
                        <i class="fa fa-fw fa-lg fa-search fa-flip-horizontal d-block d-sm-none"></i>
                        <b class="d-none d-sm-block">Buscar</b>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .home .h1 span:last-of-type {
            font-size: 1.4rem;
            line-height: 1.4rem;
        }
        #banner-buscar {
            color: white;
            background-image: url(images/home/banner-home.png);
            background-size: 132.5%;
            background-position: 15% 0%;
        }
        #banner-home-link {
            color: {{ config('dondepauto.colores.orange') }};
            text-transform: uppercase;
            text-decoration: none;
        }
        #banner-buscar #form {
            margin-top: 45px;
        }
        @media(max-width: 576px) {
            #banner-buscar {
                background-size: cover;
                background-position-x: 0%;
            }
        }
        @media(min-width: 576px) {
            #banner-buscar #form {
                width: 75%;
                margin: 45px 12.5% 0;
            }
        }
    </style>
</div>
