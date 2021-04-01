<?php
session_name("ADM-MEJIA");
session_start();
$peticionAjax = true;

require_once "../../core/configAPP.php";
// include "../view/inc/session_start.php";

if (isset($_POST['modulo_login'])) {

    /*--------- Instancia al controlador - Instance to controller ---------*/
    require_once "../controller-admin/login.controlador.php";
    $ins_login = new loginControlador();


    /*--------- Cerrar sesion administrador - Log out administrator ---------*/
    if ($_POST['modulo_login'] == "logout_administrador") {
        echo $ins_login->cerrar_sesion_administrador_controlador();
    }
} else {
    session_destroy();
    header("Location: " . SERVERURL . "admin/");
}
