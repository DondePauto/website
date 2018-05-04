<div class="row">
    <div class="section-header">
        <i class="fa fa-fw fa-lg fa-users"></i>&nbsp;Audiencias
    </div>
    <div class="col-12 col-sm-8 section-content">
        <b>Escenarios de impacto:</b><br>
        @foreach( $espacio->data->escenarios as $escenario )
            {{ $escenario->nombre }}{{ $loop->last ? '' : ', ' }}
        @endforeach
    </div>
    <div class="col-12 col-sm-8 section-content">
        <b>Impactos estimados:</b><br>
        {{ $espacio->data->impactos }} por {{ $espacio->data->periodo }}
    </div>
    <div class="col-12 col-sm-8 section-content">
        <b>Ciudades:</b><br>
        @foreach( $espacio->data->ciudades as $ciudad )
            {{ $ciudad->nombre }}{{ $loop->last ? '' : ', ' }}
        @endforeach
    </div>
    @foreach( DondePauto\Models\Extras\Termino::audiencias() as $tipo )
        <?php $audiencias = collect($espacio->data->audiencias)->where('tipo', $tipo->tipo); ?>
        @if( $audiencias->isNotEmpty() )
            <div class="col-12 col-sm-8 section-content">
                <b>{{ $tipo->tipo }}:</b><br>
                @if( $tipo->tipo=='Ingresos' )
                    <?php
                        $texto = $audiencias->implode('nombre', ', '); preg_match_all('/- (.*?), (.*?) /', $texto, $matches);
                        foreach( $matches[0] as $idx=>$match ) {
                            if( $matches[1][$idx]==$matches[2][$idx] )
                                $texto = str_replace($match, '', $texto);
                        }
                    ?>
                    {{ $texto }}
                @else
                    @foreach( $audiencias as $audiencia )
                        {{ $audiencia->nombre }}{{ $loop->last ? '' : ', ' }}
                    @endforeach
                @endif
            </div>
        @endif
    @endforeach
</div>
