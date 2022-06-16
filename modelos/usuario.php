<?php

require_once('ModeloPadre.php');
require_once('Puesto.php');
require_once('Permiso.php');
require_once('Cafeteria.php');


class Usuario extends ModeloPadre
{

    public function __construct()
    {
        parent::__construct(array(
            'id_usuario' => null,
            'nombre_usuario' => null,
            'apellido_usuario' => null,
            'dni_usuario' => null,
            'telefono_usuario' => null,
            'email_usuario' => null,
            'contrasena_usuario' => null,
            'id_cafeteria' => null,
            'id_permiso' => null,
            'id_puesto' => null
        ));
    }

    public function hashContrasena($contrasena)
    {
        $this->contrasena_usuario = password_hash($contrasena, PASSWORD_DEFAULT);
    }

    public function validate($cnx)
    {
        $errores = array();
        //Validaciones.
        if( !$this->nombre_usuario ) $errores['nombre_usuario'] = 'Ingresar un nombre';
        if( !$this->apellido_usuario ) $errores['apellido_usuario'] = 'Ingresar un apellido';
        if( !filter_var($this->email_usuario, FILTER_VALIDATE_EMAIL) ) $errores['email_usuario'] = 'Ingresar un correo electrónico válido';
        if( !$this->validateEmail($cnx) ) $errores['email_usuario'] = 'El correo electrónico le pertenece a otra persona';
        if( !$this->contrasena_usuario ) $errores['contrasena_usuario'] = 'Ingresar una contraseña.';
        //Devuelve la lista de errores.
        return $errores;
    }
    
    private function validateEmail($cnx)
    {
        if($this->id_usuario){
            //Verifica si el email ya le pertenece a otro usuario que no sea el mismo.
            $consulta = $cnx->prepare('
                SELECT COUNT(1)
                FROM usuarios
                WHERE email = :email
                AND id <> :id
            ');
            $consulta->bindValue(':id', $this->id_usuario);
        }else{
            //Verifica si el email ya le pertenece a otro usuario.
            $consulta = $cnx->prepare('
                SELECT COUNT(1)
                FROM usuario
                WHERE email_usuario = :email
            ');
        }        
        $consulta->bindValue(':email', $this->email_usuario);
        $consulta->execute();
        $cantidad = $consulta->fetchColumn();
        return $cantidad < 1;
    }

    public function save(Cnx $cnx)
    {
        if($this->id_usuario){
            $this->update($cnx);
        }else{
            $this->insert($cnx);
        }
    }

    private function insert(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            INSERT INTO usuario(nombre_usuario, apellido_usuario, dni_usuario, telefono_usuario, email_usuario, contrasena_usuario, id_cafeteria, id_permiso, id_puesto)
            VALUES(:nombre, :apellido, :dni, :telefono, :email, :contrasena, :cafeteria, :permiso, :puesto)
        ');
        $consulta->bindValue(':nombre', $this->nombre_usuario);
        $consulta->bindValue(':apellido', $this->apellido_usuario);
        $consulta->bindValue(':dni', $this->dni_usuario);
        $consulta->bindValue(':telefono', $this->telefono_usuario);
        $consulta->bindValue(':email', $this->email_usuario);
        $consulta->bindValue(':contrasena', $this->contrasena_usuario);
        $consulta->bindValue(':cafeteria', Cafeteria::CAFETERIA);
        $consulta->bindValue(':permiso', Permiso::NORMAL);
        $consulta->bindValue(':puesto', Puesto::CLIENTE);
        $consulta->execute();
        $this->id = $cnx->lastInsertId();
    }

    private function update(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            UPDATE usuarios SET 
                nombre_usuario = :nombre,
                apellido_usuario = :apellido,
                dni_usuario = :dni,
                telefono_usuario = :telefono, 
                email_usuario = :email,
                contrasena_usuario = :contrasena
            WHERE id_usuario = :id
        ');
        $consulta->bindValue(':nombre', $this->nombre_usuario);
        $consulta->bindValue(':apellido', $this->apellido_usuario);
        $consulta->bindValue(':dni', $this->dni_usuario);
        $consulta->bindValue(':telefono', $this->telefono_usuario);
        $consulta->bindValue(':email', $this->email_usuario);
        $consulta->bindValue(':contrasena', $this->contrasena_usuario);
        $consulta->bindValue(':id', $this->id_usuario);
        $consulta->execute();
    }

    public static function find(Cnx $cnx, int $id)
    {
        $consulta = $cnx->prepare('
            SELECT id_usuario, nombre_usuario, apellido_usuario, dni_usuario, telefono_usuario, email_usuario, contrasena_usuario, id_cafeteria, id_permiso, id_puesto
            FROM usuario
            WHERE id_usuario = :id
        ');
        $consulta->bindValue(':id', $id);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Usuario');
        return $consulta->fetch();
    }

    public static function findByEmail(Cnx $cnx, string $email)
    {
        $consulta = $cnx->prepare('
        SELECT id_usuario, nombre_usuario, apellido_usuario, dni_usuario, telefono_usuario, email_usuario, contrasena_usuario, id_cafeteria, id_permiso, id_puesto
            FROM usuario
            WHERE email_usuario = :email
        ');
        $consulta->bindValue(':email', $email);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Usuario');
        return $consulta->fetch();
    }

    public static function login(Cnx $cnx, $email, $contrasena)
    {
        $usuario = self::findByEmail($cnx, $email);
        if($usuario and password_verify($contrasena, $usuario->contrasena)){
            return $usuario;
        }else{
            return false;
        }
    }

}