<?php

class LoginAdm_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->resultadoLogin = "";
    }

    //base+login
    public function render()
    {
        $this->view->render('loginadm/index');
    }

    public function ingresar()
    {
        //$alumnos = $this->model->get();
        //$this->view->alumnos = "exitoso";
        //$this->view->post = var_dump($_POST);
        $ci_adm = $_POST['CI_adm'];
        $passadm = $_POST['Password_adm'];
        $exitoLogin = $this->model->ingresar($ci_adm, $passadm);
        if ($exitoLogin) {
            $_SESSION["estalogueado"] = true;
            $_SESSION["nombre"] = $ci_adm;
            $this->view->render('loginadm/ingresar');
        } else {
            $this->view->resultadoLogin = "usuario o contraseña incorrectos";
            $this->view->render('loginadm/index');
        }

    }
    public function salir()
    {
        $_SESSION["estalogueado"] = false;
        unset($_SESSION["nombre"]);
        $this->view->render('index/index');
    }
}
