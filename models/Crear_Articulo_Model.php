<?php

class Crear_Articulo_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar_articulo($datos)
    {

        $Cod_Cat = $datos['Cod_Cat'];
        $Nombre = $datos['Nombre'];
        $Marca = $datos['Marca'];
        $Modelo = $datos['Modelo'];
        $Descripcion = $datos['Descripcion'];
        $Precio = $datos['Precio'];
        $Stock = $datos['Stock'];
        $Imagen = $datos['Imagen'];
        $Imagen = "public/imagenes/articulos/" . $Imagen;

        $query = $this->db->connect()->prepare("INSERT INTO articulo (Cod_Cat,Nom_art,Marca,Modelo,Descripcion,Precio,Stock,Imagen,Estado) values ('$Cod_Cat','$Nombre','$Marca','$Modelo','$Descripcion','$Precio','$Stock','$Imagen','activo')");

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
