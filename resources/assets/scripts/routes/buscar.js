/* global $ */
import PerfectScrollbar from 'perfect-scrollbar';

export default {
    init() {
        $(function() {
            /**
             * Redirección de búsquedas.
             */
            function REDIRECT( element ) {
                var href = [];

                // Obtener palabra de búsqueda
                var palabra = $('#filtros-seleccionados .badge-filtro[data-type=palabra]');
                if( palabra.val() )
                    href.push('palabra=' + palabra.val());

                // Obtener categorías
                var categorias = $('#filtros-seleccionados .badge-filtro[data-type=categoria]').map(function() {
                    return parseInt($(this).attr('data-target'), 10);
                }).get();
                if( element && element.attr('data-type')=='categoria' && categorias.indexOf(element.attr('data-target'))==-1 )
                    categorias.push(parseInt(element.attr('data-target'), 10));
                if( categorias.length )
                    href.push('categoria=' + categorias.join(','));

                // Obtener escenarios
                var escenarios = $('#filtros-seleccionados .badge-filtro[data-type=escenario]').map(function() {
                    return parseInt($(this).attr('data-target'), 10);
                }).get();
                if( element && element.attr('data-type')=='escenario' && escenarios.indexOf(element.attr('data-target'))==-1 )
                    escenarios.push(parseInt(element.attr('data-target'), 10));
                if( escenarios.length )
                    href.push('escenario=' + escenarios.join(','));

                // Obtener audiencias
                $('#banner-buscar .dropdown-header').each(function() {
                    var tipo = $(this).attr('data-type');
                    var audiencias = $('#filtros-seleccionados .badge-filtro[data-type=' + tipo + ']').map(function() {
                        return parseInt($(this).attr('data-target'), 10);
                    }).get();
                    if( element && element.attr('data-type')==tipo && audiencias.indexOf(element.attr('data-target'))==-1 )
                        audiencias.push(parseInt(element.attr('data-target'), 10));
                    if( audiencias.length )
                        href.push(tipo + '=' + audiencias.join(','));
                });

                // Obtener ciudades
                var ciudades = $('#filtros-seleccionados .badge-filtro[data-type=ciudad]').map(function() {
                    return parseInt($(this).attr('data-target'), 10);
                }).get();
                if( element && element.attr('data-type')=='ciudad' && ciudades.indexOf(element.attr('data-target'))==-1 )
                    ciudades.push(parseInt(element.attr('data-target'), 10));
                if( ciudades.length )
                    href.push('ciudad=' + ciudades.join(','));

                // Redirección con filtros
                window.location.href = '/buscar' + (href.length ? ('?'+href.join('&')) : '');
            }

            /**
             * Inicialización de Perfect Scrollbar.
             */
            $('#filtros .btn-group').on('shown.bs.dropdown', function(event) {
                var menu = $(event.target).find('.dropdown-menu').get(0);
                var ps   = new PerfectScrollbar(menu, {suppressScrollX: true}); ps.update();
            });

            /**
             * Respuesta al evento 'click' del botón de búsqueda.
             * Respuesta al evento 'keyup' del campo de texto.
             */
            $('#banner-buscar #btn-buscar').click(REDIRECT);
            $('#banner-buscar input[type=text]').keyup(function(event) {
                if( event.keyCode==13 )
                    REDIRECT();
            });

            /**
             * Respuesta al evento 'click' de los filtros.
             */
            $('#filtros .dropdown-item').click(function(event) {
                REDIRECT($(event.target));
            });

            /**
             * Respuesta al evento 'click' de los filtros seleccionados.
             */
            $('#filtros-seleccionados i.fa-times').click(function(event) {
                var target = $(event.target).parents('.badge-filtro');
                if( target.attr('data-type')=='palabra' )
                    $('#banner-buscar #palabra').val('');
                target.remove(); REDIRECT();
            });
        });
    },
    finalize() {
        // JavaScript to be fired on the search page, after the init JS
    },
};
