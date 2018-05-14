<footer class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-3 col-xl-2 text-center">
            <img src="{{ route('files.brand', ['path' => 'logo-light_-h35-cwhite']) }}" class="d-inline d-sm-none">
            <img src="{{ route('files.brand', ['path' => 'logo-light_-h50-cwhite']) }}" class="d-none d-sm-inline">
        </div>
        <div class="col-12 col-sm-6 col-xl-4" id="page-links">
            <table class="table">
                <tr>
                    <td><a href="{{ route('buscar') }}" target="_self">Espacios de pauta</a></td>
                    <td><a href="/blog" target="_self">Blog</a></td>
                </tr>
                <tr>
                    <td><a href="/anunciantes" target="_self">Anunciantes</a></td>
                    <td><a href="/trabajo" target="_self">Ofertas laborales</a></td>
                </tr>
                <tr>
                    <td><a href="{{ route('buscar') }}" target="_self">Medios publicitarios</a></td>
                    <td><a href="{{ route('documento', ['documento' => 'terminos-condiciones']) }}" target="_self">Términos y Condiciones</a></td>
                </tr>
                <tr>
                    <td><a href="/registro" target="_self">Registro</a></td>
                    <td><a href="{{ route('documento', ['documento' => 'politica-privacidad']) }}" target="_self">Política de privacidad</a></td>
                </tr>
                <tr>
                    <td><a href="/contacto" target="_self">Contacto</a></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="col-12 col-sm-3 col-xl-2 text-center">
            <hr class="d-block d-sm-none">
            <b class="text-orange" id="phones">
                @foreach( json_decode(setting('contacto.telefonos')) as $telefono )
                    {{ $telefono->valor }}<br>
                @endforeach
            </b>
            <br>
            <a href="//facebook.com/dondepauto" target="_blank" class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x"></i>
            </a>
            <a href="//twitter.com/dondepauto" target="_blank" class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x"></i>
            </a>
            <a href="//co.linkedin.com/company/dóndepauto-co" target="_blank" class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-linkedin fa-stack-1x"></i>
            </a>
        </div>
    </div>
    <div class="row copyright">
        <div class="col text-center">
            &copy; 2016&nbsp;&nbsp;|&nbsp;&nbsp;Todos los derechos reservados
        </div>
    </div>
</footer>
