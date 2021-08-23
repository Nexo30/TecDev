<?php

class Reg_usuarioC extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";

    }

    public function render()
    {
        $this->view->render('reg_usu/index');
    }

    public function crear_usuario()
    {
        //var_dump($this); //desplegar los detalles de una variable
        //echo 'ejecutando crear';
        $ci_adm = $_POST['ci_adm'];
        $contraseña_adm = $_POST['contraseña_adm'];

        if ($this->model->insert(['ci_adm' => $ci_adm, 'contraseña_adm' => $contraseña_adm])) {
            $this->view->mensaje = "Usuario creado correctamente";
            $this->view->render('reg_usu/index');
        } else {
            $this->view->mensaje = "Error al crear el usuario";
            $this->view->render('reg_usu/index');
        }
    }

}
