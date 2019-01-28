/* global $ */

export default {
    init() {
        $(function() {
            /**
             * Respuesta al evento 'click' del botón de búsqueda.
             * Respuesta al evento 'keyup' del campo de texto.
             */
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

            /**
             * Evento 'click' del botón de registro.
             */
            $('#btn-banner-registro-submit').click(function() {
                $.post('https://api.dondepauto.co/registro', {
                    'nombre': $('#banner-home #form-register [name=nombre]').val(),
                    'apellido': $('#banner-home #form-register [name=apellido]').val(),
                    'email': $('#banner-home #form-register [name=email]').val(),
                    'celular': $('#banner-home #form-register [name=celular]').val(),
                    'empresa': '-',
                    'role': 'Anunciante',
                    'consent': 'yes',
                    'consent_timestamp': Date.now(),
                }, function() {
                    alert('Hemos recibido tu solicitud de asesoría. Muy pronto nos pondremos en contacto contigo para ayudarte con toda la información que necesites.');
                    window.location.href = '/buscar';
                }).fail(function(error) { console.error(error); });
            });
        });
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};
