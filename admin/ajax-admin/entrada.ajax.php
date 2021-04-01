
<?php
$peticionAjax = true;
require_once "../../core/configGeneral.php";
if ((isset($_POST['tituloAtr']) && isset($_POST['imagenPathAtr']) && isset($_POST['imagenPathAtr360'])  && isset($_POST['contenidoAtr'])) || (isset($_POST['atrDel']))
    || (isset($_POST['tituloAtrUp']) && isset($_POST['imagenPathAtrUp']) && isset($_POST['imagenPathAtr360Up'])  && isset($_POST['contenidoAtrUp']))
    || (isset($_POST['likedAtrNat']) && isset($_POST['atr_id']))
    || (isset($_POST['comentarios']))
    || (isset($_POST['name']) && isset($_POST['comment']))
) {
    require_once "../controller-admin/entrada.controlador.php";


    // Insertar Atractivo
    if ((isset($_POST['tituloAtr']) && isset($_POST['imagenPathAtr']) && isset($_POST['imagenPathAtr360'])  && isset($_POST['contenidoAtr']))) {
        $insEnt = new EntradaControlador();
        echo $insEnt->CtrInsertarEntrada();
    }

    // Actualizar Atractivo
    if (isset($_POST['tituloAtrUp']) && isset($_POST['imagenPathAtrUp']) && isset($_POST['imagenPathAtr360Up'])  && isset($_POST['contenidoAtrUp'])) {
        $actEnt = new EntradaControlador();
        echo $actEnt->CtrActualizarEntrada();
    }

    // Eliminar
    if (isset($_POST['atrDel'])) {

        $delEn = new EntradaControlador();
        echo $delEn->CtrEliminarEntrada();
    }

    // Cuando un visitante da llike
    if (isset($_POST['likedAtrNat']) && isset($_POST['atr_id'])) {

        $Like = new EntradaControlador();
        echo $Like->CtrGiveLikeEntrada();
    }


    // Mostrar comentarios
    if (isset($_POST['comentarios'])) {
        $comentarios = new EntradaControlador();
        echo $comentarios->CtrLlenarComentariosAtrNat();
    }


    // Insertar Cometario
    if (isset($_POST['name']) && isset($_POST['comment'])) {
        $NewComentario = new EntradaControlador();
        echo $NewComentario->CtrInsertarComentarioAtrNat();

    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . 'login/"</script>';
}
