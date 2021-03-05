<?php
require_once"./model/vista.modelo.php";
class vistaControlador extends VistasModelo
{
    public function ctrMostrarInicio()
    {
        return require_once './view/inicio.php';
    }
	public function ctrMostrarVistas()
	{
		if (isset($_GET["views"])) {
			$ruta=explode("/",$_GET["views"]);
			$respuesta=VistasModelo::MdlMostrarVistas($ruta[0]);
			}else {
				$respuesta="home";

			}
			return $respuesta;
	}
}