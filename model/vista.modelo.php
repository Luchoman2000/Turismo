<?php

class VistasModelo
{
	protected function MdlMostrarVistas($vistas)
	{

        // URLs permitidas
		$listaBlanca = ["atractivosnaturales","home","admin","exposicionfotos","gastronomia","sabiasque","historia","ubicacion","atractivosculturales","natural"];


		if (in_array($vistas, $listaBlanca)) {
			if (is_file("./view/contenido/" . $vistas . "-view.php")) {
				$contenido = "./view/contenido/" . $vistas . "-view.php";

				// echo $contenido;	
			}
			else {
				$contenido = "home";
				
			}
		} 
        // elseif ($vistas == "login") {
		// 	$contenido = "login";
		// } elseif ($vistas == "index") {
		// 	$contenido = "login";
		// } 
        else {
			$contenido = "404";
		}
		return $contenido;
	}
}
