<?php
class Tienda_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->resultadoLogin = "";

    }
    public function render()
    {
        $articulos = $this->model->get();
        $this->view->articulos = $articulos;
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
        $this->view->render('tienda/tienda');
    }
    public function registrar()
    {
        //var_dump($this); //desplegar los detalles de una variable

        //echo 'ejecutando crear';
        $nombre = $_POST['usuario'];
        $pass = $_POST['contrasena'];
        $calle = $_POST['calle'];
        $ciudad = $_POST['ciudad'];
        $apellido = $_POST['apellido'];
        $numero = $_POST['telefono'];
        if ($this->model->registrar(['usuario' => $nombre, 'apellido' => $apellido, 'contrasena' => $pass, 'calle' => $calle, 'ciudad' => $ciudad, 'telefono' => $numero])) {
            $this->view->mensaje = "Se ha registrado correctamente";
            $this->view->render('tienda/registrar');
        } else {
            $this->view->mensaje = "Error, intentelo de nuevo";
            $this->view->render('tienda/tienda');
        }
    }
}
