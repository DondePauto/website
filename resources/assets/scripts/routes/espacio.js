/* global $ */
export default {
    init() {
        $(function() {
            /**
             * Establece el tamaño del carrusel de imágenes.
             */
            $(window).resize(function() {
                $('#carousel-imagenes .carousel-item').css('minHeight', $('#carousel-imagenes .carousel-item').width()*9/16);
                $('#carousel-imagenes .carousel-item').css('maxHeight', $('#carousel-imagenes .carousel-item').width()*9/16);
            }).resize();

            /**
             * Evento 'click' de la galería de imágenes y video.
             */
            $('#header-imagenes').click(function() {
                $('#header-video').removeClass('lightblue');
                $('#espacio-video').hide();

                $('#header-imagenes').addClass('lightblue');
                $('#carousel-imagenes').show();
            });
            $('#header-video').click(function() {
                $('#header-imagenes').removeClass('lightblue');
                $('#carousel-imagenes').hide();

                $('#header-video').addClass('lightblue');
                $('#espacio-video').show();
            });

            /**
             * Evento 'click' de los botones de compartir.
             */
            $('.btn-share').click(function(event) {
                event.preventDefault();
                var size = 'height=400, width=600, top=' + (($(window).height()/2) - 200) + ', left=' + (($(window).width()/2) - 300);
                var opts = ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0';
                window.open($(this).attr('href'), 'share', size + opts);
                return false;
            });

            /**
             * Evento 'ps-scroll-y' del contenedor principal.
             */
            $('.espacio-content .sidebar').css('top', $($('.espacio-content>.container-fluid>.row').get(0)).height()+'px');
            $('.main').on('ps-scroll-y', function() {
                var container = $('.espacio-content>.container-fluid');
                var title     = $('.espacio-content>.container-fluid>.row').get(0);
                var content   = $('.espacio-content>.container-fluid>.row').get(1);

                // Barra lateral
                if( $(content).offset().top<0 ) {
                    var offset = $(title).height()-$(content).offset().top;
                    if( (offset+$('.sidebar').height()-15)<$(container).height() )
                        $('.espacio-content .sidebar').css('top', offset+'px');
                    else
                        $('.espacio-content .sidebar').css('top', ($(container).height()-$('.sidebar').height()+15)+'px');
                } else {
                    $('.espacio-content .sidebar').css('top', $(title).height()+'px');
                }
            });
        });
    },
    finalize() {
        // JavaScript to be fired on the 'espacio' page, after the init JS
    },
};
