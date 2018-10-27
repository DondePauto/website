@extends('dondepauto::website.base')

@section('content')
    @include('dondepauto::website.partials.home.banner-buscar')

    @include('dondepauto::website.partials.home.banner-info')

    @include('dondepauto::website.partials.home.banner-registrar')

    @include('dondepauto::website.partials.home.espacios-destacados')

    @include('dondepauto::website.partials.home.banner-blog')

    {{-- BOTON DE ASESORIA --}}
    <button type="button" class="btn btn-success" id="btn-soporte" data-toggle="modal" data-target="#modal-asesoria">
        <img src="/images/icon-soporte.png">
    </button>

    {{-- MODALS --}}
    @include('dondepauto::website.modals.asesoria')
    @if( !auth()->check() )
        @include('dondepauto::website.modals.home-registro')
    @endif
    @if( !auth()->check() or !in_array(auth()->user()->role->name, ['admin', 'anunciante']) )
        @include('dondepauto::website.modals.login')
        @include('dondepauto::website.modals.reset-password')
    @endif
@endsection

@section('css')
<style type="text/css">
    @font-face {
        font-family: voyager;
        src: url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.eot') }});
        src: url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.eot?#iefix') }}) format("embedded-opentype"),
             url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.woff') }}) format("woff"),
             url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.ttf') }}) format("truetype"),
             url({{ asset('vendor/tcg/voyager/assets/fonts/voyager.svg#voyager') }}) format("svg");
        font-weight:400;
        font-style:normal;
    }
    .voyager { font-family: voyager; font-size: 25px; }
    .voyager-bubble:before { content:"\e011" } .voyager-megaphone:before { content:"\e00e" }

    .home .h1 {
        text-transform: uppercase;
        text-shadow: 3px 3px 12px rgba(0, 0, 0, 0.7);
    }
    .home .h1 span:last-of-type {
        font-size: 1.5rem;
        line-height: 1.5rem;
        text-transform: none;
    }
    @media(min-width:576px) {
        .home .h1 span:last-of-type {
            font-size: 2.25rem;
            line-height: 2.25rem;
        }
        .home .h2 {
            margin-bottom: 30px;
        }
    }
</style>
@endsection
