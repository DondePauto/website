/* global $ */
import PerfectScrollbar from 'perfect-scrollbar';

export default {
    init() {
        /**
         * Activa los tooltips de todos los elementos que lo definan.
         */
        $('[data-toggle=tooltip]').tooltip();

        /**
         * Obtiene el evento de fin de animacion para el explorador actual.
         * Este evento es usado por animate.css.
         */
        window.ANIMATION_END = (function () {
            var e = document.createElement('element');
            var animations = {
                animation       : 'animationend',
                OAnimation      : 'oAnimationEnd',
                MozAnimation    : 'animationend',
                WebkitAnimation : 'webkitAnimationEnd',
            };
            for( var k in animations ) {
                if( e.style[k]!==undefined )
                    return animations[k];
            }
        })();

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
         * Respuesta al evento 'click' del botón de búsqueda.
         * Respuesta al evento 'keyup' del campo de texto.
         */
        function REDIRECT() {
            var value = $('header .form-inline input').val();
            if( !value )
                return;
            window.location.href = '/buscar?palabra=' + value;
        }
        $('header .form-inline input[type=search]').keyup(function(event) {
            if( event.keyCode==13 )
                REDIRECT();
        });

        /**
         * Habilitación de Perfect Scrollbar cuando se abre o cierra un modal.
         */
        var ps_modal; $(function() {
            $('.modal').on('show.bs.modal', function() {
                if( $('.modal:visible').length )
                    $('.modal:visible').modal('hide');
                if( ps ) { ps.destroy(); ps = null; }
                ps_modal = new PerfectScrollbar('.modal-body', {suppressScrollX: true}); ps_modal.update();
            }).on('hidden.bs.modal', function() {
                if( ps_modal ) { ps_modal.destroy(); ps_modal = null; }
                ps = new PerfectScrollbar('.main', {suppressScrollX: true}); ps.update();
            });
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
         * Establece los tamaños de imágenes.
         */
        $(function() {
            $(window).resize(function() {
                $('.card-espacio .card-img-top').css('minHeight', $('.card-espacio .card-img-top').width());
                $('.card-espacio .card-img-top').css('maxHeight', $('.card-espacio .card-img-top').width());

                $('.card-blog .card-img-top').css('minHeight', $('.card-blog .card-img-top').width()*9/16);
                $('.card-blog .card-img-top').css('maxHeight', $('.card-blog .card-img-top').width()*9/16);
            }).resize();
        });
    },
    finalize() {
        $(window).resize();
    },
};
