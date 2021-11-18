<?php
use PHPMailer\PHPMailer\PHPMailer;

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
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];
        $exitoLogin = $this->model->ingresar($nombre, $pass);
        if ($exitoLogin) {
            $_SESSION["estalogueado"] = true;
            $_SESSION["nombre"] = $nombre;
            $_SESSION["tipo"] = "cliente";

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
            $this->view->render('contacto/registrar');
        } else {
            $this->view->mensaje = "Error, intentelo de nuevo";
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

}
