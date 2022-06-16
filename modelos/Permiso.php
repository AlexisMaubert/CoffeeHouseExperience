.<?php

require_once('ModeloPadre.php');

class Permiso extends ModeloPadre
{
    const NORMAL = 1;
    public function __construct()
    {
        parent::__construct(array(
            'id_permiso' => null,
            'nombre_permiso' => null
        ));
    }
}