<?php

require_once('ModeloPadre.php');

class Cafeteria extends ModeloPadre
{

    const CAFETERIA = 1;

    public function __construct()
    {
        parent::__construct(array(
            'id_cafeteria' => null,
            'nombre_cafeteria' => null,
            'direccion_cafeteria' => null
        ));
    }

}