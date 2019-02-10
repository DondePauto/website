@if( !empty($espacio->data->restricciones) and $espacio->data->restricciones[0]!=='' )
    <div class="row">
        <div class="section-header">
            <i class="fa fa-fw fa-lg fa-times-circle-o text-danger"></i>&nbsp;Restricciones
        </div>
        <div class="col-12 col-sm-8 section-content">
            @foreach( $espacio->data->restricciones as $restriccion )
                {{ $restriccion }}{{ $loop->last ? '' : ', ' }}
            @endforeach
        </div>
    </div>
@endif
