<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/articulos.css">
    <title>Administrar Articulos</title>
</head>
<body class="grid-container">

    <?php require 'views/headerI.php';?>
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
<!--hidden -->
    <div class="main">
        <div class="table">
            <table class="tabla">
                <thead class="cabeza">
                <tr >

                    <th scope="col">Nombre</th>

                    <th scope="col">Precio</th>

                    <th scope="col">Descripcion</th>

                    <th scope="col">Marca</th>

                    <th scope="col">Modelo</th>

                    <th class="Stock" scope="col">Stock</th>

                </tr>
                </thead>
                <tbody class="cuerpo">
                <?php
foreach ($this->articulos as $row) { // se recorre el array articulos con foreach
    $articulo = $row;?>
                <tr class="tablas"id="filaart-<?php echo $articulo->Cod_Art; ?>">

                    <td class="tablaA"><?php echo $articulo->Nom_art; ?></td>
                    <td class="tablaB"><?php echo $articulo->Precio; ?></td>
                    <td class="tablaA"><?php echo $articulo->Descripcion; ?></td>
                    <td class="tablaB"><?php echo $articulo->Marca; ?></td>
                    <td class="tablaA"><?php echo $articulo->Modelo; ?></td>
                    <td class="tablaB"class="tablas"><?php echo $articulo->Stock; ?></td>
                    <td><a class="actualizar" href="<?php echo constant('URL') . 'articulos/verArticulo/' . $articulo->Cod_Art; ?>">Actualizar</a></td>
                    <td><button class="eliminar" data-alumno="<?php echo $articulo->Cod_Art; ?>"
                    id="art<?php echo $articulo->Cod_Art; ?>">Eliminar</button></td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <div>
        <li class="crea"><a class="crear" href="<?php echo constant('URL'); ?>Crear_Articulo/">Crear Articulo</a></li>
      </div>
</div>

    <?php require 'views/footerT.php';?>



    <!-- importo la libreria jquery-->
    <script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
    <!-- importo el javascript-->
    <script src="<?php echo constant('URL'); ?>/public/js/articulos/index02.js"></script>
    <!--<script src="<?php echo constant('URL'); ?>/public/js/main.js"></script> -->
</body>
</html>