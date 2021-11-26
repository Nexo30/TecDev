<?php
require_once 'entidades/carrito.php';
require_once 'jwt/vendor/autoload.php';
require_once 'auth/Auth.php';
class Apicarrito_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function completarCarrito($lista, $personas)
    {
        $salida = new StdClass;
        $pdo = $this->db->connect();
        $pdo->beginTransaction();
        try {

            $query = $pdo->prepare('insert into pedido (ID, Fecha) VALUES (:ID, :Fecha)');
            $query->bindParam(':ID', $personas);
            $query->bindParam(':Fecha', $Fecha);
            $lastInsertID = 0;
            if ($query->execute()) {
                $lastInsertID = $pdo->lastInsertId();
            } else {
                //por si hay errores
                $lastInsertID = -1;
            }
            // inserto en la base de datos
            $query = $pdo->prepare('insert into item (Cod_Art, Nom_art,Descripcion,Precio, Stock, Estado, Cod_Cat, Imagen, IDPedidos) VALUES (:Cod_Art, :Nom_Art, :Descripcion, :Precio, :Stock, :Estado, :Cod_Cat, :Imagen, :IdPedidos)');
            // le paso los parámetros a lista
            foreach ($lista as $key => $articulos) {
                $query->bindParam(':Cod_Art', $articulos->Cod_Art);
                $query->bindParam(':Nom_art', $articulos->Nom_art);
                $query->bindParam(':Descripcion', $articulos->Descripcion);
                $query->bindParam(':Precio', $articulos->Precio);
                $query->bindParam(':Stock', $articulos->Stock);
                $query->bindParam(':Estado', $articulos->Estado);
                $query->bindParam(':Cod_Cat', $articulos->Cod_Cat);
                $query->bindParam(':Imagen', $articulos->Imagen);
                $query->bindParam(':IdPedidos', $lastInsertIdPedidos);
                $query->execute();
            }
            $pdo->commit();

            $salida->IdPedidos = $lastInsertId;
            $salida->res = true;
            return $salida;
            // Si hay una exception, vuelve a insertar
        } catch (PDOException $e) {
            $pdo->rollBack();
            $salida->IdPedidos = -1;
            $salida->res = false;
            return $salida;
            // finally para liberar espacio
        } finally {
            $pdo = null;
        }
    }

}
