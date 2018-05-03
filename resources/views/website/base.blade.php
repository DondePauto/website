<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    @include('dondepauto::website.partials.seo')
    @include('dondepauto::favicons')
    @include('dondepauto::website.partials.head')
    @yield('css')
</head>
<body class="{{ request()->route() ? request()->route()->getName(): '' }}">
    <div class="main" role="document">
        @include('dondepauto::website.partials.header')

        <div class="container-fluid" id="content">
            @yield('content')
        </div>

        @include('dondepauto::website.partials.footer')
    </div>

    @yield('javascript')
    @include('dondepauto::website.partials.foot')
</body>
</html>
