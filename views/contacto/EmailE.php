
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
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
} catch (\Throwable $th) {

    $this->mensajeC = "Error en envio de mensaje asegure el llenar todos los campos";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contactos</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/contacto.css">
	<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Untitled-1.css">
	<link rel="stylesheet" href="contacto.css">
	<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body class="grid-container">
<?php require 'views/headerT.php';?>
  <aside class="sidebar" >
	<form action="EmailE" method="post">
			<div class="contacto__grupo" id="grupo__nombre">
			<label for="Nombre" class="contacto__label">Nombre: </label>
					<input type="text" class="contacto__input2" name="Nombre" id="Nombre" placeholder="Nombre..."></input>

				  <label for="Email" class="contacto__label">Email: </label>
					<input type="text" class="contacto__input2" name="Email" id="Email" placeholder="Ejemplo@.com"></input>

				  <label for="Mensaje" class="contacto__label">Mensaje: </label>
					<textarea type="text" class="contacto__input" name="Mensaje" id="Mensaje" placeholder="Mensaje..." rows="10" cols="45"></textarea>

				<button type="submit" class="contacto__btn">Enviar</button>
</form>
		</div>


  </aside>
	<iframe class="footer2" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d204.93806143241943!2d-56.21868829133565!3d-34.73016795194744!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x233db8c6106abffa!2sEscuela%20T%C3%A9cnica%20de%20Las%20Piedras!5e0!3m2!1ses-419!2suy!4v1634265898778!5m2!1ses-419!2suy" width=100% height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		<?php require 'views/footerT.php';?>

</body>
</html>

