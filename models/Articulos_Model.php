<?php

require_once 'entidades/alumno.php';
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
            $urlDefecto = constant('URL') . '/public/imagenes/articulos/imagenDefecto.svg';
            $query = $this->db->connect()->query('SELECT Cod_Art,Cod_Cat,Nom_art,Marca,Modelo,Descripcion,Precio,Stock,url_img FROM articulo');
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
                if (isset($row['url_img'])) {
                    $item->url_img = $row['url_img'];
                } else {
                    $item->url_img = $urlDefecto;
                }
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function verArticulo($id)
    {
        $articulo = null;
        try {
            $query = $this->db->connect()->prepare('SELECT id_productos, codigo,descripcion,precio,fecha FROM productos WHERE id_productos=:id');
            $query->bindValue(':id', $id);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            while ($row = $query->fetch()) {
                $articulo = new Articulo();
                $articulo->id = $row['id_productos'];
                $articulo->codigo = $row['codigo'];
                $articulo->descripcion = $row['descripcion'];
                $articulo->precio = $row['precio'];
                $articulo->fecha = $row['fecha'];
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
            $query = $pdo->prepare('UPDATE productos SET codigo=:codigo, descripcion=:descripcion, precio= :precio, fecha= :fecha WHERE id_productos= :id');
            $query->bindParam(':codigo', $articulo->codigo);
            $query->bindParam(':descripcion', $articulo->descripcion);
            $query->bindParam(':precio', $articulo->precio);
            $query->bindParam(':fecha', $articulo->fecha);
            $query->bindParam(':id', $articulo->id);
            //:descripcion, :precio, :fecha
            //$resultado = $query->execute();
            $resultado = $query->execute();
            $filasAf = $query->rowCount();
            if ($filasAf == 0) {
                $resultado = false;
            }
            //$str = "valor";
            //$resultado = $query->fetch(); // return (PDOStatement) or false on failure
            //$query->close();
            return $resultado;
        } catch (PDOException $e) {
            return var_dump($e);
        } finally {
            $pdo = null;
        }
    } //end actualizar
}
