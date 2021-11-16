<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Carpeta/css/all.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/verArticulo.css">

    <title>Document</title>
</head>
<body class="grid-container">
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
    <?php require 'views/headerT.php';?>

    <div class="container">
    <div class="row">
        <div class="col-sm">
          <h1>Editar Articulo</h1>
        </div>
    </div>
      <form id="form01" class="row" action="<?php echo constant('URL'); ?>articulos/actualizar" method="post">
      <div class="datos">
          <label for="articuloId" class="form-label">Id</label>
          <input type="text"
          class="formulario"
          id="articuloId"
          aria-describedby="emailHelp"
          name="Cod_Art"
          value="<?=$this->articulo->Cod_Art;?>">
      </div>
      <div class="datos">
          <label for="articuloCat" class="form-label">Codigo</label>
          <input type="text"
          class="formulario"
          id="articuloCodigo"
          name="Cod_Cat"
          value="<?=$this->articulo->Cod_Cat;?>">
      </div>
      <div class="datos">
          <label for="articuloNom" class="form-label">Nombre</label>
          <input type="text"
          class="formulario"
          id="articuloId"
          aria-describedby="emailHelp"
          name="Nom_Art"
          value="<?=$this->articulo->Nom_Art;?>">
      </div>
      <div class="datos">
          <label for="articuloPrecio" class="form-label">Precio</label>
          <input type="text"
          class="formulario"
          id="articuloPrecio"
          aria-describedby="emailHelp"
          name="Precio"
          value="<?=$this->articulo->Precio;?>">
      </div>
      <div class="datos">
          <label for="articuloDescripcion" class="form-label">Descripcion</label>
          <input type="text"
          class="formulario"
          id="articuloDescripcion"
          aria-describedby="emailHelp"
          name="Descripcion"
          value="<?=$this->articulo->Descripcion;?>">
      </div>
      <div class="datos">
          <label for="articuloMarca" class="form-label">Marca</label>
          <input type="text"
          class="formulario"
          id="articuloId"
          aria-describedby="emailHelp"
          name="Marca"
          value="<?=$this->articulo->Marca;?>">
      </div>
      <div class="datos">
          <label for="articuloModelo" class="form-label">Modelo</label>
          <input type="text"
          class="formulario"
          id="articuloId"
          aria-describedby="emailHelp"
          name="Modelo"
          value="<?=$this->articulo->Modelo;?>">
      </div>
      <div class="datos">
          <label for="articuloStock" class="form-label">Stock</label>
          <input type="text"
          class="formulario"
          id="articuloFecha"
          aria-describedby="emailHelp"
          name="Stock"
          value="<?=$this->articulo->Stock;?>">
      </div>

      <div >
        <button id="btnEnviarForm" type="submit" class="Submit">Actualizar</button>
      </div>
      <div>
        <button type="submit" class="Ajax" id="enviarForm">Ajax</span>
      </div>
      <input type="hidden" value="<?php echo $this->articulo->Cod_Art; ?>" id="articuloId" name="articuloId">
      </form>
    </div>




    <?php require 'views/footerT.php';?>

    <script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
    <!-- importo el javascript-->
    <script src="<?php echo constant('URL'); ?>/public/js/articulos/verArticulo.js"></script>
    <!--<script src="<?php echo constant('URL'); ?>/public/js/main.js"></script> -->

</body>
</html>