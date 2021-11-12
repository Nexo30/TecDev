<?php

class Index_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->resultadoLogin = "";
        //$this->view->mensaje = "Hay un error al cargar el recurso";

        //echo "<p>Controlador Index</p>";
    }

    public function render()
    {
        //$alumnos = $this->model->get();
        $this->view->render('inicio/index');
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
            $this->view->render('inicio/ingresar');
        } else {
            $this->view->resultadoLogin = "usuario o contraseña incorrectos";
            $this->view->render('inicio/index');
        }

    }
    public function salir()
    {
        $_SESSION["estalogueado"] = false;
        unset($_SESSION["nombre"]);
        $this->view->render('inicio/index');
    }
    public function registrar()
    {
        //var_dump($this); //desplegar los detalles de una variable

        //echo 'ejecutando crear';
        $nombre = $_POST['usuario'];
        $pass = $_POST['contrasena'];
        $calle = $_POST['calle'];
        $ciudad = $_POST['ciudad'];
        $numero = $_POST['telefono'];
        if ($this->model->ingresar_cliente(['usuario' => $nombre, 'contrasena' => $pass, 'calle' => $calle, 'ciudad' => $ciudad, 'telefono' => $numero])) {
            $this->view->mensaje = "Se ha registrado correctamente";
            $this->view->render('inicio/registrar');
        } else {
            $this->view->mensaje = "Error, intentelo de nuevo";
            $this->view->render('');
        }
    }
}
