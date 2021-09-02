<?php

class Regusuario_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ingresar_reg($datos)
    {

        var_dump($datos);
        $ci_adm = $datos['ci_adm'];
        $contrasena_adm = $datos['contraseña_adm'];
        //echo "INSERT INTO usuario_admin (CI_Adm,Contraseña_Adm) values ('$ci_adm','$contrasena_adm')";
        $query = $this->db->connect()->prepare("INSERT INTO usuario_admin (CI_Adm,Contraseña_Adm) values ('$ci_adm','$contrasena_adm' )");

        // $query->bindValue(':ci_adm', $datos['ci_adm']);
        //$query->bindValue(':contraseña_adm', $datos['contraseña_adm']);
        var_dump($query);
        if ($query->execute()) {
            return true;
        } else {
            return false;
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
