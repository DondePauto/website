@extends('dondepauto::website.base')

@section('content')
    @include('dondepauto::website.partials.buscar.banner-buscar')

    @if( !empty(request()->except('page')) )
        @include('dondepauto::website.partials.buscar.filtros-seleccionados')
    @endif

    @include('dondepauto::website.partials.buscar.espacios-filtrados')

    @include('dondepauto::website.partials.banner-contactanos')
@endsection

@section('css')
<style type="text/css">
    .buscar .h1 {
        text-shadow: 3px 3px 12px rgba(0, 0, 0, 0.7);
    }
</style>
@endsection
