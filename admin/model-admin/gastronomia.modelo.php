<?php
if ($peticionAjax) {
    require_once "../../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class GastronomiaModelo extends mainModel
{
    // Insertar
    protected function MdlInsertarGastronomia($datos)
    {
        $titulo = $datos["titulo"];
        $imagenPath = $datos["imagenPath"];
        $contenido = $datos["contenido"];


        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_p_gastronomia(gas_titulo, gas_path_imagen, gas_contenido) VALUES(:titulo, :pathImagen, :contenido)");
        // $sql->bindValue(":usuario",  $datos["usuario"]);
        // $sql->bindValue(":password", $datos["password"]);
        // $sql->bindValue(":rol_id", "%{$rolid    }%" );
        $sql->execute(array(':titulo' => $titulo, ':pathImagen' => $imagenPath, ':contenido' => $contenido));
        return $sql;
        $sql->close();
        $sql = null;
    }

    // Consulta
    protected function MdlMostrarGastronomias()
    {
        $sql  = mainModel::conectar()->prepare("SELECT * FROM tbl_p_gastronomia");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    // Actualizar
    protected function MdlActualzarGastronomia($datos)
    {
        $id = $datos["id"];
        $titulo = $datos["titulo"];
        $imagenPath = $datos["imagenPath"];
        $contenido = $datos["contenido"];
        $sql = mainModel::conectar()->prepare("UPDATE tbl_p_gastronomia SET gas_titulo = :titulo , gas_path_imagen = :imagenPath, gas_contenido = :contenido WHERE gas_id = :id");

        // $sql->bindParam(":id" , $datos["id"]);
        // $sql->bindParam(":usuario", $datos["usuario"]);
        // $sql->bindParam(":password", $datos["password"]);
        $sql->execute(array(':titulo' => $titulo, ':imagenPath' => $imagenPath, 'contenido' => $contenido, ':id' => $id));

        return $sql;

        $sql->close();
        $sql = null;
    }

    // Eliminar
    protected function MdlEliminarGastronomia($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM tbl_p_gastronomia WHERE gas_id =:id ");
        // $sql->bindParam(":id", $dato);
        $sql->execute(array(":id" => $dato));
        return $sql;
        $sql->close();
        $sql = null;
    }

    // Validar Si a dado like el visitante

    protected function MdlIsLikedGastronomia($datos)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_gas_inv WHERE id_u_invitado = :idinvitado AND gas_id = :gasid");
        $sql->execute(array(":idinvitado" => $datos['idinvitado'], ":gasid" => $datos['gasid']));

        return $sql;

        $sql->close();
        $sql = null;
    }

    // Usuario da like
    protected function MdlInsertarLike($datos)
    {
        $postid = $datos['gasid'];
        $usuario = $datos['usuario'];

        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_gas_inv (gas_id,id_u_invitado ) VALUES (:gasid, :usuid)");
        $sql->execute(array(":gasid" => $postid, "usuid" => $usuario));
        return $sql;

        $sql->close();
        $sql = null;

    }

    // Actualiza likes totales
    protected function MdlActualizarLike($datos)
    {
        $postid = $datos['gasid'];
        $n = $datos['likes'];
        $sql = mainModel::conectar()->prepare("UPDATE tbl_p_gastronomia SET gas_likes= :nlikes WHERE gas_id = :gasid");
        $sql->execute(array(":nlikes" => $n+1, "gasid" => $postid));
        return $sql;

        $sql->close();
        $sql = null;
    }
}
