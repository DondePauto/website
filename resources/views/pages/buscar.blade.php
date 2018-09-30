@extends('dondepauto::website.base')

@section('content')
    @include('dondepauto::website.partials.buscar.banner-buscar')

    @if( !empty(request()->except('page')) )
        @include('dondepauto::website.partials.buscar.filtros-seleccionados')
    @endif

    @include('dondepauto::website.partials.buscar.espacios-filtrados')

    @include('dondepauto::website.partials.banner-contactanos')

    {{-- BOTON DE ASESORIA --}}
    <button type="button" class="btn btn-success" id="btn-soporte" data-toggle="modal" data-target="#modal-asesoria">
        <img src="/images/icon-soporte.png">
    </button>

    {{-- MODALS --}}
    @include('dondepauto::website.modals.asesoria')
    @if( !auth()->check() or !in_array(auth()->user()->role->name, ['admin', 'anunciante']) )
        @include('dondepauto::website.modals.home-registro')
        @include('dondepauto::website.modals.login')
        @include('dondepauto::website.modals.reset-password')
    @endif
@endsection

@section('css')
<style type="text/css">
    .buscar .h1 {
        text-shadow: 3px 3px 12px rgba(0, 0, 0, 0.7);
    }
</style>
@endsection
