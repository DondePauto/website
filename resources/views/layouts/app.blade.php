<!DOCTYPE html>
<html @php( language_attributes() )>
@include('partials.head')

<body @php( body_class() )>
    @php( do_action('get_header') )

    <div class="main" role="document">
        @include('partials.header')

        <div class="content">
            @yield('content')
        </div>

        @include('partials.footer')
    </div>

    @php( do_action('get_footer') )
    @php( wp_footer() )
</body>
</html>
