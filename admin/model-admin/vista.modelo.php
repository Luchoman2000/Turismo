<?php

class VistasModeloAdm
{
	protected function MdlMostrarVistas($vistas)
	{

        // URLs permitidas
		$listaBlanca = ["home","gestionara","gestionargaleria","usuarios","crearentrada","creargastronomia",
		"gestionarcomentarios","listgastronomia","gastronomiaup","listentrada","entradaup","listuvisitante"];


		if (in_array($vistas, $listaBlanca)) {
			if (is_file("./admin/view-admin/contenido/" . $vistas . "-view.php")) {
				$contenido = "./admin/view-admin/contenido/" . $vistas . "-view.php";
			} else {
				$contenido = "login";
			}
		} 
        elseif ($vistas == "login") {
			$contenido = "login";
		} elseif ($vistas == "index") {
			$contenido = "login";
		} 
        else {
			$contenido = "404";
		}
		return $contenido;
	}
}
