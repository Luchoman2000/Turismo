<?php
$peticionAjax = true;
require_once "../../core/configGeneral.php";
if ((isset($_POST['tituloGas']) && isset($_POST['imagenPathGas']) && isset($_POST['contenidoGas'])) || 
    (isset($_POST['gasDel']))  ||
    (isset($_POST['tituloGasUp']) && isset($_POST['imagenPathGasUp']) && isset($_POST['contenidoGasUp'])) || 
    (isset($_POST['liked']) && isset($_POST['gas_id']))
) {

    require_once "../controller-admin/gastronomia.controlador.php";

    // Insertar 
    if (isset($_POST['tituloGas']) && isset($_POST['imagenPathGas']) && isset($_POST['contenidoGas'])) {


        $insGastronomia = new GastronomiaControlador();
        echo $insGastronomia->CtrInsertarGastronomia();
    }

    // Eliminar
    if (isset($_POST['gasDel'])) {

        $delGas = new GastronomiaControlador();
        echo $delGas->CtrEliminarGastronomia();
    }

    if (isset($_POST['tituloGasUp']) && isset($_POST['imagenPathGasUp']) && isset($_POST['contenidoGasUp'])) {
        $upGas = new GastronomiaControlador();
        echo $upGas->CtrActualizarGastronomia();
    }

    if (isset($_POST['liked']) && isset($_POST['gas_id']) && $_POST['status'] == 1) {
        $_POST['status'] = 0;
        $Like = new GastronomiaControlador();
        echo $Like->CtrGiveLikeGastronomia();
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}
