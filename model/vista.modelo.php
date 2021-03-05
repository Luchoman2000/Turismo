<?php

class VistasModelo
{
	protected function MdlMostrarVistas($vistas)
	{

        // URLs permitidas
		$listaBlanca = ["admin", "adminlist", "adminsearch", "adminup", "book", "bookconfig",
         "bookinfo", "catalog", "category", "categorylist", "client", "clientlist", "clientsearch", 
         "company", "companylist", "deleteuser", "home", "login", "myaccount", "mydata", "provider", 
         "providerlist", "search", "404","home"];


		if (in_array($vistas, $listaBlanca)) {
			if (is_file("./view/contenido/" . $vistas . "-view.php")) {
				$contenido = "./view/contenido/" . $vistas . "-view.php";
			} else {
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
