/* global $ */
import PerfectScrollbar from 'perfect-scrollbar';

export default {
    init() {
        /**
         * Establece la altura mínima del contenedor principal.
         * Inicialización de Perfect Scrollbar.
         */
        var ps; $(function() {
            $(window).resize(function() {
                var min_height = $(window).height() - $('footer').height() - parseInt($('.main').css('top'), 10);
                $('.main>.container-fluid:not(footer)').css('minHeight', (min_height - (parseInt($(window).width(), 10)<576 ? 10 : 0))+'px');

                if( ps ) ps.destroy();
                ps = new PerfectScrollbar('.main', {suppressScrollX: true}); ps.update();
            }).resize();
        });

        /**
         * Habilita el colapso de la barra de navigación desde el lado izquierdo.
         */
        $(function() {
            // Habilita el colapso cuando hacemos click sobre el botón o el fondo.
            $('.navbar-toggler, .navbar-backdrop').click(function() {
                $('header').attr('temporal-toggle', $('header').attr('toggle'));
                $('header').attr('toggle', 'true');
            });

            // Respuesta al cambio de estado de colapso de la barra de navegación.
            $('header [data-toggle=collapse]').click(function() {
                var STEP = function( current, animation ) {
                    var expanded = $('.navbar-toggler').attr('aria-expanded');
                    var limit = expanded==='true' ? animation.end : animation.start;
                    $('.navbar-toggler, .navbar-brand, .main').css('left', (current-limit) + animation.unit);
                    $('.navbar-backdrop').css('opacity', Math.abs((current-limit)/limit));
                };
                var COMPLETE = function() {
                    var expanded = $('.navbar-toggler').attr('aria-expanded');
                    $('.navbar-toggler').attr('aria-expanded', expanded==='false' ? 'true' : 'false');
                    if( expanded==='true' ) {
                        $('header').attr('toggle', 'false');
                        $('header').removeAttr('temporal-toggle');
                        $('.navbar-backdrop').css('display', 'none');
                        ps = new PerfectScrollbar('.main', {suppressScrollX: true}); ps.update();
                    }
                };
                if( $('header').attr('toggle')==='true' ) {
                    var expanded = $('.navbar-toggler').attr('aria-expanded');
                    var toLeft   = expanded==='true' ? ('-'+$('.navbar-collapse').width()+'px') : '0px';
                    if( expanded==='false' ) {
                        ps.destroy(); ps = null;
                        $('.main').css('position', 'relative');
                        $('.navbar-backdrop').css('display', 'block');
                    }
                    $('.navbar-collapse').animate({left: toLeft}, {duration: 500, step: STEP, complete: COMPLETE});
                }
            });
        });

        /**
         * Establece las mágenes de Espacios cuadradas.
         */
        $(function() {
            $(window).resize(function() {
                $('.card-espacio .card-img-top').css('minHeight', $('.card-espacio .card-img-top').width());
                $('.card-espacio .card-img-top').css('maxHeight', $('.card-espacio .card-img-top').width());
            }).resize();
        });
    },
    finalize() {
        $(window).resize();
    },
};
