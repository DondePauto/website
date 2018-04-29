@if( $paginator->hasPages() )
<div class="col-12" id="pagination">
    <nav aria-label="Páginas de resultados">
        <ul class="pagination">
            <li class="page-item{{ $paginator->onFirstPage() ? ' disabled' : '' }}" id="page-link-previous">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link">
                    <i class="fa fa-fw fa-chevron-left d-block d-sm-none"></i>
                    <b class="d-none d-sm-block">Anterior</b>
                </a>
            </li>

            @foreach( $elements as $element )
                @if( is_string($element) )
                    <li class="page-item disabled">
                        <a href="#" class="page-link">{{ $element }}</a>
                    </li>
                @endif
                
                @if( is_array($element) )
                    @foreach( $element as $page=>$url )
                        @if( $page==$paginator->currentPage() )
                            <li class="page-item active">
                                <a href="#" class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <li class="page-item{{ $paginator->hasMorePages() ? '' : ' disabled' }}" id="page-link-next">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link">
                    <i class="fa fa-fw fa-chevron-right d-block d-sm-none"></i>
                    <b class="d-none d-sm-block">Siguiente</b>
                </a>
            </li>
        </ul>
    </nav>

    <style type="text/css">
        #pagination {
            height: 75px;
        }
        #pagination nav {
            position: relative;
        }
        #pagination ul.pagination {
            margin: 1rem 0;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        #pagination .page-item {
            width: 40px;
            margin: 0 2.5px;
        }
        #pagination .page-item:first-of-type,
        #pagination .page-item:last-of-type {
            width: 115px;
        }
        #pagination .page-link {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            color: {{ config('dondepauto.colores.dark') }};
            border: 1px solid transparent;
        }
        #pagination .active .page-link {
            font-weight: bold;
            color: {{ config('dondepauto.colores.red') }};
            background-color: transparent;
        }
        #pagination #page-link-previous .page-link,
        #pagination #page-link-next .page-link {
            color: white;
            background-color: {{ config('dondepauto.colores.red') }};
            border-color: {{ config('dondepauto.colores.red') }};
        }
        #pagination .disabled .page-link {
            opacity: 0.65;
        }
    </style>
</div>
@endif
