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
             * Evento 'click' del botón de registro.
             */
            $('#btn-submit').click(function() {
                $.post('https://api.dondepauto.co/registro', {
                    'nombre': $('input[name=nombre]').val(),
                    'apellido': $('input[name=apellido]').val(),
                    'email': $('input[name=email]').val(),
                    'celular': $('input[name=celular]').val(),
                    'empresa': $('input[name=empresa]').val(),
                    'role': $('input[name=role]:checked').val(),
                    'consent': $('input[name=consent]:checked').length ? 'yes' : 'no',
                    'consent_timestamp': $('input[name=consent_timestamp]').val(),
                }, function() {
                    // TODO
                }).fail(function(error) {
                    console.clear();
                    var response = error.responseJSON;
                    var field = Object.keys(response.errors)[0];

                    var scroll = $('.main').scrollTop(); $('.main').scrollTop(0);
                    var offset = $('input[name=' + field + ']').offset().top-50;
                    $('.main').scrollTop(scroll).animate({'scrollTop': offset}, 500, function() {
                        var fields = Object.keys(response.errors)
                            .map(function(field) { return 'input[name=' + field + ']'; })
                            .join(', ');
                        $(fields).addClass('is-invalid').parent().one(window.ANIMATION_END, function() {
                            $(this).removeClass('shake is-invalid');
                            $(fields).removeClass('is-invalid');
                        }).addClass('shake is-invalid');
                    });
                });
            });

            /**
             * Evento 'change' de la casilla de consentimiento.
             */
            $('input[name=consent]').change(function() {
                if( $('input[name=consent]:checked').length )
                    $('input[name=consent_timestamp]').val(Date.now());
                else
                    $('input[name=consent_timestamp]').val('');
            });
        });
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};
