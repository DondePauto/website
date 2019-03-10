<div class="row text-center" id="espacios-filtrados">
    <div class="full-width">
        <div class="row">
            <?php $espacios = DondePauto\Models\Espacio::filtrados(); ?>
            @foreach( $espacios as $espacio )
                <div class="col-6 col-sm-3">
                    <div class="card card-espacio">
                        <div class="card-img-top" style="background-image:url({{ $espacio->thumbnail }});"></div>
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
            {{ $espacios->appends(request()->input())->links('dondepauto::website.partials.buscar.paginacion') }}
        </div>
    </div>

    <style type="text/css">
        #espacios-filtrados .full-width {
            padding: 15px;
        }
        #espacios-filtrados .row {
            margin-right: -7.5px;
            margin-left: -7.5px;
        }
        #espacios-filtrados .row>div {
            padding: 0 7.5px;
        }
        @media(min-width: 576px) {
            #espacios-filtrados .row {
                margin-right: calc(5% - 7.5px);
                margin-left: calc(5% - 7.5px);
            }
        }
        @media(min-width: 768px) {
            #espacios-filtrados .row {
                margin-right: calc(10% - 7.5px);
                margin-left: calc(10% - 7.5px);
            }
        }
    </style>
</div>
