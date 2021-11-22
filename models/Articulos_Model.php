<?php

require_once 'entidades/articulo.php';

class Articulos_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {

        $items = []; // en el arreglo items se cargan los objetos Articulo

        try {
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
                $item->url = $row['Imagen'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            var_dump($e);
        }

    }
    public function verArticulo($id)
    {
        $articulo = null;
        try {
            $query = $this->db->connect()->prepare('SELECT Cod_Art, Cod_Cat,Nom_Art,Marca,Modelo,Descripcion,Precio,Stock FROM articulo WHERE Cod_Art=:id');
            $query->bindValue(':id', $id);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            while ($row = $query->fetch()) {
                $articulo = new Articulo();
                $articulo->Cod_Art = $row['Cod_Art'];
                $articulo->Cod_Cat = $row['Cod_Cat'];
                $articulo->Nom_Art = $row['Nom_Art'];
                $articulo->Marca = $row['Marca'];
                $articulo->Modelo = $row['Modelo'];
                $articulo->Descripcion = $row['Descripcion'];
                $articulo->Precio = $row['Precio'];
                $articulo->Stock = $row['Stock'];
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $articulo;
    } //end ver

    public function actualizar($articulo)
    {
        $resultado = false;
        $pdo = $query = $this->db->connect();
        try {
            $query = $pdo->prepare('UPDATE articulo SET Cod_Art= :Cod_Art, Cod_Cat=:Cod_Cat,Nom_art=:Nom_art,Marca=:Marca,Modelo=:Modelo, Descripcion=:Descripcion, Precio=:Precio,Stock=:Stock WHERE Cod_Art=:Cod_Art02');
            $query->bindParam(':Cod_Art', $articulo->Cod_Art);
            $query->bindParam(':Cod_Cat', $articulo->Cod_Cat);
            $query->bindParam(':Nom_art', $articulo->Nom_art);
            $query->bindParam(':Marca', $articulo->Marca);
            $query->bindParam(':Modelo', $articulo->Modelo);
            $query->bindParam(':Descripcion', $articulo->Descripcion);
            $query->bindParam(':Precio', $articulo->Precio);
            $query->bindParam(':Stock', $articulo->Stock);
            $query->bindParam(':Cod_Art02', $articulo->Cod_Art);
            $resultado = $query->execute();
            $filasAf = $query->rowCount();
            return $resultado;
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }
    }
}
