<?php

require 'entidades/alumno.php';
require 'entidades/articulo.php';

class Tienda_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }
    public function get()
    {

        $items = []; // en el arreglo items se cargan los objetos Articulo

        try {
            $urlDefecto = constant('URL') . '/public/imagenes/articulos/imagenDefecto.svg';
            $query = $this->db->connect()->query('SELECT Cod_Art,Cod_Cat,Nom_art,Marca,Modelo,Descripcion,Precio,Stock FROM articulo');
            while ($row = $query->fetch()) {
                $item = new Articulo();
                $item->Cod_Art = $row['Cod_Art'];
                $item->Cod_Cat = $row['Cod_Cat'];
                $item->Nom_art = $row['Nom_art'];
                $item->Marca = $row['Marca'];
                $item->Modelo = $row['Modelo'];
                $item->Descripcion = $row['Descripcion'];
                $item->Precio = $row['Precio'];
                $item->Stock = $row['Stock'];

                $item->url_img = $urlDefecto;
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            var_dump($e);
        }

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
                    $this->view->render('tienda/tienda');
                    echo "Fallo el registro";
                }
            } else {
                return false;
                $this->view->render('tienda/tienda');
                echo "Fallo el registro";
            }

        } catch (PDOException $e) {
            return false;
        }
    }

}
