<?php
class rutas
{
    private $rutas = "C:\\xampp\\htdocs\\Turismo\\";

    public function setRuta($rutas)
    {
        $this->rutas = $rutas;
    }
    public function getRuta()
    {
        return $this->rutas;
    }
}
