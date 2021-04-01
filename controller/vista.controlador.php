<?php
include 'core/configGeneral.php';
require_once "./model/vista.modelo.php";
class vistaControlador extends VistasModelo
{
	public function ctrMostrarInicio()
	{
		if (isset($_GET['views'])) {
			$ruta = explode("/", $_GET["views"]);

			if ($ruta[0] == "admin") {
				// header("Location: ".SERVERURL."admin/index.php");
				return require_once './admin/index.php';
			} else {

				return require_once './view/inicio.php';
			}
		} else {

			return require_once './view/inicio.php';
		}
	}
	public function ctrMostrarVistas()
	{
		if (isset($_GET["views"])) {

			$ruta = explode("/", $_GET["views"]);


			$respuesta = VistasModelo::MdlMostrarVistas($ruta[0]);
		} else {
			$respuesta = "home";
			// require_once './view/inicio.php';

		}
		return $respuesta;
	}
}
