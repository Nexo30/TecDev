<?php
require_once 'jwt/vendor/autoload.php';
require_once 'auth/Auth.php';
class Inicio_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->resultadoLogin = "";
        $this->view->mensajeC = "";
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
        $_SESSION["tipo"] = "cliente";
        $exitoLogin = $this->model->ingresar($nombre, $pass);
        $admin = $this->model->admin($nombre, $pass);
        if ($admin) {
            $_SESSION["tipo"] = "admin";
            $exitoLogin = true;
            $nombre = "Admin";
        }
        if ($exitoLogin) {
            $_SESSION["estalogueado"] = true;
            $_SESSION["nombre"] = $nombre;

            $rol = $_SESSION["tipo"];
            $token = Auth::SignIn([
                'email' => $nombre,
                'rol' => $rol,
            ]);
            $this->view->render('inicio/ingresar');
        } else {
            $this->view->resultadoLogin = "Usuario o contraseña incorrectos";
            unset($_SESSION["tipo"]);
            $this->view->render('inicio/index');
        }

    }

    public function salir()
    {
        $_SESSION["estalogueado"] = false;
        unset($_SESSION["nombre"]);
        unset($_SESSION["tipo"]);
        $this->view->render('inicio/index');
    }
    public function registrar()
    {
        $nombre = $_POST['usuario'];
        $pass = $_POST['contrasena'];
        $calle = $_POST['calle'];
        $ciudad = $_POST['ciudad'];
        $apellido = $_POST['apellido'];
        $numero = $_POST['telefono'];
        if ($this->model->registrar(['usuario' => $nombre, 'apellido' => $apellido, 'contrasena' => $pass, 'calle' => $calle, 'ciudad' => $ciudad, 'telefono' => $numero])) {
            $this->view->mensaje = "Se ha registrado correctamente";
            $this->view->render('inicio/registrar');
        } else {
            $this->view->mensaje = "Error, intentelo de nuevo";
            $this->view->render('inicio/index');
        }
    }
    public function indexI()
    {
        //$alumnos = $this->model->get();
        $this->view->render('inicio/indexI');
    }
}
