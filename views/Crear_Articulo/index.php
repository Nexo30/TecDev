<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/main.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/articulos.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Registro Articulo</title>
</head>
<body class="grid-container">

    <?php require 'views/headerT.php';?>

    <div id="main">

        <h1 class="center">Crear Articulo</h1>


        <form action="<?php echo constant('URL'); ?>Crear_Articulo/ingresar_articulo" method="POST" enctype="multipart/form-data">

            <label for="">Codigo de Articulo</label><br>
            <input type="text" name="Cod_Art" id=""><br>
            <label for="">Codigo de Categoria</label><br>
            <input type="text" name="Cod_Cat" id=""><br>
            <label for="">Nombre</label><br>
            <input type="text" name="Nombre" id=""><br>
            <label for="">Marca</label><br>
            <input type="text" name="Marca" id=""><br>
            <label for="">Modelo</label><br>
            <input type="text" name="Modelo" id=""><br>
            <label for="">Descripcion</label><br>
            <input type="text" name="Descripcion" id=""><br>
            <label for="">Precio</label><br>
            <input type="text" name="Precio" id=""><br>
            <label for="">Stock</label><br>
            <input type="text" name="Stock" id=""><br>

            Añadir imagen: <input name="Imagen" id="" type="file"/>

            <input type="submit" name="crear" value="Crear">
        </form>



    </div>

    <?php require 'views/footerT.php';?>

</body>
</html>