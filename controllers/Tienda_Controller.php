<?php
require_once 'jwt/vendor/autoload.php';
require_once 'auth/Auth.php';

class Tienda_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->nombreUsuario = "";
        $this->view->resultadoLogin = "";
        $this->view->mensajeC = "";
    }
    public function render($param = null)
    {
        $articulos = $this->model->get();
        $this->view->articulos = $articulos;
        $respuesta = [
            "datos" => $articulos,
            "totalResultados" => count($articulos),
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('tienda/tienda');

    }
    public function ingresar()
    {
        try {
            if (!isset($_POST['nombre'])) {
                throw new Exception("No tiene autorizacion");
            }
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
                $this->view->resultadoLogin = "Ingreso Exitoso";
                $articulos = $this->model->get();
                $_SESSION["estalogueado"] = true;
                $_SESSION["nombre"] = $nombre;

                $rol = $_SESSION["tipo"];
                $token = Auth::SignIn([
                    'email' => $nombre,
                    'rol' => $rol,
                ]);
                $_SESSION["token"] = $token;
                $this->view->token = $token;
                $respuesta = [
                    "datos" => $articulos,
                    "totalResultados" => count($articulos),
                ];
                $this->view->articulos = $articulos;
                $this->view->render('tienda/ingresar');
            } else {
                $this->view->resultadoLogin = "Usuario o contraseña incorrectos";
                $articulos = $this->model->get();
                $this->view->articulos = $articulos;
                $this->view->render('tienda/tienda');

            }
        } catch (Exception $ex) {
            $articulos = $this->model->get();
            $this->view->articulos = $articulos;
            $this->view->mensaje = $ex->getMessage();
            $this->view->render('tienda/tienda');
        }

    }

    public function salir()
    {
        $_SESSION["estalogueado"] = false;
        unset($_SESSION["nombre"]);
        unset($_SESSION["tipo"]);
        $_SESSION["token"] = null;
        $this->view->render('tienda/tienda');
    }
    public function registrar()
    {
        try {
            if (strlen($_POST['usuario']) == 0) {
                throw new Exception("Ingrese su correo electrónico");
            }
            if (strlen($_POST['contrasena']) == 0) {
                throw new Exception("Ingrese su contraseña");
            }
            if (strlen($_POST['calle']) == 0) {
                throw new Exception("Ingrese su calle");
            }
            if (strlen($_POST['ciudad']) == 0) {
                throw new Exception("Ingrese su ciudad");
            }
            if (strlen($_POST['apellido']) == 0) {
                throw new Exception("Ingrese su apellido");
            }
            if (strlen($_POST['telefono']) == 0) {
                throw new Exception("Ingrese su telefono");
            }
            if (strlen($_POST['telefono']) !== 9) {
                throw new Exception("Debe ingresar un numero de 9 digitos para telefono");
            }
            $nombre = $_POST['usuario'];
            $pass = $_POST['contrasena'];
            $calle = $_POST['calle'];
            $ciudad = $_POST['ciudad'];
            $apellido = $_POST['apellido'];
            $numero = $_POST['telefono'];
            if ($this->model->registrar(['usuario' => $nombre, 'apellido' => $apellido, 'contrasena' => $pass, 'calle' => $calle, 'ciudad' => $ciudad, 'telefono' => $numero])) {
                $this->view->mensaje = "Se ha registrado correctamente";
                $articulos = $this->model->get();
                $respuesta = [
                    "datos" => $articulos,
                    "totalResultados" => count($articulos),
                ];
                $this->view->articulos = $articulos;
                $this->view->render('tienda/registrar');
            } else {
                $this->view->mensaje = "Error, intentelo de nuevo";
                $articulos = $this->model->get();
                $this->view->articulos = $articulos;
                $this->view->render('tienda/tienda');
            }
        } catch (Exception $ex) {
            $this->view->mensaje = $ex->getMessage();
            $articulos = $this->model->get();
            $this->view->articulos = $articulos;
            $this->view->render('tienda/tienda');

        }
    }

    public function tiendaI($param = null)
    {
        $articulos = $this->model->get();
        $respuesta = [
            "datos" => $articulos,
            "totalResultados" => count($articulos),
        ];
        $this->view->articulos = $articulos;
        $this->view->render('tienda/tiendaI');

    }
    public function buscar()
    {
        try {
            $texto = $_POST['textoBuscador'];
            $this->view->articulos = $resultado = $this->model->buscar($texto);
            $this->view->respuesta = $resultado;
            $this->view->render('tienda/buscar');
        } catch (Exception $th) {
            $resultado = false;
        }
    }
    public function buscarI()
    {
        try {
            $texto = $_POST['textoBuscador'];
            $this->view->articulos = $resultado = $this->model->buscar($texto);
            $this->view->respuesta = $resultado;
            $this->view->render('tienda/buscarI');
        } catch (Exception $th) {
            $resultado = false;
        }
    }

}
