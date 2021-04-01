<?php

// require_once "../../core/mainModel.php";

require_once "./core/mainModel.php";


$respuesta = mainModel::conectar()->prepare("SELECT * FROM tbl_comentario_like ORDER BY id_comentario_padre asc, id_comentario_like asc");

$respuesta->execute();
echo json_encode($respuesta);

$respuesta->close();
$respuesta = null;
