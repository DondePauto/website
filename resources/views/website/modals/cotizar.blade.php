<div class="modal fade" id="modal-cotizar" tabindex="-1" role="dialog" aria-labelledby="modal-cotizar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center text-uppercase font-weight-bold" style="width: 100vw;">Solicitud de cotización</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    Enviando una solicitud de cotización podrás ampliar información sobre este espacio de pauta.
                    Recuerda que los datos publicados en nuestra plataforma son de referencia y las cantidades,
                    tiempos y frecuencias pueden ajustarse según tus necesidades.<br><br>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-orange" data-dismiss="modal">Cancelar</button>
                    @if( auth()->check() and in_array(auth()->user()->role->name, ['admin', 'anunciante']) )
                        <button type="button" class="btn btn-orange" id="btn-submit-cotizar">Enviar</button>
                        <script type="text/javascript">
                            document.addEventListener("DOMContentLoaded", function() {
                                $('#btn-submit-cotizar').click(function() {
                                    $.ajax({
                                        'url': 'https://api.dondepauto.co/cotizar',
                                        'type': 'post',
                                        'data': { 'espacio_id': {{ $espacio->id }} },
                                        'headers': { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                        'success': function(response) { $('#modal-submit-cotizar').modal(); }
                                    });
                                });
                            });
                        </script>
                    @else
                        <button type="button" class="btn btn-orange" id="btn-submit-cotizar" data-toggle="modal" data-target="#modal-login">
                            Enviar
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-submit-cotizar" tabindex="-1" role="dialog" aria-labelledby="modal-submit-cotizar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center text-uppercase font-weight-bold" style="width: 100vw;">Solicitud de cotización</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" style="padding-top: 0;">
                Hemos recibido tu solicitud de cotización.<br>
                Muy pronto nos pondremos en contacto contigo para ayudarte con toda la información de este espacio publicitario.<br><br>
                <button type="button" class="btn btn-orange" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    @media(min-width: 576px) {
        .modal#modal-cotizar .modal-body {
            padding-top: 0;
        }
    }
</style>
