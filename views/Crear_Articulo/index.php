<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Registro Articulo</title>
</head>
<body>

    <?php require 'views/header2.php';?>

    <div id="main">

        <h1 class="center">Crear Articulo</h1>


        <form action="<?php echo constant('URL'); ?>Crear_Articulo/ingresar_articulo" method="POST" enctype="multipart/form-data">

            <label for="">Codigo de articulo</label><br>
            <input type="text" name="cod_art" id=""><br>
            <label for="">Codigo de Cateogria</label><br>
            <input type="text" name="cod_cat" id=""><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nombre" id=""><br>
            <label for="">Marca</label><br>
            <input type="text" name="marca" id=""><br>
            <label for="">Modelo</label><br>
            <input type="text" name="modelo" id=""><br>
            <label for="">Descripcion</label><br>
            <input type="text" name="descripcion" id=""><br>
            <label for="">Precio</label><br>
            <input type="text" name="precio" id=""><br>
            <label for="">Stock</label><br>
            <input type="text" name="stock" id=""><br>

            Añadir imagen: <input name="archivo" id="" type="file"/>

            <input type="submit" name="crear" value="Crear">
        </form>



    </div>

    <?php require 'views/footer.php';?>

</body>
</html>