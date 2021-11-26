<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/articulos.css">
    <title>Lista Clientes</title>
</head>
<body class="grid-container">

    <?php require 'views/headerI.php';?>
    <?php include_once 'entidades/Cliente.php';?>
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">

<div class="container">
    <div class="row">
        <div class="col-sm">
        <h1>Sección de Clientes</h1>
    </div>
    <div class="row">
        <div class="col-sm">
            <table class="Clientes">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom_Cliente</th>
                    <th scope="col">Contraseña</th>
                </tr>
                </thead>
                <tbody>
                <?php

foreach ($this->Cliente as $row) {
    $Cliente = new Cliente();
    $Cliente = $row;?>
                <tr>
                    <td class="dato"><?php echo $Cliente->Id; ?></td>
                    <td class="dato"><?php echo $Cliente->Nom_Cliente; ?></td>
                    <td class="dato"><?php echo $Cliente->Contraseña; ?></td>
                    <td class="Btneliminar"><button class="Btneliminar" data-Id="<?php echo $Cliente->Id; ?>">Eliminar</button></td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


    <?php require 'views/footerT.php';?>


    <!-- importo el javascript-->
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>