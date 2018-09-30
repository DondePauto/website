<div class="modal fade" id="modal-home-registro" tabindex="-1" role="dialog" aria-labelledby="#modal-home-registro" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center text-uppercase font-weight-bold" style="width: 100vw;">Bienvenido a DóndePauto</div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center">
                        <div class="row-table-center">
                            <div>
                                <div class="voyager voyager-bubble"></div>
                                ¿Quieres promocionar tu marca o producto en medios publicitarios?<br><br>
                                <a href="/registro" class="btn btn-danger" role="button">Registro como Anunciante</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-none" style="width: 100vw; height: 50px;"></div>
                    <div class="col-12 col-sm-6 text-center">
                        <div class="row-table-center">
                            <div>
                                <div class="voyager voyager-megaphone"></div>
                                ¿Tienes espacios publicitarios y quieres incrementar sus ventas?<br><br>
                                <a href="/registro" class="btn btn-danger" role="button">Registro como Medio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /* global $ */
    document.addEventListener('DOMContentLoaded', function() {
        $(function() {
            setTimeout(function() { $('#modal-home-registro').modal(); }, 30*1000);
        });
    });
</script>

<style type="text/css">
    .modal#modal-home-registro {
        background: rgba(0, 0, 0, 0.5);
    }
    .modal#modal-home-registro .modal-content {
        border: 2.5px solid {{ config('dondepauto.colores.lightblue') }};
        background: {{ config('dondepauto.colores.lightgray') }};
    }
    .modal#modal-home-registro .voyager {
        font-size: 37.5px;
    }
    .modal#modal-home-registro [role=button] {
        width: 255px;
    }
    @media(max-width: 575px) {
        .modal#modal-home-registro .modal-body {
            position: relative;
        }
        .modal#modal-home-registro .modal-body .row {
            position: absolute;
            top: 50%;
            left: 15px;
            right: 15px;
            transform: translateY(-50%);
        }
        .modal#modal-home-registro .modal-body .row-table-center {
            display: table;
            height: 175px;
        }
        .modal#modal-home-registro .modal-body .row-table-center>div {
            display: table-cell;
            vertical-align: middle;
        }
    }
    @media(min-width: 576px) {
        .modal#modal-home-registro .modal-header {
            color: {{ config('dondepauto.colores.lightblue') }};
        }
        .modal#modal-home-registro .modal-body {
            padding-top: 0;
            font-size: 0.9rem;
        }
    }
</style>
