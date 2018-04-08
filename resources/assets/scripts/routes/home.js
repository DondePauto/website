/* global $ */

export default {
    init() {
        /**
         * Evento 'click' del botón 'Buscar'.
         */
        $(function() {
            $('#banner-buscar #btn-buscar').click(function() {
                var value = $('#banner-buscar #palabra').val();
                if( !value )
                    return;
                window.location.href = '/buscar?palabra=' + value;
            });
        });
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};
