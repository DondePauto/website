<div class="row text-center banner" id="banner-contactanos">
    <div class="full-width vertical-center-content">
        <img src="/images/icon-contactanos.png" class="header-icon">
        <p>
            <span>¿Necesitas ayuda? Comunícate directamente con nosotros</span><br>
            <span class="text-orange">
                @foreach( json_decode(setting('contacto.telefonos')) as $telefono )
                    <b>{{ $telefono->valor }}</b>
                    @if( !$loop->last ) <b> - </b> @endif
                @endforeach
            </span>
        </p>
    </div>

    <style type="text/css">
        #banner-contactanos {
            height: 35vh;
            background-color: #f2f2f2;
        }
        @media(min-width: 576px) {
            #banner-contactanos p {
                font-size: 1.5rem;
            }
        }
    </style>
</div>
