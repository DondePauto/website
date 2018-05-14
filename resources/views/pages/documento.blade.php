@extends('dondepauto::website.base')

@section('navbar-bg', 'bg-opaque')

@section('title', config('app.name').' - '.$documento->nombre)

@section('content')
    <div class="row documento-content">
        {!! Storage::get(str_replace('/documento/', 'administracion/', $documento->url).'.html') !!}
    </div>
@endsection

@section('css')
<style type="text/css">
    .main {
        background-color: {{ config('dondepauto.colores.lightgray') }};
    }
    .documento-content {
        width: 100vw;
        max-width: 992px;
        margin: 15px -15px;
        padding: 15px 0;
    }
    .documento-content>.container-fluid {
        margin-top: 12px;
        padding: 15px;
        font-size: 12px;
        background-color: white;
        position: relative;
    }
    .documento-content .h1,
    .documento-content .h2 {
        color: {{ config('dondepauto.colores.gray') }};
    }
    .documento-content .h1 {
        font-size: 24px;
        line-height: 26px;
    }
    .documento-content .h2 {
        font-size: 14px;
        line-height: 16px;
    }
    @media(min-width: 576px) {
        .documento-content {
            width: 100%;
            margin: 0 auto;
            margin-top: 125px;
            margin-bottom: 15px;
        }
        .documento-content>.container-fluid {
            margin-top: 24px;
            padding: 25px;
            font-size: 14px;
        }
        .documento-content .h1 {
            font-size: 48px;
            line-height: 52px;
        }
        .documento-content .h2 {
            font-size: 18px;
            line-height: 20px;
        }
    }
</style>
@endsection
