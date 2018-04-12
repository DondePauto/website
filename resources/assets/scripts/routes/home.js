/* global $ */

export default {
    init() {
        /**
         * Respuesta al evento 'click' del botón de búsqueda.
         * Respuesta al evento 'keyup' del campo de texto.
         */
        $(function() {
            function REDIRECT() {
                var value = $('#banner-buscar #palabra').val();
                if( !value )
                    return;
                window.location.href = '/buscar?palabra=' + value;
            }

            $('#banner-buscar #btn-buscar').click(REDIRECT);
            $('#banner-buscar input[type=text]').keyup(function(event) {
                if( event.keyCode==13 )
                    REDIRECT();
            });
        });
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};
