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
        $nom_usuario = $datos['nom_usuario'];
        $pass = $datos['pass'];
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $calle = $datos['calle'];
        $ciudad = $datos['ciudad'];
        $numero = $datos['numero'];

        $query = $this->db->connect()->prepare("INSERT INTO cliente (CI,Nom_usuario,Password_cli) values ('$ci','$nom_usuario','$pass')");

        if ($query->execute()) {

            $query = $this->db->connect()->prepare("INSERT INTO persona (CI,Nombre,Apellido,Calle,Ciudad,Numero) values ('$ci','$nombre','$apellido','$calle','$ciudad','$numero')");
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }

}
