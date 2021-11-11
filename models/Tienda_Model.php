<?php

require 'entidades/alumno.php';

class Tienda_Model extends Model
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
            if ($pass == "") {
                $tieneAcceso = false;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $tieneAcceso;

    }

}
