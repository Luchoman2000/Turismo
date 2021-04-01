<?php
if ($peticionAjax) {
    require_once "../../admin/model-admin/entrada.modelo.php";
} else {
    require_once "./admin/model-admin/entrada.modelo.php";
}

class EntradaControlador extends EntradaModelo
{
    // Insertar
    public function CtrInsertarEntrada()
    {
        $titulo    = $_POST['tituloAtr'];
        $imagenPath    = $_POST['imagenPathAtr'];
        $tipo    = $_POST['tipoAtr'];
        $imagenPath360    = $_POST['imagenPathAtr360'];
        $contenido    = $_POST['contenidoAtr'];
        // if ($password != $password2) {
        //     $alerta = [
        //         "Alerta" => "simple",
        //         "Titulo" => "Ocurrio un error",
        //         "Texto"  => "La contraseña no es semejante!",
        //         "Tipo"   => "error",
        //     ];
        //     return mainModel::sweet_alert($alerta);
        // } else {

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_pagina WHERE at_titulo = '$titulo'");
        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Error",
                "Texto" => "El atractivo  ya existe",
                "Icon" => "error",
                "TxtBtn" => "Aceptar"
            ];
            echo json_encode($alerta);
            exit();
        } else {
            $titulo  = mainModel::limpiar_cadena($titulo);
            $contenido  = base64_encode($contenido);
            // $COn  = mainModel::limpiar_cadena($password);
            $datos    = [
                "titulo" => $titulo,
                "imagenPath" => $imagenPath,
                "tipo" => $tipo,
                "imagenPath360" => $imagenPath360,
                "contenido" => $contenido
            ];
            $insertar = EntradaModelo::MdlInsertarEntrada($datos);
            if ($insertar->rowCount() >= 1) {
                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "Entrada registrada!",
                    "Texto" => "Se registró la entrada con éxito en el sistema",
                    "Icon" => "success",
                    "TxtBtn" => "Aceptar"
                ];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido registrar la entrada, por favor intente nuevamente",
                    "Icon" => "error",
                    "TxtBtn" => "Aceptar"
                ];
            }
        }
        echo json_encode($alerta);
        // return mainModel::sweet_alert($alerta);
        // }

    }

    // Consulta
    public function CtrMostrarEntrada()
    {
        $res = EntradaModelo::MdlMostrarEntradas();
        $res = $res->fetchAll();
        $tabla = "";
        $tabla .= '
        <script> function RedirectAndScroll(url) {
            window.location.href = url;
            window.scrollBy(0,20);
            scrolldelay = setTimeout(pageScroll,10);
        }</script>
        <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                        <th class="text-left">Titulo</th>
                        <th class="text-center">Vistas</th>
                        <th class="text-center">Likes</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">fecha de creación</th>
                        <th class="text-center">Acción</th>
                       </tr>
                   </thead>
                   <tbody class="text-center">';

        if (count($res) >= 1) {
            foreach ($res as $key => $value) {
                $tabla .= '<tr>
                <td class="text-left">' . $value['at_titulo'] . '</td>
                <td class="text-left">' . $value['at_vistas'] . '</td>
                <td>' . $value['at_likes'] . '</td>
                <td>' . $value['at_tipo'] . '</td>
                <td>' . $value['at_fecha'] . '</td>

                
                <td class="text-center">
                    <a class="btn btn-primary" target ="_blank"  role="button" style="margin: 2px;">
                        <i class="far fa-eye"></i>
                    </a>
                    
                    
                    <a href="' . SERVERURL . 'admin/entradaup/' . mainModel::encryption($value['id_atractivo_turistico']) . '" class="btn btn-success" role="button" style="background: rgb(11,171,56);margin: 2px;">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    
                    
                    <form class="FormularioAjax clearmargin clearpadding d-inline" method="POST" data-form="delete" action="' . SERVERURL . 'admin/ajax-admin/entrada.ajax.php">
                    <input type="hidden" name="atrDel" value="' . mainModel::encryption($value['id_atractivo_turistico']) . '">
                    <button class="btn btn-danger" type="submit" style="margin: 2px;">
                        <i class="fas fa-trash"></i></button>
                    </form>
                    
                </td>
            </tr>';

                //     $tabla .= '<tr>
                // 	<td>' . $value['usu_id'] . '</td>
                // 	<td>' . $value['usu_usuario'] . '</td>
                // 	<td>' . $value['usu_password'] . '</td>
                // 	<td>' . $value['rol_id'] . '</td>
                // 	<td>
                //     <a href="' . SERVERURL . 'usuarioup/' . mainModel::encryption($value['usu_id']) . '" class="btn btn-success btn-raised btn-xs">
                // 			<i class="zmdi zmdi-refresh"></i>
                // 		</a>
                // 	</td>
                // 	<td>
                // 		<form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'ajax/usuario.ajax.php">
                // 			<input type="hidden" name="usuDel" value="' . mainModel::encryption($value['usu_id']) . '">
                // 		<button type="submit" class="btn btn-danger btn-raised btn-xs">
                // 				<i class="zmdi zmdi-delete"></i>
                // 			</button>
                // 			<div class="RespuestaAjax"></div>
                // 		</form>
                // 	</td>
                // </tr>';

            }
        } else {
            $tabla .= '<tr><td> " No hay registros en el sistema" </td></tr>';
        }

        $tabla .= '</tbody>
        </table>';

        return $tabla;
    }

    // Editar
    public function CtrEditarEntrada()
    {

        $v = explode("/", $_GET['views']);
        $id = mainModel::decryption($v[2]);
        $id = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_pagina WHERE id_atractivo_turistico = '$id'");
        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

    // Actualizar
    public function CtrActualizarEntrada()
    {
        $id = mainModel::decryption($_POST["idAtr"]);
        $titulo = mainModel::limpiar_cadena($_POST["tituloAtrUp"]);
        $imagenPath = mainModel::limpiar_cadena($_POST["imagenPathAtrUp"]);
        $img360 = mainModel::limpiar_cadena($_POST["imagenPathAtr360Up"]);
        $contenido = base64_encode($_POST["contenidoAtrUp"]);
        $idl = mainModel::limpiar_cadena($id);
        // if ($password != $password2) {
        //     $alerta = [
        //         "Alerta" => "simple",
        //         "Titulo" => "Error actualizar",
        //         "Texto"  => "No se pudo actualizar el registro revise la contraseña",
        //         "Tipo"   => "error",
        //     ];
        //     return mainModel::sweet_alert($alerta);
        // }
        $datos = [
            "id" => $idl,
            "titulo" => $titulo,
            "imagenPath" => $imagenPath,
            "imagenPath360" => $img360,
            "contenido" => $contenido
        ];

        $actualizar = EntradaModelo::MdlActualzarEntrada($datos);
        if ($actualizar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "!Entrada actualizada!",
                "Texto" => "Se actualizó la entrada con éxito!",
                "Icon" => "success",
                "TxtBtn" => "Aceptar"
            ];
        } else {

            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido actualizar la entrada, por favor intente nuevamente",
                "Icon" => "error",
                "TxtBtn" => "Aceptar"
            ];
        }
        echo json_encode($alerta);

        // return mainModel::sweet_alert($alerta);
    }


    // Eliminar
    public function CtrEliminarEntrada()
    {

        $idusu = mainModel::decryption($_POST['atrDel']);
        $idusulc = mainModel::limpiar_cadena($idusu);
        $eliminar = EntradaModelo::MdlEliminarEntrada($idusulc);

        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Aviso!",
                "Texto" => "Se ha eliminado la entrada :(",
                "Icon" => "success",
                "TxtBtn" => "Aceptar"
            ];
        } else {

            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido eliminar la entrada, por favor intente nuevamente",
                "Icon" => "error",
                "TxtBtn" => "Aceptar"
            ];
        }

        echo json_encode($alerta);
        // return mainModel::sweet_alert($alerta);
    }

    public function CtrMostrarAtractivoNaturalPublic()
    {
        $user = $_SESSION['userinv'];
        $res = EntradaModelo::MdlMostrarAtractivosNaturales();
        $res = $res->fetchAll();
        $card = '';
        if (count($res) >= 1) {
            foreach ($res as $key => $value) {
                $datos = [
                    "idinvitado" =>  $user, /////////COLOCAR ID USUARIOOOOOOOOOOOOOO
                    "atrid" => $value['id_atractivo_turistico']
                ];
                $resLike = EntradaModelo::MdlisLikedEntrada($datos);
                $card .=
                    '
       
            <div class="row" role="button">
                <div class="container-fluid" style="padding: 20px 70px 70px;">
                    <div class="row">
                    
                        <div class="col-md-12">
                            <article class="single-item">
        
                                <header class="header">
                                    <div class="titleAndAuthor">
                                        <span class="title">
                                            ' . $value['at_titulo'] . '
                                        </span>
                                    </div>
                                </header>
<a href="' . SERVERURL . 'natural/' . $value['at_slug'] . '">
                            <div class="thumbnail-wrap">
                                <img loading="lazy" class="grid-preview-image" loading="lazy" alt="" src="' . $value['at_imagen_path'] . '">
                            </div></a>
                        <footer class="stats">';
                if ($resLike->rowCount() >= 1) {

                    $card .= '<button disable class="single-stat invisible-button loves heart-button loved-0" style="color: #f19994">
                                    <i class="fa fa-heart icon-heart heart" aria-hidden="true"></i>
                                    <span id="like_up_count_' . $value['id_atractivo_turistico'] . '" class="likes_count">' . $value['at_likes'] . '</span>
                                </button>';
                } else {

                    $card .= '<button id="like_' . $value['id_atractivo_turistico'] . '" data-id="' . $value['id_atractivo_turistico'] . '" class="single-stat invisible-button loves heart-button loved-0 likeAtrNat" style="outline:none;">
                                    <i class="fa fa-heart icon-heart heart" aria-hidden="true"></i>
                                    <span id="like_up_count_' . $value['id_atractivo_turistico'] . '" class="likes_count">' . $value['at_likes'] . '</span>
                                </button>';
                }




                $card .= '<a class="single-stat views" href="' . SERVERURL . 'natural/' . $value['at_slug'] . '">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span class="count">' . $value['at_vistas'] . '</span>
                            </a>

                        </footer>
                        </article>
                        </div>
                    </div>
                </div>
            </div>

                ';
            }
        } else {
            $card .= '<tr><td> "Ups no hay nada por aquí" </td></tr>';
        }

        return $card;
    }
    // Mostrar Atractivo natural al usuario visitante
    public function CtrMostrarEntradaPublicNat()
    {
        $v = explode("/", $_GET['views']);
        // var_dump($v);
        $slug = $v[1];
        $slug = $slug;
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_pagina WHERE at_slug = '$slug'");
        $respuesta = $consulta1->fetch();
        return $respuesta;
    }


    public function CtrGiveLikeEntrada()
    {

        if (isset($_POST['likedAtrNat'])) {
            $postid = $_POST['atr_id'];

            $usuario =  $_POST['usuinv']; //PILAS EL USUARIO

            $consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_pagina WHERE id_atractivo_turistico  = '$postid'");
            // $result = mysqli_query($con, "SELECT * FROM posts WHERE id=$postid");
            $res = $consulta->fetch();

            // $row = mysqli_fetch_array($result);
            $n = $res['at_likes'];
            $datos = [

                "atrid" => $postid,
                "usuario" => $usuario,
                "likes" => $n
            ];
            $respuesta = EntradaModelo::MdlActualizarLikeAtr($datos);
            $respuesta2 = EntradaModelo::MdlInsertarLikeAtr($datos);
            if ($respuesta->rowCount() >= 1 && $respuesta2->rowCount() >= 1) {
                // echo '<script type="text/JavaScript">document.getElementById("like_'.$postid.'").disabled = true;</script>';

                return $n + 1;
                exit();
            }
        }
    }


    // Mostrar Like box
    public function CtrLlenarComentariosAtrNat()
    {

        $idpost = $_POST['id_post'];
        // $respuesta = mainModel::conectar()->prepare("SELECT * FROM tbl_comentario_like ORDER BY id_comentario_padre asc, id_comentario_like asc");
        $respuesta = mainModel::conectar()->prepare("SELECT `id_comentario`,`id_comentario_padre`,`cl_comentario`,`cl_fecha`,`uin_nombre` 
        FROM `tbl_comentario`as cl 
        INNER JOIN tbl_pagina as atr 
        ON cl.id_pagina = atr.id_atractivo_turistico 
        INNER JOIN tbl_u_invitado as ut 
        ON ut.id_u_invitado = cl.id_u_invitado
        WHERE atr.at_tipo = 'Atractivo natural' AND atr.id_atractivo_turistico = '$idpost'
        ORDER BY id_comentario_padre asc, id_comentario asc");
        $respuesta->execute();
        if ($respuesta->rowCount() == 0) {
            echo 0;
        } else {

            echo json_encode($respuesta);
        }

        $respuesta = null;
    }

    public function CtrInsertarComentarioAtrNat()
    {
        $user = $_SESSION['userinv'];
        $id_post = $_POST['id_post'];
        $cookie = $_COOKIE['USERINV'];
        $cometario = $_POST['comentario'];
        $nombre = $_POST['name'];
        $id_cl = $_POST['id_comentario'];
        $c1 = mainModel::ejecutar_consulta_simple("SELECT uin_nombre FROM tbl_u_invitado WHERE uin_identidicador_cookie = '$cookie' AND uin_nombre = 'No_asignado'");
        $c3 = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_comentario WHERE id_u_invitado = '$user' AND id_pagina = '$id_post AND cl_comentario = NULL");

        $datos = [
            'nombre' => $nombre,
            'user' => $user,
            'cookie' => $cookie,
            'idpost' => $id_post,
            'comentario' => $cometario,
            'idcl' => $id_cl
        ];
        if ($c1 >= 1) {
            EntradaModelo::MdlActualizarUsuInv($datos);
        }
        if ($c3->rowCount() >= 1) {
            $res = EntradaModelo::MdlActualizarIfExistComentarioAtrNat($datos);

            echo $res;
        } else {
            $res = EntradaModelo::MdlInstertarComentarioAtrNat($datos);
            echo $res;
        }
    }


    public function CtrInsertarVistaAtrIfNoWasVisited($postid, $vistas)
    {
        $user = $_SESSION['userinv'];
        $datos = [
            'user' => $user,
            'postid' => $postid,
            'vistas' => $vistas
        ];
        $isVisited = EntradaModelo::MdlIsVisited($datos);
        $isVisited =  $isVisited->fetchAll();
        if (count($isVisited)  <= 0) {
            EntradaModelo::MdlInsertarVistaAtr($datos);
            EntradaModelo::MdlActualizarVistaAtr($datos);
        } else {
        }
    }
}
