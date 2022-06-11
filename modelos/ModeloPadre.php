<?php

 abstract class ModeloPadre {
        public array $data;//hay algo raro aca declarado<<<<<<<

        //Metodos setter y getter que tomaran 1 array convirtiendoloo a propiedades
        public function __construct($c_data)
        {
            $this->data = $c_data;
        }

        public function __set($name, $value)
        {
            if (array_key_exists($name, $this->data)) 
            {
                $this->data[$name] = $value;
            }
        }
        public function __get($name)
        {
            return $this->data[$name];
        }
    }


?>