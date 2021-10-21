<?php

require 'entidades/alumno.php';

class LoginAdm_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar($ci_adm, $passadm)
    {

        $tieneAcceso = false;

        try {
            $query = $this->db->connect()->prepare('SELECT Password_adm FROM usuario WHERE CI_adm =:CI_adm');
            $query->bindValue(':CI_adm', $ci_adm);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            $paswordStr = "";
            while ($row = $query->fetch()) {
                $paswordStr = $row['Password_adm'];
            }
            if ($paswordStr == $passadm) {
                $tieneAcceso = true;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $tieneAcceso;

    }

}
