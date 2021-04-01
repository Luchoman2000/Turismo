<?php
if ($peticionAjax) {
    require_once "../../admin/model-admin/usuario.modelo.php";
} else {
    require_once "./admin/model-admin/usuario.modelo.php";
}
class UsuarioControlador extends UsuarioModelo
{
    public function CtrInsertarUsuario()
    {
        $nombre = $_POST['nombreAdm'];
        $apellido = $_POST['apellidoAdm'];
        $correo = $_POST['correoAdm'];
        $usuario = $_POST['usuarioAdm'];
        $pass = $_POST['claveAdm'];

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_administrador WHERE usu_usuario = '$usuario' AND usu_correo = '$correo'");
        if ($consulta1->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Error",
                "Texto" => "El usuario o el correo ya existe",
                "Icon" => "error",
                "TxtBtn" => "Aceptar"
            ];
            echo json_encode($alerta);
            exit();
        } else {
            $nombre = mainModel::limpiar_cadena($nombre);
            $apellido = mainModel::limpiar_cadena($apellido);
            $correo = mainModel::limpiar_cadena($correo);
            $usuario = mainModel::limpiar_cadena($usuario);
            $pass = mainModel::limpiar_cadena($pass);
            $datos = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'correo' => $correo,
                'usuario' => $usuario,
                'pass' => $pass,
            ];

