<div class="modal fade" id="modal-asesoria" tabindex="-1" role="dialog" aria-labelledby="#modal-asesoria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center text-uppercase font-weight-bold" style="width: 100vw;">Solicitud de asesoría</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="modal-subtitle">
                    Nuestra misión en DóndePauto es ayudarte a diseñar las estrategias de medios más efectivas para tu negocio.
                    Para poder brindarte un mejor servicio por favor envíanos la siguiente información:
                </div>
                <form method="post" action="https://api.dondepauto.co/asesoria" class="row" id="form-asesoria">
                    <input type="hidden" name="path" value="{{ request()->path() }}">
                    <div class="col-12 col-sm-6 form-group">
                        <label for="nombre">Tu(s) nombre(s) <b class="text-danger">*</b></label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="col-12 col-sm-6 form-group">
                        <label for="apellido">Tu(s) apellido(s) <b class="text-danger">*</b></label>
                        <input type="text" name="apellido" class="form-control" required>
                    </div>
                    <div class="col-12 col-sm-6 form-group">
                        <label for="email">Tu email <b class="text-danger">*</b></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-12 col-sm-6 form-group">
                        <label for="celular">Tu celular <b class="text-danger">*</b></label>
                        <input type="text" name="celular" class="form-control" required>
                    </div>
                    <div class="col-12 col-sm-6 form-group">
                        <label for="producto">¿Qué producto o servicio quieres promocionar? <b class="text-danger">*</b></label>
                        <textarea name="producto" class="form-control" style="height: 100px; resize: none;" required></textarea>
                    </div>
                    <div class="col-12 col-sm-6 form-group">
                        <label for="ciudades">¿En qué ciudad(es) quieres hacer tu campaña? <b class="text-danger">*</b></label>
                        <select name="ciudades[]" class="form-control" style="height: 100px;" multiple required>
                            @foreach( DondePauto\Models\Extras\Termino::ciudades() as $ciudad )
                                <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 form-group">
                        <label for="perfil">¿A qué perfil de cliente quieres llegar? <b class="text-danger">*</b></label>
                        <textarea name="perfil" class="form-control" style="height: 100px; resize: none;" required></textarea>
                    </div>
                    <div class="col-12 col-sm-6 form-group">
                        <label for="perfil">Observaciones</label>
                        <textarea name="observaciones" class="form-control" style="height: 100px; resize: none;" required></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-orange" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-orange" value="Enviar">
                        <script type="text/javascript">
                            document.addEventListener("DOMContentLoaded", function() {
                                $('#form-asesoria').submit(function() {
                                    $('#modal-asesoria').on('hidden.bs.modal', function() {
                                        alert([
                                            'Hemos recibido tu solicitud de asesoría.',
                                            'Muy pronto nos pondremos en contacto contigo para ayudarte con toda la información que necesites.'
                                        ].join('\n'));
                                    }).modal('hide');
                                    return true;
                                });
                            });
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .modal#modal-asesoria #btn-asesoria {
        margin: 0 auto;
    }
    .modal#modal-asesoria #modal-subtitle {
        margin: -15px;
        padding: 15px;
        margin-bottom: 15px;
        color: {{ config('dondepauto.colores.gray') }};
        background-color: {{ config('dondepauto.colores.lightgray') }};
    }
    @media(min-width: 576px) {
        .modal#modal-asesoria #modal-subtitle {
            margin: 0;
            margin-top: -30px;
            margin-bottom: 15px;
        }
        .modal#modal-asesoria .modal-header {
            color: {{ config('dondepauto.colores.lightblue') }};
        }
    }
</style>
