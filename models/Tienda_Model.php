<?php

require 'entidades/articulo.php';
require 'entidades/carrito.php';
require 'entidades/pedidos.php';

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
            $query = $this->db->connect()->query('SELECT Cod_Art,Cod_Cat,Nom_art,Marca,Modelo,Descripcion,Precio,Stock,Imagen FROM articulo');
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

                $item->urlP = constant('URL') . $row['Imagen'];
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
    public function buscar($texto)
    {
        $articulos = [];
        try {
            $urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            $query = $this->db->connect()->prepare('SELECT Cod_Art, Nom_art, Descripcion, Precio, Estado, Imagen FROM articulo WHERE Nom_art LIKE :e1 or Descripcion LIKE :e2');
            $txt01 = "%" . $texto . "%";
            $query->bindParam(':e1', $txt01);
            $query->bindParam(':e2', $txt01);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            while ($row = $query->fetch()) {
                $articulo = new Articulo();
                $articulo->Cod_Art = $row['Cod_Art'];
                $articulo->Nom_art = $row['Nom_art'];
                $articulo->Descripcion = $row['Descripcion'];
                $articulo->Precio = $row['Precio'];
                $articulo->Estado = $row['Estado'];
                $articulo->urlP = constant('URL') . $row['Imagen'];
                $articulos[] = $articulo;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $articulos;
    }

}
