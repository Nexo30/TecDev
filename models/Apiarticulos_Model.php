<?php

require_once 'entidades/articulo.php';

class Apiarticulos_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        //define un arreglo en php
        //$items = array();
        $items = [];
        try {
            //$urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            $query = $this->db->connect()->query('SELECT Cod_Art,Nom_art,Descripcion,Precio,Stock,Marca,Modelo,Cod_Cat FROM articulo');
            while ($row = $query->fetch()) {
                $item = new Articulos();
                $item->Cod_Art = $row['Cod_Art'];
                $item->Nom_art = $row['Nom_art'];
                $item->Descripcion = $row['Descripcion'];
                $item->Precio = $row['Precio'];
                $item->Stock = $row['Stock'];
                $item->Marca = $row['Marca'];
                $item->Modelo = $row['Modelo'];
                $item->Cod_Cat = $row['Cod_Cat'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    } //end listar

    public function crear($articulos)
    {

        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('insert into articulo (Nom_art, Descripcion,Precio, Stock, Marca, Modelo,Cod_Cat) values (:Nom_art, :Descripcion, :Precio, :Stock, :Marca, :Modelo, :Cod_Cat)');
            $query->bindParam(':Nom_art', $articulos->Nom_art);
            $query->bindParam(':Descripcion', $articulos->Descripcion);
            $query->bindParam(':Precio', $articulos->Precio);
            $query->bindParam(':Stock', $articulos->Stock);
            $query->bindParam(':Marca', $articulos->Marca);
            $query->bindParam(':Modelo', $articulos->Modelo);
            $query->bindParam(':Cod_Cat', $articulos->Cod_Cat);

            $lastInsertId = 0;
            if ($query->execute()) {
                $lastInsertCod_Art = $pdo->lastInsertId();
            } else {
                //Pueden haber errores, como clave duplicada
                $lastInsertCod_Art = -1;
                //echo $consulta->errorInfo()[2];
            }
            //$query->close();
            return $lastInsertCod_Art;
        } catch (PDOException $e) {
            return -1;
        } finally {
            $pdo = null;
        }
    } //end crear
    public function crearm($lista)
    {

        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('insert into productos (Nom_art, Descripcion,Precio,Stock, Estado, Categoria, Imagen) values (:Nom_art, :Descripcion, :Precio, :Stock, :Estado, :Cod_Cat :Imagen)');
            foreach ($lista as $key => $articulos) {
                $query->bindParam(':Nom_art', $articulos->Nom_art);
                $query->bindParam(':Descripcion', $articulos->Descripcion);
                $query->bindParam('Precio', $articulos->Precio);
                $query->bindParam(':Stock', $articulos->Stock);
                $query->bindParam(':Estado', $articulos->Estado);
                $query->bindParam(':Cod_Cat', $articulos->Cod_Cat);
                $query->bindParam(':Imagen', $articulos->Imagen);
                $query->execute();
            }
            //$query->close();
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            $pdo = null;
        }
    } //end crearm
    //create insert
    //read select
    //update update
    //delete delete
    public function borrar($Cod_Art)
    {
        $resultado = false;
        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('delete from articulo where Cod_Art=:Cod_Art');
            $query->bindParam(':Cod_Art', $Cod_Art);
            if ($query->execute()) {
                $resultado = true;
            }
            //$query->close();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        } finally {
            $pdo = null;
        }
    } //end crearm

    public function actualizar($articulos)
    {

        $resultado = false;
        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('UPDATE articulo SET Nom_art=:Nom_art, Descripcion=:Descripcion, Precio= :Precio, Stock= :Stock, Estado= :Estado, Cod_Cat= :Cod_Cat WHERE Cod_Art = :Cod_Art');
            $query->bindParam(':Nom_art', $articulos->Nom_art);
            $query->bindParam(':Descripcion', $articulos->Descripcion);
            $query->bindParam(':Precio', $articulos->Precio);
            $query->bindParam(':Stock', $articulos->Stock);
            $query->bindParam(':Estado', $articulos->Estado);
            $query->bindParam(':Cod_Cat', $articulos->Cod_Cat);
            $query->bindParam(':Cod_Art', $articulos->Cod_Art);

            $lastInsertId = 0;
            $resultado = $query->execute();
            //$query->close();
            return $resultado;
        } catch (PDOException $e) {
            return -1;
        } finally {
            $pdo = null;
        }
    } //end actualizar

    public function ver($Cod_Art)
    {
        $articulo = null;
        try {
            $urlDefecto = "data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17a3f093956%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17a3f093956%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22106.6640625%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E";
            $query = $this->db->connect()->query('SELECT Cod_Art, Nom_art, Descripcion, Precio, Stock, Estado, Categoria, Imagen FROM articulos');
            while ($row = $query->fetch()) {
                $articulos = new Articulo();
                $articulos->Cod_Art = $row['Cod_Art'];
                $articulos->Nom_art = $row['Nom_art'];
                $articulos->Descripcion = $row['Descripcion'];
                $articulos->Precio = $row['Precio'];
                $articulos->Stock = $row['Stock'];
                $articulos->Estado = $row['Estado'];
                $articulos->Cod_Cat = $row['Cod_Cat'];
                $articulos->Imagen = !isset($row['Imagen']) ? (constant('URL') . $row['Imagen']) : $urlDefecto;
                //$articulos->url = constant('URL') . $row['url_foto'] ?? $urlDefecto;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $articulos;
    } //end ver

} //end Model
