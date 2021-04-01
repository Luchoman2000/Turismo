<?php
require_once "./core/mainModel.php";

class UsuarioInvitadoModelo extends mainModel{

    public function MdlMostrarUsuarioInv($id){
        $consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_u_invitado WHERE uin_identificador_cookie = '$id'");
        $respuesta = $consulta->fetch();
        return $respuesta;
    }

    public function MdlInsertarUsuarioInvCookie($idc){
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_u_invitado(uin_identificador_cookie) VALUES (:cookie)");
        $sql->execute(array(":cookie" => $idc));
        return $sql;
        $sql->close();
        $sql->null;
    }
}