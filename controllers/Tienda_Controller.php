<?php
class Tienda_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->resultadoLogin = "";

    }
    public function render()
    {

        $this->view->render('tienda/tienda');

    }
    public function ingresar()
    {
        //$alumnos = $this->model->get();
        //$this->view->alumnos = "exitoso";
        //$this->view->post = var_dump($_POST);
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];
        $exitoLogin = $this->model->ingresar($nombre, $pass);
        if ($exitoLogin) {
            $_SESSION["estalogueado"] = true;
            $_SESSION["nombre"] = $nombre;
            $_SESSION["tipo"] = "cliente";
            $this->view->resultadoLogin = "Ingreso Exitoso";

            $this->view->render('tienda/ingresar');
        } else {
            $this->view->resultadoLogin = "Usuario o contraseña incorrectos";
            $this->view->render('tienda/tienda');
        }

    }

    public function salir()
    {
        $_SESSION["estalogueado"] = false;
        unset($_SESSION["nombre"]);
        unset($_SESSION["tipo"]);
        $this->view->render('index/index');
    }
}
