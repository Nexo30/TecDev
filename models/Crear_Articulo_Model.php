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
        $url_img = $datos['url_img'];

        $query = $this->db->connect()->prepare("INSERT INTO articulo (Cod_Art,Cod_Cat,Nom_art,Marca,Modelo,Descripcion,Precio,Stock,url_img) values ('$cod_art','$cod_cat','$nombre','$marca','$modelo','$descripcion','$precio','$stock','$url_img')");

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
/*
try {
$query = $this->db->connect()->prepare('INSERT INTO usuario_admin (CI_Adm,Contraseña_Adm) values (:ci_adm, :contraseña_adm)');

$query->bindValue(':ci_adm', $datos['ci_adm']);
$query->bindValue(':contraseña_adm', $datos['contraseña_adm']);
var_dump($query);
$query->execute();
return true;

} catch (PDOException $e) {
return false;
var_dump($e);
}
 */
    }

}
