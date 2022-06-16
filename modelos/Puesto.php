.<?php

require_once('ModeloPadre.php');

class Puesto extends ModeloPadre
{
    const CLIENTE = 1;
    public function __construct()
    {
        parent::__construct(array(
            'id_puesto' => null,
            'nombre_puesto' => null,
            'turno_puesto' => null
        ));
    }
}