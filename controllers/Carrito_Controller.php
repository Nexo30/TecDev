<?php
require_once 'jwt/vendor/autoload.php';
require_once 'auth/Auth.php';
class Carrito_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->mensajeC = "";
        $this->view->resultadoLogin = "";

    }
    public function render()
    {

        $this->view->render('carrito/index');

    }
    public function carritoI()
    {

        $this->view->render('carrito/carritoI');

    }
    public function ingresar()
    {
        if (strlen($_POST['nombre']) == 0) {
            throw new Exception("Ingrese su correo electrónico");
        }
        if (strlen($_POST['pass']) == 0) {
            throw new Exception("Ingrese su contraseña");
        }
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];
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
            $this->view->render('carrito/carritoI');
        } else {
            $this->view->resultadoLogin = "Usuario o contraseña incorrectos";
            $this->view->render('carrito/index');

        }

    }

    public function salir()
    {
        $_SESSION["estalogueado"] = false;
        unset($_SESSION["nombre"]);
        unset($_SESSION["tipo"]);
        $this->view->render('carrito');
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

            $this->view->render('carrito/registrar');
        } else {
            $this->view->mensaje = "Error, intentelo de nuevo";
            $this->view->render('carrito/index');
        }
    }
}
