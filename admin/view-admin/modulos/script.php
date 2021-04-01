<!-- <script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script src="<?php echo SERVERURL ?>elFinder/js/elfinder.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.jqueryui.min.js"></script>    -->

<script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/chart.min.js"></script>
<script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/bs-init.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script> -->
<script src="<?php echo SERVERURL ?>admin/view-admin/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/Billing-Table-with-Add-Row--Fixed-Header-Feature.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script> -->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 -->

<!-- <script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/Table-with-search--sort-filters.js"></script> -->
<script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/theme.js"></script>
<script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/main.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-popup-overlay/2.1.5/jquery.popupoverlay.min.js" integrity="sha512-gu0czvpcfFnRy+Dxo9M585nVnO8YbTnoFRWuSnvJVdBlaeaucDNAZUjP+IfscyQEIlUOGQLtzpVFpl32fkuKig==" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> -->
<script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/jquery.popupWindow.js"></script>
<script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/elfinder.popup.js"></script>
<script src="<?php echo SERVERURL ?>admin/view-admin/assets/js/ajax.js"></script>

<script>
    function cerrar_sesion_administrador() {
        let titulo_alerta;
        let btn_confirm_alerta;
        let btn_cancel_alerta;
        let texto_alerta;


        titulo_alerta = "¿Quieres salir del sistema?";
        texto_alerta = "Se cerrará la sesión y regresaras a la página principal";
        btn_confirm_alerta = "Aceptar";
        btn_cancel_alerta = "Cancelar";


        Swal.fire({
            title: titulo_alerta,
            text: texto_alerta,
            icon: 'question',
            showCancelButton: true,
            showDenyButton: false,
            showConfirmButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: btn_confirm_alerta,
            cancelButtonText: btn_cancel_alerta
        }).then((result) => {
            if (result.isConfirmed) {

                let datos = new FormData();
                datos.append("modulo_login", "logout_administrador");

                fetch("<?php echo SERVERURL; ?>admin/ajax-admin/login.ajax.php", {
                        method: 'POST',
                        body: datos
                    })
                    .then(respuesta => respuesta.json())
                    .then(respuesta => {
                        return alertas_ajax(respuesta);
                    });

            }
        });
    }
</script>