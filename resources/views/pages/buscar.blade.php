@extends('dondepauto::website.base')

@section('content')
    @include('dondepauto::website.partials.buscar.banner-buscar')

    @if( !empty(request()->except('page')) )
        @include('dondepauto::website.partials.buscar.filtros-seleccionados')
    @endif

    @include('dondepauto::website.partials.buscar.espacios-filtrados')

    @include('dondepauto::website.partials.banner-contactanos')

    {{-- BOTON DE ASESORIA --}}
    <button type="button" class="btn btn-success btn-fab" id="btn-soporte" data-toggle="modal" data-target="#modal-asesoria">
        <img src="/images/icon-soporte.png" data-toggle="tooltip" data-placement="left" title="Solicitar asesoría">
    </button>
    {{-- BOTON DE AGREGAR ESPACIOS --}}
    @if( auth()->check() and in_array(auth()->user()->role->name, ['admin', 'medio']) )
        <a href="https://admin.dondepauto.co" type="button" class="btn btn-danger btn-fab" id="btn-agregar"
            data-toggle="tooltip" data-placement="left" title="Agregar espacios">
            <i class="fa fa-fw fa-2x fa-plus"></i>
        </a>
    @endif

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
    #btn-soporte {
        background: #00aa4e;
    }
    #btn-agregar {
        background: #d43f3a;
        bottom: 100px;
    }
    #btn-agregar i {
        margin: 12.5px 0;
    }
</style>
@endsection
