<?php

class Crear_Articulo_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar_articulo($datos)
    {

        //   var_dump($datos);
        $cod_art = $datos['cod_art'];
        $cod_cat = $datos['cod_cat'];
        $nombre = $datos['nombre'];
        $marca = $datos['marca'];
        $modelo = $datos['modelo'];
        $descripcion = $datos['descripcion'];
        $precio = $datos['precio'];
        $stock = $datos['stock'];

        $query = $this->db->connect()->prepare("INSERT INTO articulo (Cod_Art,Cod_Cat,Nom_art,Marca,Modelo,Descripcion,Precio,Stock) values ('$cod_art','$cod_cat','$nombre','$marca','$modelo','$descripcion','$precio','$stock')");

        try {
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
            var_dump($e);
        }
    }

}
