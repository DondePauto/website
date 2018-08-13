<div class="row text-center" id="espacios-destacados">
    <div class="full-width">
        <img src="images/home/icon-destacados.png" class="header-icon">
        <h2 class="h2">Los espacios más destacados</h2>
        <div class="row">
            @foreach( DondePauto\Models\Espacio::destacados() as $espacio )
                <div class="col-6 col-sm-3">
                    <div class="card card-espacio">
                        <div class="card-img-top" style="background-image:url(//files.dondepauto.co/{{ $espacio->miniatura }});"></div>
                        <div class="card-body text-center">
                            <div class="card-title">{{ $espacio->titulo }}</div>
                            <hr class="card-separator">
                            <div class="categoria">{{ $espacio->data->categoria==null ? '' : $espacio->data->categoria->nombre }}</div>
                            <a href="{{ route('espacio', compact('espacio')) }}" target="_blank" type="button" class="btn btn-danger btn-ver-mas">
                                <b>Ver más</b>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('buscar') }}" type="button" class="btn btn-lg btn-danger" id="btn-buscar-espacios">
            <span>Conoce nuestros espacios</span> <i class="fa fa-fw fa-chevron-right"></i>
        </a>
    </div>

    <style type="text/css">
        #espacios-destacados #btn-buscar-espacios {
            margin: 20px auto;
            font-size: 16px;
            font-weight: bold;
            color: white;
        }
        #espacios-destacados .full-width {
            padding: 15px;
        }
        #espacios-destacados .h2 {
            margin-bottom: 15px;
        }
        #espacios-destacados .row {
            margin-right: -7.5px;
            margin-left: -7.5px;
        }
        #espacios-destacados .row>div {
            padding: 0 7.5px;
        }
        @media(min-width: 576px) {
            #espacios-destacados #btn-buscar-espacios {
                margin: 50px auto;
                font-size: 25px;
            }
            #espacios-destacados .row {
                margin-right: calc(5% - 7.5px);
                margin-left: calc(5% - 7.5px);
            }
        }
    </style>
</div>
