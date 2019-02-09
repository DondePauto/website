<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    @include('dondepauto::website.partials.seo')
    @include('dondepauto::partials.favicons')
    @include('dondepauto::website.partials.head')
    @yield('css')
</head>
<body class="{{ request()->route() ? request()->route()->getName() : '' }}">
    <div class="main" role="document">
        @include('dondepauto::website.partials.header')

        <div class="container-fluid" id="content">
            @yield('content')
        </div>

        @include('dondepauto::website.partials.footer')
    </div>
    <div class="modal fade" id="modal-alert" tabindex="-1" role="dialog" aria-labelledby="#modal-alert" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center font-weight-bold" id="modal-alert-title" style="width: 100vw;"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 10px 30px;"></div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-orange" data-dismiss="modal" style="margin: 0 auto;">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    @yield('javascript')
    @include('dondepauto::website.partials.foot')
</body>
</html>
