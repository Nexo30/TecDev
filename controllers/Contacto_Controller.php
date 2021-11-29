<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'jwt/vendor/autoload.php';
require_once 'auth/Auth.php';
class Contacto_Controller extends Controller
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

        $this->view->render('contacto/index');

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
            $this->view->render('contacto/ingresar');
        } else {
            $this->view->resultadoLogin = "Usuario o contraseña incorrectos";
            $this->view->render('contacto/index');
        }

    }

    public function salir()
    {
        $_SESSION["estalogueado"] = false;
        unset($_SESSION["nombre"]);
        unset($_SESSION["tipo"]);
        $this->view->render('contacto/index');
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
                $this->view->render('contacto/registrar');
            } else {
                $this->view->mensaje = "Error, intentelo de nuevo";
                $this->view->render('contacto/index');
            }
        } catch (Exception $ex) {
            $this->view->mensaje = $ex->getMessage();
            $this->view->render('contacto/index');

        }
    }
    public function EmailE()
    {
        require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';
        $correo = $_POST['Email'];
        $nombre = $_POST['Nombre'];
        $rol = $_SESSION['tipo'];
        $mensaje = $_POST['Mensaje'];
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 25;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );
        try {
            $mail->isHTML(true);

            $mail->Username = ('HTMConsultas@gmail.com');
            $mail->Password = ('Vaniersa2021');

            $mail->setFrom($correo, $nombre);
            $mail->Subject = "Correo de Pagina HTMotors";
            $mail->MsgHTML($mensaje);
            $mail->addAddress('HTMConsultas@gmail.com', 'Consultas');
            $mail->send();
            $this->mensajeC = "Mensaje Enviado Correctamente";

            $this->view->render('contacto/index');
        } catch (\Throwable $th) {

            $this->mensajeC = "Error en envio de Mensaje";
            $this->view->render('contacto/index');
        }
    }
    public function IndexI()
    {

        $this->view->render('contacto/indexI');

    }
    public function EmailEI()
    {
        require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';
        $correo = $_POST['Email'];
        $nombre = $_POST['Nombre'];
        $rol = $_SESSION['tipo'];
        $mensaje = $_POST['Mensaje'];
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 25;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );
        try {
            $mail->isHTML(true);

            $mail->Username = ('HTMConsultas@gmail.com');
            $mail->Password = ('Vaniersa2021');

            $mail->setFrom($correo, $nombre);
            $mail->Subject = "Correo de Pagina HTMotors";
            $mail->MsgHTML($mensaje);
            $mail->addAddress('HTMConsultas@gmail.com', 'Consultas');
            $mail->send();
            $this->mensajeC = "Mensaje Enviado Correctamente";

            $this->view->render('contacto/indexI');
        } catch (\Throwable $th) {

            $this->mensajeC = "Error en envio de Mensaje";
            $this->view->render('contacto/indexI');
        }
    }

}
