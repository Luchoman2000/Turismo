<?php
if ($peticionAjax) {
    require_once "../../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

/**
 * Clase EntradaModelo | CRUD al la entrada
 * @author Luis Estacio
 *
 */
class EntradaModelo extends mainModel
{

    //    Insertar
    protected function MdlInsertarEntrada($datos)
    {
        $titulo = $datos['titulo'];
        $postSlug = mainModel::makeSlug($titulo);
        $imagenPortada = $datos['imagenPath'];
        $tipo = $datos['tipo'];
        $imagen360 = $datos['imagenPath360'];
        $contenido = $datos['contenido'];
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_pagina (at_titulo, at_slug, at_contenido, at_imagen_path, at_path_360, at_tipo) VALUES
        (:titulo,:slug,:contenido,:imgP,:img360,:tipo) ");
        $sql->execute(array(
            ":titulo" => $titulo,
            ":slug" => $postSlug,
            ":contenido" => $contenido,
            ":imgP" => $imagenPortada,
            ":img360" => $imagen360,
            ":tipo" => $tipo,
        ));

        return $sql;
        $sql->close();
        $sql = null;
    }

    // Consulta
    protected function MdlMostrarEntradas()
    {
        $sql  = mainModel::conectar()->prepare("SELECT * FROM tbl_pagina");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }

    // Actualizar
    protected function MdlActualzarEntrada($datos)
    {
        $id = $datos["id"];
        $titulo = $datos["titulo"];
        $imagenPath = $datos["imagenPath"];
        $imagenPath360 = $datos["imagenPath360"];
        $contenido = $datos["contenido"];
        $slug = mainModel::makeSlug($titulo);
        $sql = mainModel::conectar()->prepare("UPDATE tbl_pagina SET at_titulo = :titulo ,at_slug = :slug, at_imagen_path = :imagenPath, at_path_360= :path360, at_contenido = :contenido WHERE id_atractivo_turistico = :id");

        // $sql->bindParam(":id" , $datos["id"]);
        // $sql->bindParam(":usuario", $datos["usuario"]);
        // $sql->bindParam(":password", $datos["password"]);
        $sql->execute(array(
            ':titulo' => $titulo,
            ':slug' => $slug,
            ':imagenPath' => $imagenPath,
            ':path360' => $imagenPath360,
            ':contenido' => $contenido,
            ':id' => $id
        ));

        return $sql;

        $sql->close();
        $sql = null;
    }

    // Eliminar
    protected function MdlEliminarEntrada($dato)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM tbl_pagina WHERE id_atractivo_turistico =:id ");
        // $sql->bindParam(":id", $dato);
        $sql->execute(array(":id" => $dato));
        return $sql;
        $sql->close();
        $sql = null;
    }


    // Mostrar atractivos naturales public
    protected function MdlMostrarAtractivosNaturales()
    {
        $sql  = mainModel::conectar()->prepare("SELECT * FROM tbl_pagina WHERE at_tipo = 'Atractivo natural'");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }


    // Validar Si a dado like el visitante

    protected function MdlIsLikedEntrada($datos)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_atr_uin WHERE id_u_invitado = :idinvitado AND id_atractivo = :atrid");
        $sql->execute(array(":idinvitado" => $datos['idinvitado'], ":atrid" => $datos['atrid']));

        return $sql;

        $sql->close();
        $sql = null;
    }

    // Usuario da like
    protected function MdlInsertarLikeAtr($datos)
    {
        $postid = $datos['atrid'];
        $usuario = $datos['usuario'];

        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_atr_uin (id_atractivo,id_u_invitado ) VALUES (:atrid, :usuid)");
        $sql->execute(array(":atrid" => $postid, "usuid" => $usuario));
        return $sql;

        $sql->close();
        $sql = null;
    }

    // Actualiza likes totales
    protected function  MdlActualizarLikeAtr($datos)
    {
        $postid = $datos['atrid'];
        $n = $datos['likes'];
        $sql = mainModel::conectar()->prepare("UPDATE tbl_pagina SET at_likes= :nlikes WHERE id_atractivo_turistico = :atrid");
        $sql->execute(array(":nlikes" => $n + 1, "atrid" => $postid));
        return $sql;

        $sql->close();
        $sql = null;
    }

    // Actualizr usuaui invitado
    protected function MdlActualizarUsuInv($datos)
    {
        $nombre = $datos['nombre'];
        $cookie = $datos['cookie'];
        $sql = mainModel::conectar()->prepare("UPDATE tbl_u_invitado SET uin_nombre = :nombre WHERE uin_identificador_cookie = :cookie");
        $sql->execute(array(
            ':nombre' => $nombre,
            ':cookie' => $cookie
        ));
        return $sql;
        $sql = null;
    }


    // Insertar comentario

    protected function MdlActualizarIfExistComentarioAtrNat($datos)
    {
        $idcp = $datos['idcl'];
        $comentario = $datos['comentario'];
        $sql = mainModel::conectar()->prepare("UPDATE tbl_comentario SET id_comentario_padre = :idcp , cl_comentario  = :comentario WHERE id_comentario_like = :idcl");
        $sql->execute(array(
            ':idcp' => $idcp,
            ':comentario' => $comentario,
            ':idcl' => $idcp,
        ));
        return $sql;
        $sql = null;
    }


    // Insertar comentario

    protected function MdlInstertarComentarioAtrNat($datos)
    {

        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_comentario(id_pagina, id_comentario_padre,cl_comentario, id_invitado) 
        VALUES (:idpag, :idcp, :comentario, :idinv)
        ");
        $sql->execute(array(
            ':idpag' => $datos['idpost'],
            ':idcp' => $datos['idcl'],
            ':comentario' => $datos['comentario'],
            ':idinv' => $datos['user'],
        ));
        return $sql;
        $sql = null;
    }

    protected function MdlInsertarVistaAtr($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_vistas(id_pagina, id_u_invitado) VALUES(:idpost,:user)");
        $sql->execute(array(
            ':user' => $datos['user'],
            ':idpost' => $datos['postid']
        ));

        $sql = null;
    }

    protected function MdlActualizarVistaAtr($datos)
    {
        $sql = mainModel::conectar()->prepare("UPDATE tbl_pagina SET at_vistas = :vistas WHERE id_atractivo_turistico = :idpost ");
        $sql->execute(array(
            ':vistas' => $datos['vistas'] + 1,
            ':idpost' => $datos['postid']
        ));

        $sql = null;
    }

    protected function MdlIsVisited($datos)
    {
        $idpost = $datos['postid'];
        $user = $datos['user'];
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_vistas WHERE id_u_invitado = :user AND id_pagina = :idpost");
        $sql->execute(
            array(
                ':user' => $user,
                ':idpost' => $idpost
            )
        );
        return $sql;
        $sql = null;
    }
}
