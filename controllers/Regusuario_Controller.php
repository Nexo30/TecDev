<?php

class Regusuario_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";

    }

    public function render()
    {
        $this->view->render('Regusuario/index');

    }

    public function ingresar_reg()
    {
        //var_dump($this); //desplegar los detalles de una variable
        //echo 'ejecutando crear';
        $ci_adm = $_POST['ci_adm'];
        $contraseña_adm = $_POST['contraseña_adm'];

        if ($this->model->ingresar_reg(['ci_adm' => $ci_adm, 'contraseña_adm' => $contraseña_adm])) {
            $this->view->mensaje = "Usuario creado correctamente";
            $this->view->render('Regusuario/ingresar_reg');
        } else {
            $this->view->mensaje = "Error al crear el usuario";
            $this->view->render('Regusuario/ingresar_reg');
        }
    }

}
