<?php

class Carrito_Model extends Model
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
        $items = []; // en el arreglo items se cargan los objetos Articulo
    }
    public function admin($nombre, $pass)
    {

        $admin = false;

        try {
            $query = $this->db->connect()->prepare('SELECT Password_adm FROM usuario WHERE id_adm =:nombre');
            $query->bindValue(':nombre', $nombre);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            $paswordStrA = "";
            while ($row = $query->fetch()) {
                $paswordStrA = $row['Password_adm'];
            }
            if ($paswordStrA == $pass) {
                $admin = true;
            }
            if ($pass == "") {
                $admin = false;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $admin;
        $items = []; // en el arreglo items se cargan los objetos Articulo
    }
    public function registrar($datos)
    {
        $pass = $datos['contrasena'];
        $nombre = $datos['usuario'];
        $apellido = $datos['apellido'];
        $calle = $datos['calle'];
        $ciudad = $datos['ciudad'];
        $numero = $datos['telefono'];
        try {
            $query = $this->db->connect()->prepare("INSERT INTO cliente (Nom_usuario,Password_cli) values ('$nombre','$pass')");

            if ($query->execute()) {
                $query = $this->db->connect()->prepare("INSERT INTO persona (Nombre,Apellido,Calle,Ciudad,Numero) values ('$nombre','$apellido','$calle','$ciudad','$numero')");
                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                    $this->view->render('carrito/index');
                    echo "Fallo el registro";
                }
            } else {
                return false;
                $this->view->render('carrito/index');
                echo "Fallo el registro";
            }

        } catch (PDOException $e) {
            return false;
        }
    }
}
