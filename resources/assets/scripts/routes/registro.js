/* global $ */

export default {
    init() {
        $(function() {
            /**
             * Establece el tamaño de las opciones de registro.
             */
            $(window).resize(function() {
                $('label.radio>div').height('fit-content');
                var height = Math.max(...$('label.radio>div').map(function() { return $(this).outerHeight(); }).get());
                $('label.radio>div').height((height-15) + 'px');
            }).resize();

            /**
             * Evento 'click' de la casilla de consentimiento.
             */
            $('#icon-consent').click(function() {
                if( $('.form [name=consent]').val()=='yes' ) {
                    $('.form [name=consent]').val('no');
                    $('.form [name=consent_timestamp]').val('');
                    $(this).removeClass('fa-check-square text-lightblue').addClass('fa-square-o text-lightgray');
                } else {
                    $('.form [name=consent]').val('yes');
                    $('.form [name=consent_timestamp]').val(Date.now());
                    $(this).removeClass('fa-square-o text-lightgray').addClass('fa-check-square text-lightblue');
                }
            });
        });
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};
