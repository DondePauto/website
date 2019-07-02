/* global $ */

export default {
    init() {
        $(function() {
            /**
             * Evento 'click' del botón de activar.
             */
            $('#btn-submit').click(function() {
                $('.feedback').hide(250);
                $.post('https://api.dondepauto.co/activar', {
                    'codigo': $('.form [name=codigo]').val(),
                    'usuario_id': $('.form [name=usuario_id]').val(),
                    'actividad': $('.form [name=actividad]').val(),
                    'cargo': $('.form [name=cargo]').val(),
                    'telefono': $('.form [name=telefono]').val(),
                    'celular': $('.form [name=celular]').val(),
                    'ciudad': $('.form [name=ciudad]').val(),
                    'direccion': $('.form [name=direccion]').val(),
                }, function() {
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
        });
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};
