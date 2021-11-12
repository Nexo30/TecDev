<?php

require 'entidades/alumno.php';

class Index_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar($nombre, $pass)
    {

        $tieneAcceso = false;

        try {
            $query = $this->db->connect()->prepare('SELECT Password_cli FROM cliente WHERE Nom_usuario =:nombre');
            $query->bindValue(':nombre', $nombre);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            $paswordStr = "";
            while ($row = $query->fetch()) {
                $paswordStr = $row['Password_cli'];
            }
            if ($paswordStr == $pass) {
                $tieneAcceso = true;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $tieneAcceso;

    }
    public function registrar($datos)
    {
        $pass = $datos['contrasena'];
        $nombre = $datos['nombre'];
        $calle = $datos['calle'];
        $ciudad = $datos['ciudad'];
        $numero = $datos['telefono'];

        $query = $this->db->connect()->prepare("INSERT INTO cliente (Nom_usuario,Password_cli) values ('$nombre','$pass')");

        if ($query->execute()) {

            $query = $this->db->connect()->prepare("INSERT INTO persona (Nombre,Calle,Ciudad,Numero) values ('$nombre','$calle','$ciudad','$numero')");
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
