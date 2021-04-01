<?php
//crear objeto ruta
require_once 'core/rutas.php';
class buscar
{
    public static function BuscarsabiasQue()
    {
        $ubicacion = new rutas();

        //devuelve archivos ruta
        $pat = $ubicacion->getRuta() . "assets\\images\\sabias-que\\";
        $imagenes = preg_grep('~\.(jpg|png|jpeg)$~', scandir($pat));
        return $imagenes;
    }
}
