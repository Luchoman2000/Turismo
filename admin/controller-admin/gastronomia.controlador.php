<?php
if ($peticionAjax) {
    require_once "../../admin/model-admin/gastronomia.modelo.php";
} else {
    require_once "./admin/model-admin/gastronomia.modelo.php";
}
class GastronomiaControlador extends GastronomiaModelo
{


    // Insertar
    public function CtrInsertarGastronomia()
    {
        $isCorrect = true;
        $titulo    = $_POST['tituloGas'];
        $imagenPath    = $_POST['imagenPathGas'];
        $contenido    = $_POST['contenidoGas'];

        // if ($password != $password2) {
        //     $alerta = [
        //         "Alerta" => "simple",
        //         "Titulo" => "Ocurrio un error",
        //         "Texto"  => "La contraseña no es semejante!",
        //         "Tipo"   => "error",
        //     ];
        //     return mainModel::sweet_alert($alerta);
        // } else {

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_p_gastronomia WHERE gas_titulo = '$titulo'");
        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Error",
                "Texto" => "La entrada ya existe",
                "Icon" => "error",
                "TxtBtn" => "Aceptar"
            ];
            echo json_encode($alerta);
            exit();
        } else {
            $titulo  = mainModel::limpiar_cadena($titulo);
            $contenido  = mainModel::limpiar_cadena($contenido);
            // $COn  = mainModel::limpiar_cadena($password);
            $datos    = [
                "titulo" => $titulo,
                "imagenPath" => $imagenPath,
                "contenido" => $contenido
            ];
            $insertar = GastronomiaModelo::MdlInsertarGastronomia($datos);
            if ($insertar->rowCount() >= 1) {
                $alerta = [
                    "Alerta" => "limpiar",
                    "Titulo" => "¡Gastronomía registrada!",
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
    public function CtrMostrarGastronomia()
    {
        $res = GastronomiaModelo::MdlMostrarGastronomias();
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
                         <th class="text-left">ID</th>
                         <th class="text-left">Titulo</th>
                         <th class="text-center">Likes</th>
                         <th class="text-center">fecha de creación</th>
                         <th class="text-center">Ver</th>
                         <th class="text-center">Editar</th>
                         <th class="text-center">Eliminar</th>
                       </tr>
                   </thead>
                   <tbody class="text-center">';

        if (count($res) >= 1) {
            foreach ($res as $key => $value) {
                $tabla .= '<tr>
                <td class="text-left">' . $value['gas_id'] . '</td>
                <td class="text-left">' . $value['gas_titulo'] . '</td>
                <td>' . $value['gas_likes'] . '</td>
                <td>' . $value['gas_fecha_creacion'] . '</td>

                <td>
                    <a class="btn btn-primary" target ="_blank" href="' . SERVERURL . 'gastronomia/#' . mainModel::makeSlug($value['gas_titulo']) . '_redirect" role="button" style="margin: 2px;">
                        <i class="far fa-eye"></i>
                    </a>
                    </td>
                    <td>
                    <a href="' . SERVERURL . 'admin/gastronomiaup/' . mainModel::encryption($value['gas_id']) . '" class="btn btn-success" role="button" style="background: rgb(11,171,56);margin: 2px;">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    </td>
                    <td>
                    <form class="FormularioAjax" method="POST" data-form="delete" action="' . SERVERURL . 'admin/ajax-admin/gastronomia.ajax.php">
                    <input type="hidden" name="gasDel" value="' . mainModel::encryption($value['gas_id']) . '">
                    <button class="btn btn-danger" type="submit" style="margin: 2px;">
                        <i class="fas fa-trash"></i></button>
                    </form>
                    </td>
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
    // Eliminar
    public function CtrEliminarGastronomia()
    {

        $idusu = mainModel::decryption($_POST['gasDel']);
        $idusulc = mainModel::limpiar_cadena($idusu);
        $eliminar = GastronomiaModelo::MdlEliminarGastronomia($idusulc);

        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Alerta!",
                "Texto" => "Si eliminará tota la actividad de este atractivo. ¿Continuar?",
                "Icon" => "question",
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

    // Editar
    public function CtrEditarGastronomia()
    {

        $v = explode("/", $_GET['views']);
        $id = mainModel::decryption($v[2]);
        $id = mainModel::limpiar_cadena($id);
        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_p_gastronomia WHERE gas_id = '$id'");
        $respuesta = $consulta1->fetch();
        return $respuesta;
    }

    // Consulta mostrar Gastronomia para el visitante
    public function CtrMostrarGastronomiaPublic()
    {
        $user = $_SESSION['userinv'];
        $res = GastronomiaModelo::MdlMostrarGastronomias();
        $res = $res->fetchAll();



        $card = '';
        if (count($res) >= 1) {
            foreach ($res as $key => $value) {
                $datos = [
                    "idinvitado" =>  $user, /////////COLOCAR ID USUARIOOOOOOOOOOOOOO
                    "gasid" => $value['gas_id']
                ];
                $resLike = GastronomiaModelo::MdlisLikedGastronomia($datos);

                $card .= '
        <div class="container" id="' . mainModel::makeSlug($value['gas_titulo']) . '_redirect" ">
            <div class="row photo-card mt-5 mb-5">
                <div class="col align-self-start col-lg-6">
                    <div class="photo-details" style="width: 100%;">

                        <h2>' . $value['gas_titulo'] . '</h2>

                        <p class="lead text-break text-dark" style="width: 436px;color: rgb(0,0,0);">  ' . $value['gas_contenido'] . '</p>

                        <div style="text-align: center;margin-top: 30px;margin-bottom: 15px;">';
                if ($resLike->rowCount() >= 1) {
                    $card .= '<a disabled class="btn btn-secondary " data-id="' . $value['gas_id'] . '" role="button" style="border-radius: 21px;"> <i class="fa fa-thumbs-up"></i> | 
                                    <span id="like_up_count_' . $value['gas_id'] . '" class="likes_count" > ' . $value['gas_likes'] . '</span>
                                </a>';
                } else {

                    $card .= '<a id="like_' . $value['gas_id'] . '" class="btn btn-primary like" data-id="' . $value['gas_id'] . '" role="button" style="border-radius: 21px;"> <i class="fa fa-thumbs-up"></i> | 
                                    <span id="like_up_count_' . $value['gas_id'] . '" class="likes_count" > ' . $value['gas_likes'] . '</span>
                                </a>';
                }



                $card .= '</div>
                    </div>
                </div>';
                $paths = $value['gas_path_imagen'];
                $arrayPaths = explode(",", $paths);
                // var_dump($arrayPaths);
                if (count($arrayPaths) == 1) {
                    $card .= '
                <div class="col col-lg-6 mt-2 mb-2" >
                    <img loading="lazy" class=" w-100" src="' . $arrayPaths[0] . '" alt="First slide">
                </div>';
                } else {
                    $card .= '
            <div class="col align-self-center col-lg-6">
                <div id="' . mainModel::makeSlug($value['gas_titulo']) . '_Controls" class="carousel slide " data-ride="carousel">
                    <div class="carousel-inner">';
                    $card .= '
                    <div class="carousel-item active mt-2 mb-2" style=" width: 100%; height: 360px;">
                        <img loading="lazy" class=" img-fluid" style="height: 100%; width: 100%;" src="' . $arrayPaths[0] . '" alt="' . 0 . ' slide" />
                   </div>';
                    for ($i = 1; $i < count($arrayPaths); $i++) {

                        $card .= '
                            <div class="carousel-item mt-2 mb-2" style=" width: 100%; height: 360px;">
                                <img loading="lazy" class=" img-fliud " style="height: 100%; width: 100%;" src="' . $arrayPaths[$i] . '" alt="' . $i . ' slide" />
                            </div>';
                    }
                    $card .= '
                        <a class="carousel-control-prev" href="#' . mainModel::makeSlug($value['gas_titulo']) . '_Controls" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#' . mainModel::makeSlug($value['gas_titulo']) . '_Controls" data-slide="next">
                            <span class="carousel-control-next-icon">
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>';
                }
                $card .= '</div>  </div>';
            }
        } else {
            $card .= '<tr><td> "Ups no hay nada por aquí" </td></tr>';
        }

        return $card;
    }

    // Actualizar
    public function CtrActualizarGastronomia()
    {
        $id = mainModel::decryption($_POST["idGasUp"]);
        $titulo = mainModel::limpiar_cadena($_POST["tituloGasUp"]);
        $imagenPath = mainModel::limpiar_cadena($_POST["imagenPathGasUp"]);
        $contenido = mainModel::limpiar_cadena($_POST["contenidoGasUp"]);
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
            "contenido" => $contenido
        ];

        $actualizar = GastronomiaModelo::MdlActualzarGastronomia($datos);
        if ($actualizar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "¡Gastronomía actualizada!",
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

    // Dar like CtrEliminarGastronomia
    public function CtrGiveLikeGastronomia()
    {

        if (isset($_POST['liked'])) {
            $postid = $_POST['gas_id'];

            $usuario =  $_POST['usuinv']; //PILAS EL USUARIO

            $consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_p_gastronomia WHERE gas_id  = '$postid'");
            // $result = mysqli_query($con, "SELECT * FROM posts WHERE id=$postid");
            $res = $consulta->fetch();

            // $row = mysqli_fetch_array($result);
            $n = $res['gas_likes'];
            $datos = [

                "gasid" => $postid,
                "usuario" => $usuario,
                "likes" => $n
            ];
            $respuesta = GastronomiaModelo::MdlActualizarLike($datos);
            $respuesta2 = GastronomiaModelo::MdlInsertarLike($datos);
            if ($respuesta->rowCount() >= 1 && $respuesta2->rowCount() >= 1 ) {
                // echo '<script type="text/JavaScript">document.getElementById("like_'.$postid.'").disabled = true;</script>';

                return $n + 1;
                exit();
            }


        }
    }
}
