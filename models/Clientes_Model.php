<?php
require 'entidades/Cliente.php';
class Clientes_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        //define un arreglo en php
        //$items = array();
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM cliente');

            while ($row = $query->fetch()) {
                $item = new Cliente();
                $item->Id = $row['Id_P'];
                $item->Nom_Cliente = $row['Nom_usuario'];
                $item->Contraseña = $row['Password_cli'];

                //array_push($items, $item);
                $items[] = $item;

            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function delete($Id)
    {
        $query = $this->db->connect()->prepare('DELETE FROM cliente WHERE Id = :Id');
        try {
            $query->execute([
                'Id' => $Id,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
