<div class="row" id="filtros-seleccionados">
    <div class="col-12">
        <b>Filtros seleccionados:</b><br>
        @foreach( DondePauto\Models\Extras\Termino::categorias(true) as $categoria )
            <span class="badge badge-pill badge-danger badge-filtro" data-type="categoria" data-target="{{ $categoria->id }}">
                <b>Categoría: </b><span>{{ $categoria->nombre }}</span>
                <i class="fa fa-fw fa-times"></i>
            </span>
        @endforeach
        @foreach( DondePauto\Models\Extras\Termino::escenarios(true) as $escenario )
            <span class="badge badge-pill badge-danger badge-filtro" data-type="escenario" data-target="{{ $escenario->id }}">
                <b>Escenario: </b><span>{{ $escenario->nombre }}</span>
                <i class="fa fa-fw fa-times"></i>
            </span>
        @endforeach
        @foreach( DondePauto\Models\Extras\Termino::audiencias(true) as $tipo )
            @foreach( $tipo->audiencias as $audiencia )
                <span class="badge badge-pill badge-danger badge-filtro" data-type="{{ $tipo->tipo_slug }}" data-target="{{ $audiencia->id }}">
                    <b>{{ $tipo->tipo }}: </b><span>{{ $audiencia->nombre }}</span>
                    <i class="fa fa-fw fa-times"></i>
                </span>
            @endforeach
        @endforeach
        @foreach( DondePauto\Models\Extras\Termino::ciudades(true) as $ciudad )
            <span class="badge badge-pill badge-danger badge-filtro" data-type="ciudad" data-target="{{ $ciudad->id }}">
                <b>Ciudad: </b><span>{{ $ciudad->nombre }}</span>
                <i class="fa fa-fw fa-times"></i>
            </span>
        @endforeach
    </div>

    <style type="text/css">
        #filtros-seleccionados {
            padding: 15px 0;
            background: #f2f2f2;
        }
        #filtros-seleccionados i.fa-times {
            cursor: pointer;
        }
    </style>
</div>
