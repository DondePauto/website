<!-- Meta tags -->
<title>@yield('title', config('app.name').' - '.setting('website.descripcion'))</title>
<meta name="description" content="@yield('description', setting('website.descripcion'))">
<meta name="copyright" content="{{ config('app.name') }}">
<meta name="author" content="{{ config('app.name') }}">
<meta name="application-name" content="{{ config('app.name') }}">

<!-- Facebook tags -->
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->fullUrl() }}">
<meta property="og:title" content="@yield('title', config('app.name').' - '.setting('website.descripcion'))">
<meta property="og:description" content="@yield('description', setting('website.descripcion'))">
<meta property="og:image" content="@yield('image', '//files.dondepauto.co/favicons/android-chrome-192x192.png')">
<meta property="og:locale" content="es_CO">

<!--Twitter tags-->
<meta name="twitter:card" content="@yield('description', setting('website.descripcion'))">
<meta name="twitter:site" content="{{ '@'.json_decode(setting('contacto.social'))->twitter }}">
<meta name="twitter:title" content="@yield('title', config('app.name').' - '.setting('website.descripcion'))">
<meta name="twitter:description" content="@yield('description', setting('website.descripcion'))">
<meta name="twitter:image" content="@yield('image', '//files.dondepauto.co/favicons/android-chrome-192x192.png')">
