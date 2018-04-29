@extends('dondepauto::website.base')

@section('navbar-bg', 'bg-opaque')

@section('content')
    <div class="row espacio-content">
        <!-- -->
    </div>

    @include('dondepauto::website.partials.banner-contactanos')
@endsection

@section('css')
<style type="text/css">
    .main {
        background-color: {{ config('dondepauto.colores.lightgray') }};
    }
    .espacio-content {
        width: 100vw;
        max-width: 992px;
        margin: 15px -15px;
        background-color: white;
    }
    @media(min-width: 576px) {
        .espacio-content {
            margin: 0 auto;
            margin-top: 125px;
            margin-bottom: 15px;
        }
    }
</style>
@endsection
