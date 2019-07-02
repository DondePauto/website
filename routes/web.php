<?php

/*
|--------------------------------------------------------------------------
| Rutas web
|--------------------------------------------------------------------------
|
| Aquí registramos las rutas de la página web de DóndePauto.
| Estas rutas se cargan dentro del Proveedor dentro del grupo "web".
|
*/

Route::get('', function() {
    if( request()->has('aud') or request()->has('cat') or request()->has('pag') ) {
        abort(404); return;
    }
    return view('dondepauto::pages.home');
})->name('home');
Route::get('home', function() {
    return redirect()->away('https://dondepauto.co');
});

Route::get('buscar', function() {
    return view('dondepauto::pages.buscar');
})->name('buscar');

Route::get('registro', function() {
    return view('dondepauto::pages.registro');
})->name('registro');
Route::post('registro', 'Auth\\RegisterController@register');

Route::get('blog', function() {
    return view('dondepauto::pages.blogs');
})->name('blogs');

Route::get('activar', function() {
    $codigo  = isset(array_keys(request()->query())[0]) ? array_keys(request()->query())[0] : null;
    $usuario = \DondePauto\Models\Usuario::where('activation_token', $codigo)->first();
    $role    = DB::table('roles')->where('id', $usuario->role_id)->first();

    return view('dondepauto::pages.activar-'.$role->name, compact('usuario', 'codigo'));
})->name('activar');

Route::get('login', function() {
    return view('dondepauto::pages.home');
})->name('login');
Route::post('login', function() {
    if( Illuminate\Support\Facades\Auth::attempt(request()->only(['email', 'password'])) ) {
        if( Illuminate\Support\Facades\Auth::user()->role->name=='medio' ) {
            return redirect()->away('https://admin.dondepauto.co');
        }
    }

    if( request()->has('redirect') )
        return redirect()->away('https://'.request()->redirect);
    else
        return redirect()->away(config('app.url'));
});
Route::post('logout', function() {
    $session = DB::table('sessions')->get()->first(function($session) {
        $payload = unserialize(base64_decode($session->payload));
        return $payload['_token']==request()->_token;
    });

    DB::connection('dondepauto')->table('usuarios')->where('id', auth()->id())->update(['remember_token' => null]);
    DB::table('sessions')->where('id', $session->id)->delete();
    auth()->logout();

    if( request()->has('redirect') )
        return redirect()->away('https://'.request()->redirect);
    else
        return redirect()->away(config('app.url'));
});

Route::get('espacios/{espacio}', function( \DondePauto\Models\Espacio $espacio ) {
    DB::connection('dondepauto')->table('__vistas')->insert([
        'usuario_id' => Auth::check() ? Auth::id() : null,
        'espacio_id' => $espacio->id,
    ]);
    return view('dondepauto::pages.espacio', compact('espacio'));
})->name('espacio');
Route::get('blog/{blog}', function( \DondePauto\Models\Extras\Blog $blog) {
    if( !$blog->visible )
        return abort(404);
    $blog->increment('vistas');
    return view('dondepauto::pages.blog', compact('blog'));
})->name('blog');

Route::get('documento/{documento}', function( $documento ) {
    $url = '/documento/'.$documento;
    $documento = collect(json_decode(setting('administracion.documentos')))
        ->first(function($documento) use ($url) {
            return $documento->tipo=='web' and $documento->url==$url;
        });
    if( $documento )
        return view('dondepauto::pages.documento', compact('documento'));
    return redirect()->away(config('app.url'));
})->name('documento');

// Hojas de estilo y scripts globales
Route::get('style.css', function() {
    $assets = realpath(__DIR__.'/../dist/assets.json');
    if( $assets )
        $style = json_decode(file_get_contents($assets), true)['styles/main.css'];
    else
        $style = 'styles/main.css';

    $style = file_get_contents(realpath(__DIR__.'/../dist/'.$style));
    return response($style)->header('Content-Type', 'text/css');
});
Route::get('script.js', function() {
    $assets = realpath(__DIR__.'/../dist/assets.json');
    if( $assets )
        $script = json_decode(file_get_contents($assets), true)['scripts/main.js'];
    else
        $script = 'scripts/main.js';

    $script = file_get_contents(realpath(__DIR__.'/../dist/'.$script));
    return response($script)->header('Content-Type', 'text/css');
});

// Imágenes
Route::get('images/{path}', function( $path ) {
    $path = realpath(__DIR__.'/../resources/assets/images/'.$path);
    if( !$path )
        return redirect()->away(env('APP_URL'));
    return response()->file($path);
})->where('path', '.+');
