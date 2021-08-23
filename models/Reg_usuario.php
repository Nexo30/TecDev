<?php

class Reg_usuario extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {

        try {
            $query = $this->db->connect()->prepare('INSERT INTO usuario_admin (CI_Adm,Contraseña_Adm) values (:ci_adm and :contraseña_adm');

            $query->execute([
                'ci_adm' => $datos['ci_adm'],
                'contraseña_adm' => $datos['contraseña_adm'],
            ]);
            return true;

        } catch (PDOException $e) {
            return false;
            var_dump($e);
        }

    }

}
