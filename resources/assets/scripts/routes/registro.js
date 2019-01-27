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
                    'nombre': $('.form [name=nombre]').val(),
                    'apellido': $('.form [name=apellido]').val(),
                    'email': $('.form [name=email]').val(),
                    'validate_email': true,
                    'celular': $('.form [name=celular]').val(),
                    'empresa': $('.form [name=empresa]').val(),
                    'role': $('.form [name=role]:checked').val(),
                    'consent': $('.form [name=consent]').val(),
                    'consent_timestamp': $('.form [name=consent_timestamp]').val(),
                }, function() {
                    alert('Tu registro ha sido exitoso! Hemos enviado un enlace de activación a tu correo para que puedas continuar con el proceso');
                    window.location.href = '/';
                }).fail(function(error) {
                    console.clear();
                    var response = error.responseJSON;
                    var first    = Object.keys(response.errors)[0];

                    var scroll = $('.main').scrollTop(); $('.main').scrollTop(0);
                    var offset = $('.form [name=' + first + ']').offset().top-50;
                    $('.main').scrollTop(scroll).animate({'scrollTop': offset}, 500, function() {
                        Object.keys(response.errors).forEach(function(field) {
                            $('#feedback-' + field).html(response.errors[field][0]).show(250);
                        });
                        var inputs = Object.keys(response.errors).map(function(field) { return '.form [name=' + field + ']'; }).join(', ');
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
