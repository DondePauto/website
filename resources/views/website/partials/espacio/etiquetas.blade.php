@if( !empty($espacio->data->etiquetas) )
    <div class="row">
        <div class="section-header">
            <i class="fa fa-fw fa-lg fa-tags"></i>&nbsp;Etiquetas
        </div>
        <div class="col-12 col-sm-8 section-content">
            @foreach( $espacio->data->etiquetas as $etiqueta )
                <div class="etiqueta-espacio">{{ ucwords(strtolower($etiqueta)) }}</div>
            @endforeach
        </div>
        <style type="text/css">
            .etiqueta-espacio {
                margin: 2.5px 1.25px;
                padding: 2.5px 5px;
                border: 1px solid {{ config('dondepauto.colores.gray') }};
                background-color: {{ config('dondepauto.colores.lightgray') }};
                display: inline-block;
            }
        </style>
    </div>
@endif
