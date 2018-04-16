<div class="row text-center banner" id="banner-info">
    <div class="full-width vertical-center-content">
        <img src="images/home/icon-info.png" class="header-icon">
        <h2 class="h2">Haz crecer tu negocio con publicidad efectiva</h2>
        <p>En DóndePauto encuentras los medios publicitarios más efectivos para tu negocio y asesoría especializada para que llegues a tus verdaderos clientes.</p>
        <p>Contamos con más de {{ DondePauto\Models\Espacio::total() }} espacios de pauta en todo Colombia para que puedas dar a conocer tu empresa y aumentar la confianza de los clientes que ya te conocen.</p>
    </div>

    <style type="text/css">
        #banner-info {
            background-image: url(images/home/banner-info.png);
        }
        #banner-info .h2 {
            color: {{ config('dondepauto.colores.lightblue') }};
        }
        @media(min-width: 576px) {
            #banner-info p {
                font-size: 1.5rem;
            }
        }
    </style>
</div>
