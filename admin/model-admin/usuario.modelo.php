<?php
if ($peticionAjax) {
    require_once "../../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class UsuarioModelo extends mainModel
{
    // Insertar
    protected function MdlInsertarUsuario($datos)
    {
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $correo = $datos['correo'];
        $usuario = $datos['usuario'];
        $pass = $datos['pass'];
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_administrador(usu_nombre,usu_apellido, usu_correo,usu_usuario,usu_clave)
        VALUES (:nombre, :apellido, :correo, :usuario, :pass)");
        $sql->execute(array(
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':usuario' => $usuario,
            ':pass' => $pass,

        ));
        return $sql;
        $sql = null;
    }
    // Actualizar
    protected function MdlActualizarUsuario($datos)
    {
        $id = $datos['id'];
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $correo = $datos['correo'];
        $usuario = $datos['usuario'];
        $pass = $datos['pass'];
        $sql = mainModel::conectar()->prepare("UPDATE tbl_administrador SET usu_nombre = :nombre,usu_apellido = :apellido,
        usu_correo = :correo,usu_usuario = :usuario,usu_clave = :pass WHERE id_usuario= :id");
        $sql->execute(array(
            ':id' => $id,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':usuario' => $usuario,
            ':pass' => $pass,

        ));
        return $sql;
        $sql = null;
    }
    // Eliminar
    protected function MdlEliminarUsaurioInvitado($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM tbl_u_invitado WHERE id_u_invitado =:id ");
        
        $sql->execute(array(":id" => $id));
        return $sql;
        $sql->close();
        $sql = null;
    }
    // Eliminar Admin
    protected function MdlEliminarAdministrador($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM tbl_administrador WHERE id_usuario =:id ");
        
        $sql->execute(array(":id" => $id));
        return $sql;
        $sql->close();
        $sql = null;
    }
}