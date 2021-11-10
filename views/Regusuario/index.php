<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Registro Admin</title>
</head>
<body>

    <?php require 'views/header2.php';?>

    <div id="main">

        <h1 class="center">Registro usuario Admin</h1>


        <form action="<?php echo constant('URL'); ?>Regusuario/ingresar_reg" method="POST">
            <label for="">Cedula</label><br>
            <input type="text" name="ci_adm" id=""><br>
            <label for="">Contraseña</label><br>
            <input type="text" name="contraseña_adm" id=""><br>

            <input type="submit" value="Crear">
        </form>
    </div>

    <?php require 'views/footer.php';?>

</body>
</html>