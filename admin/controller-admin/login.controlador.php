<?php

if ($peticionAjax) {
	require_once "../../core/mainModel.php";
	require_once "../../core/configGeneral.php";
} else {
	require_once "./core/mainModel.php";
	require_once "./core/configGeneral.php";
}

class LoginControlador extends mainModel
{

	/*----------  Controlador iniciar sesion administrador - Controller login administrator ----------*/
	public function iniciar_sesion_administrador_controlador()
	{

		$usuario = mainModel::limpiar_cadena($_POST['admUser']);
		$clave = mainModel::limpiar_cadena($_POST['admPass']);

		/*-- Comprobando campos vacios - Checking empty fields --*/
		if ($usuario == "" || $clave == "") {
			echo '<script>
					Swal.fire({
					  title: "Ocurrió un error inesperado",
					  text: "No has llenado todos los campos que son requeridos.",
					  icon: "error",
					  confirmButtonText: "Aceptar"
					});
				</script>';
			exit();
		}
		/*-- Verificando integridad datos - Verifying data integrity --*/
		if (mainModel::verificar_datos("[a-zA-Z0-9]{4,30}", $usuario)) {
			echo '<script>
				Swal.fire({
				  title: "Ocurrió un error inesperado",
				  text: "El nombre de usuario no coincide con el formato solicitado.",
				  icon: "error",
				  confirmButtonText: "Aceptar"
				});
			</script>';
			exit();
		}
		if (mainModel::verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave)) {
			echo '<script>
				Swal.fire({
				  title: "Ocurrió un error inesperado",
				  text: "La contraseña no coincide con el formato solicitado.",
				  icon: "error",
				  confirmButtonText: "Aceptar"
				});
			</script>';
			exit();
		}



		// $clave = mainModel::encryption($clave);k

		/*-- Verificando datos de la cuenta - Verifying account details --*/

		// $datos_cuenta = mainModel::datos_tabla("Normal", "usuario WHERE usuario_usuario='$usuario' AND 	usuario_clave='$clave' ", "*", 0);
		$datos_cuenta = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_administrador WHERE usu_usuario ='$usuario' AND  usu_clave = '$clave'");

		$row = $datos_cuenta->fetch();
		if ($datos_cuenta->rowCount() == 1) {

			// session_start(["name"=> "ADM-MEJIA"]);

			$_SESSION['id_admin'] = $row['id_usuario'];
			$_SESSION['adm_nombre'] = $row['usu_nombre'];
			$_SESSION['adm_correo'] = $row['usu_correo'];

			if (headers_sent()) {
				return "<script> window.location.href='" . SERVERURL. "'admin/home'; </script>";
			} else {
				return header("Location: " . SERVERURL . "admin/home");
			}
			$url = SERVERURL . "admin/home/";
			echo $url;
			echo $_SESSION['adm_nombre'];
			// return $urllocation = '<script> window.location = "'.$url.'"</script>';
		} else {
			echo '<script>
					Swal.fire({
					  title: "Datos incorrectos",
					  text: "El nombre de usuario o contraseña no son correctos.",
					  icon: "error",
					  confirmButtonText: "Aceptar"
					});
				</script>';
		}
	} /*-- Fin controlador - End controller --*/


	/*----------  Controlador forzar cierre de sesion - Controller force logout ----------*/
	public function forzar_cierre_sesion_controlador()
	{
		session_unset();
		session_destroy();
		if (headers_sent()) {
			return "<script> window.location.href='" . SERVERURL . "admin/'; </script>";
		} else {
			return header("Location: " . SERVERURL . "admin/");
		}
	} /*-- Fin controlador - End controller --*/


	/*----------  Controlador cierre de sesion administrador - Controller logout administrator  ----------*/
	public function cerrar_sesion_administrador_controlador()
	{
		

			unset($_SESSION['id_admin']);
			unset($_SESSION['adm_nombre']);
			unset($_SESSION['adm_correo']);
			$alerta = [
				"Alerta" => "redireccionar",
				"URL" => SERVERURL . "admin/"
			];
		// } else {
		// 	$alerta = [
		// 		"Alerta" => "simple",
		// 		"Titulo" => "Ocurrió un error inesperado",
		// 		"Texto" => "No se pudo cerrar la sesión",
		// 		"Icon" => "error",
		// 		"TxtBtn" => "Aceptar"
		// 	];
		// }
		echo json_encode($alerta);
	} /*-- Fin controlador - End controller --*/
}
