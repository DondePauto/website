<div class="row">
    <div class="section-header">
        <i class="fa fa-fw fa-lg fa-check-circle-o"></i>&nbsp;Información Básica
    </div>
    <div class="w-100"></div>
    <div class="col-6 col-sm-4 section-content">
        <b>Categoría:</b><br>
        {{ $espacio->data->categoria ? $espacio->data->categoria->nombre : '' }}
    </div>
    <div class="col-6 col-sm-4 section-content">
        <b>Subcategoría:</b><br>
        {{ $espacio->data->subcategoria->nombre }}
    </div>
    <div class="w-100"></div>
    <div class="col-6 col-sm-4 section-content">
        <b>Formato:</b><br>
        {{ $espacio->data->formato->nombre }}
    </div>
    <div class="col-6 col-sm-4 section-content">
        @if( $espacio->data->dimensiones )
            <b>Dimensiones:</b><br>
            {{ $espacio->data->dimensiones }}
        @endif
    </div>
</div>
