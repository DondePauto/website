<!-- META TAGS -->
<?php define('RUTA', request()->route() ? request()->route()->getName() : 'home'); ?>

<title>@yield('title', config('app.name').' - '.setting('website.descripcion_'.RUTA))</title>
<meta name="description" content="@yield('description', setting('website.descripcion_'.RUTA))">
<meta name="copyright" content="{{ config('app.name') }}">
<meta name="author" content="{{ config('app.name') }}">
<meta name="application-name" content="{{ config('app.name') }}">

<!-- FACEBOOK TAGS -->
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->fullUrl() }}">
<meta property="og:title" content="@yield('title', config('app.name').' - '.setting('website.descripcion_'.RUTA))">
<meta property="og:description" content="@yield('description', setting('website.descripcion_'.RUTA))">
<meta property="og:image" content="@yield('image', route('files.favicons', ['path' => 'android-chrome-192x192.png']))">
<meta property="og:locale" content="es_CO">

<!-- TWITTER TAGS -->
<meta name="twitter:card" content="@yield('description', setting('website.descripcion_'.RUTA))">
<meta name="twitter:site" content="{{ '@'.json_decode(setting('contacto.social'))->twitter }}">
<meta name="twitter:title" content="@yield('title', config('app.name').' - '.setting('website.descripcion_'.RUTA))">
<meta name="twitter:description" content="@yield('description', setting('website.descripcion_'.RUTA))">
<meta name="twitter:image" content="@yield('image', route('files.favicons', ['path' => 'android-chrome-192x192.png']))">

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-48519849-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-48519849-1');
</script>
