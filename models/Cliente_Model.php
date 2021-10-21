<?php

class Cliente_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar_cliente($datos)
    {

        $ci = $datos['ci'];
        $nombre = $datos['nombre'];
        $pass = $datos['pass'];

        $query = $this->db->connect()->prepare("INSERT INTO cliente (CI,Nom_usuario,Password_cli) values ('$ci','$nombre','$pass')");

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }

    }

}