            $res = UsuarioModelo::MdlInsertarUsuario($datos);
            if ($res->rowCount() >= 1) {
                $alerta = [
                    "Alerta" => "recargar",
                    "Titulo" => "Entrada registrada!",
                    "Texto" => "Se registró el usuario con éxito en el sistema",
                    "Icon" => "success",
                    "TxtBtn" => "Aceptar"
                ];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Ocurrió un error inesperado",
                    "Texto" => "No hemos podido registrar el usuario, por favor intente nuevamente",
                    "Icon" => "error",
                    "TxtBtn" => "Aceptar"
                ];
            }
            echo json_encode($alerta);
        }
    }

    public function CtrMostrarUsuariosAdm()
    {
        $res = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_administrador");
        $res = $res->fetchAll();
        $tabla = '';
        if ($res >= 1) {


            $tabla .= '
        <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Usuarios</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Usuario</th>
                                            <th>Fecha de creación</th>
                                            <th>Accion</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
        ';
            foreach ($res as $key => $value) {
                $tabla .= '
                                        <tr>
                                            <td>' . $value['id_usuario'] . '</td>
                                            <td>' . $value['usu_nombre'] . '</td>
                                            <td>' . $value['usu_apellido'] . '</td>
                                            <td>' . $value['usu_correo'] . '</td>
                                            <td>' . $value['usu_usuario'] . '</td>
                                            <td>' . $value['usu_fecha_registro'] . '<br /></td>
                                            <td>
                                            <a onclick="fillform(' . $value['id_usuario'] . ')" id="ActualizarUsu' . $value['id_usuario'] . '" class="btn btn-success" role="button" style="background: rgb(11,171,56);margin: 2px;">
                                            <input type="hidden" name="usuUp" value="' . mainModel::encryption($value['id_usuario']) . '">
                                            <i class="fas fa-pencil-alt"></i>
                                            </a>
                    
                    
                                            <form class="FormularioAjax clearmargin clearpadding d-inline" method="POST" data-form="delete" action="' . SERVERURL . 'admin/ajax-admin/usuarios.ajax.php">
                                            <input type="hidden" name="usuAdmDel" value="' . mainModel::encryption($value['id_usuario']) . '">
                                            <button class="btn btn-danger" type="submit" style="margin: 2px;">
                                            <i class="fas fa-trash"></i></button>
                                            </form>
                                            </td>
                                        </tr>
            ';
            }
        } else {
            $tabla .= '<tr><td> " No hay registros en el sistema" </td></tr>';
        }

        $tabla .= '</tbody>
        </table>';
        return $tabla;
    }

    public function CtrMostrarUsuarioAdm()
    {
        $res = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_administrador WHERE id_usuario = 1");
        $res = $res->fetch();
        return $res;
    }

    public function CtrActualizarUsuario()
    {
        $id = $_POST['idUsuario'];
        $nombre = $_POST['nombreAdm'];
        $apellido = $_POST['apellidoAdm'];
        $correo = $_POST['correoAdm'];
        $usuario = $_POST['usuarioAdm'];
        $pass = $_POST['claveAdm'];
        // $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_administrador WHERE usu_usuario = '$usuario' AND usu_correo = '$correo'");
        // if ($consulta1->rowCount() >= 1) {
        //     $alerta = [
        //         "Alerta" => "simple",
        //         "Titulo" => "Error",
        //         "Texto" => "El usuario o el correo fueron asignados",
        //         "Icon" => "error",
        //         "TxtBtn" => "Aceptar"
        //     ];
        //     echo json_encode($alerta);
        //     exit();
        // } else {
        $nombre = mainModel::limpiar_cadena($nombre);
        $apellido = mainModel::limpiar_cadena($apellido);
        $correo = mainModel::limpiar_cadena($correo);
        $usuario = mainModel::limpiar_cadena($usuario);
        $pass = mainModel::limpiar_cadena($pass);
        $datos = [
            'id' => $id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'correo' => $correo,
            'usuario' => $usuario,
            'pass' => $pass,
        ];

        $res = UsuarioModelo::MdlActualizarUsuario($datos);
        if ($res->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Entrada registrada!",
                "Texto" => "Se actualizo el usuario con éxito en el sistema",
                "Icon" => "success",
                "TxtBtn" => "Aceptar"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido actualizar el usaurio, por favor intente nuevamente",
                "Icon" => "error",
                "TxtBtn" => "Aceptar"
            ];
            // }
        }
        echo json_encode($alerta);
    }

    public function CtrMostrarUsuariosVisitantes()
    {
        $consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_u_invitado");
        $consulta = $consulta->fetchAll();
        $tabla = '';
        if ($consulta >= 1) {


            $tabla .= '
        <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Usuarios que han visitado el sitio</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Identificador cookie</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Likes totales</th>
                                            <th>Accion</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
        ';
            foreach ($consulta as $key => $value) {
                $u = $value['id_u_invitado'];
                $con1 = mainModel::ejecutar_consulta_simple("
                SELECT COUNT(*) FROM `tbl_u_invitado` as u 
                INNER JOIN tbl_atr_uin as atr ON u.id_u_invitado = atr.id_u_invitado 
                WHERE u.id_u_invitado = '$u'
                ");
                $con1 = $con1->fetch();
                $con2 = mainModel::ejecutar_consulta_simple("
                SELECT COUNT(*) FROM `tbl_u_invitado` as u 
                INNER JOIN tbl_gas_inv as gas ON u.id_u_invitado = gas.id_u_invitado  
                WHERE u.id_u_invitado = '$u'
                ");
                $con2 = $con2->fetch();

                $tabla .= '
                                        <tr>
                                            <td>' . $value['id_u_invitado'] . '</td>
                                            <td>' . $value['uin_identificador_cookie'] . '</td>
                                            <td>' . $value['uin_nombre'] . '</td>
                                            <td>' . $value['uin_correo'] . '</td>
                                            <td>' . $con1['COUNT(*)'] + $con2['COUNT(*)'] . '<br /></td>
                                            <td>
                                            
                                            <form class="FormularioAjax clearmargin clearpadding d-inline" method="POST" data-form="delete" action="' . SERVERURL . 'admin/ajax-admin/usuarios.ajax.php">
                                            <input type="hidden" name="usuInvDel" value="' . mainModel::encryption($value['id_u_invitado']) . '">
                                            <button class="btn btn-danger" type="submit" style="margin: 2px;">
                                            <i class="fas fa-trash"></i></button>
                                            </form>
                                            </td>
                                        </tr>
            ';
            }
        } else {
            $tabla .= '<tr><td> " No hay registros en el sistema" </td></tr>';
        }

        $tabla .= '</tbody>
        </table>';
        return $tabla;
    }

    // Eliminar
    public function CtrEliminarUsuarioInv()
    {

        $idusu = mainModel::decryption($_POST['usuInvDel']);
        $idusulc = mainModel::limpiar_cadena($idusu);
        $eliminar = UsuarioModelo::MdlEliminarUsaurioInvitado($idusulc);

        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Aviso!",
                "Texto" => "Se ha eliminado el usuario visitante :(",
                "Icon" => "success",
                "TxtBtn" => "Aceptar"
            ];
        } else {

            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido eliminar el usuario, por favor intente nuevamente",
                "Icon" => "error",
                "TxtBtn" => "Aceptar"
            ];
        }

        echo json_encode($alerta);
        // return mainModel::sweet_alert($alerta);
    }

    // Eliminar Admin
    public function CtrEliminarAdm()
    {

        $idusu = mainModel::decryption($_POST['usuAdmDel']);
        $idusulc = mainModel::limpiar_cadena($idusu);
        $eliminar = UsuarioModelo::MdlEliminarAdministrador($idusulc);

        if ($eliminar->rowCount() >= 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Aviso!",
                "Texto" => "Se ha eliminado el administrador",
                "Icon" => "success",
                "TxtBtn" => "Aceptar"
            ];
        } else {

            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "No hemos podido eliminar el usuario, por favor intente nuevamente",
                "Icon" => "error",
                "TxtBtn" => "Aceptar"
            ];
        }

        echo json_encode($alerta);
        // return mainModel::sweet_alert($alerta);
    }
}
