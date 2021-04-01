
<?php
$peticionAjax = true;
require_once "../../core/configGeneral.php";
if ( (isset($_POST['nombreAdm']) && isset($_POST['apellidoAdm']) && isset($_POST['correoAdm']) && isset($_POST['usuarioAdm']) && isset($_POST['claveAdm']))
    || (isset($_POST['idUsuario']))
    || (isset($_POST['usuAdmDel']))
    || (isset($_POST['usuInvDel']))
) {
    require_once "../controller-admin/usuario.controlador.php";

    // Insertar
    if (isset($_POST['nombreAdm']) && isset($_POST['apellidoAdm']) && isset($_POST['correoAdm']) && isset($_POST['usuarioAdm']) && isset($_POST['claveAdm']) && $_POST['idUsuario'] == ''){
        $ins = new UsuarioControlador();
        echo $ins->CtrInsertarUsuario();
    }

    // Actualizar
    if(isset($_POST['nombreAdm']) && isset($_POST['apellidoAdm']) && isset($_POST['correoAdm']) && isset($_POST['usuarioAdm']) && isset($_POST['claveAdm']) && isset($_POST['idUsuario']) && $_POST['idUsuario'] != ''){
        $act= new UsuarioControlador();
        echo $act->CtrActualizarUsuario();
    }
    // Eliminar visitante
    if(isset($_POST['usuInvDel'])){
        $del= new UsuarioControlador();
        echo $del->CtrEliminarUsuarioInv();
    }

    // Eliminar Administrador
    if(isset($_POST['usuAdmDel'])){
        $del= new UsuarioControlador();
        echo $del->CtrEliminarAdm();
    }

} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}