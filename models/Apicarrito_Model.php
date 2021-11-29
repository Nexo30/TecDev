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

    public function completarCarrito($lista, $usuario)
    {
        $pdo = $this->db->connect();
        $pdo->beginTransaction();
        try {
            $fecha = date('Y-m-d H:i:s', time());
            $query = $pdo->prepare('insert into pedido (Numero,Fecha) VALUES (:Numero,:Fecha)');

            $query->bindParam(':Numero', $usuario);
            $query->bindParam(':Fecha', $fecha);
            $lastInsertId = 0;
            if ($query->execute()) {
                $lastInsertId = $pdo->lastInsertId();
            } else {
                //por si hay errores
                $lastInsertId = -1;
            }
            $query = $pdo->prepare('insert into compra (Id_C,Cod_art,Cantidad,Fecha) VALUES (:Id_C,:Cod_Art,:Cantidad,:Fecha)');
            foreach ($lista as $key => $articulos) {
                $query->bindParam(':Id_C', $lastInsertId);
                $query->bindParam(':Cod_Art', $articulos->Cod_Art);
                $query->bindParam(':Cantidad', $articulos->Stock);
                $query->bindParam(':Fecha', $fecha);

                $query->execute();
            }
            $pdo->commit();
            return $lastInsertId;
        } catch (PDOException $e) {
            $pdo->rollBack();
            return false;

        } finally {
            $pdo = null;
        }
    }

}
