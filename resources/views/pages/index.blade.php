@extends('dondepauto::website.base')

@section('content')
    @include('dondepauto::website.partials.home.banner-buscar')

    @include('dondepauto::website.partials.home.banner-info')

    @include('dondepauto::website.partials.home.banner-registrar')

    @include('dondepauto::website.partials.home.espacios-destacados')

    @include('dondepauto::website.partials.home.banner-blog')
@endsection

@section('css')
<style type="text/css">
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
