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
                $('.feedback').hide(250);
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
                    var first    = Object.keys(response.errors)[0];

                    var scroll = $('.main').scrollTop(); $('.main').scrollTop(0);
                    var offset = $('input[name=' + first + ']').offset().top-50;
                    $('.main').scrollTop(scroll).animate({'scrollTop': offset}, 500, function() {
                        Object.keys(response.errors).forEach(function(field) {
                            $('#feedback-' + field).html(response.errors[field][0]).show(250);
                        });
                        var inputs = Object.keys(response.errors).map(function(field) { return 'input[name=' + field + ']'; }).join(', ');
                        $(inputs).addClass('is-invalid').parent().one(window.ANIMATION_END, function() {
                            $(this).removeClass('shake is-invalid');
                            $(inputs).removeClass('is-invalid');
                        }).addClass('shake is-invalid');
                    });
                });
            });

            /**
             * Evento 'click' de la casilla de consentimiento.
             */
            $('#icon-consent').click(function() {
                if( $('input[name=consent]').val()=='yes' ) {
                    $('input[name=consent]').val('no');
                    $('input[name=consent_timestamp]').val('');
                    $(this).removeClass('fa-check-square text-lightblue').addClass('fa-square-o text-lightgray');
                } else {
                    $('input[name=consent]').val('yes');
                    $('input[name=consent_timestamp]').val(Date.now());
                    $(this).removeClass('fa-square-o text-lightgray').addClass('fa-check-square text-lightblue');
                }
            });
        });
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};
