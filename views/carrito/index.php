
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomePage</title>
  <link rel="stylesheet" href="public/css/index.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="public/css/Carpeta/css/all.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body class="grid-container">
<header class="header">
<img src=public/imagenes/articulos/Logo2.png width="280px">
<a href="<?php echo constant('URL'); ?>dlogin" class="ingresar">
<i class="fas fa-sign-in-alt"></i>
</a>

</header>


  <nav class="navbar">
		<ul>
      <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda">Tienda</a></li>
			<li><a href="#sidebar">Nosotros</a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto">Contactos</a></li>
		</ul>
    <div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" name="" id="" placeholder="Escriba aqui...">
      </div>
</nav>
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h1>Lista del carrito</h1>
        </div><!-- end col-->
      </div><!-- end row-->
      <div class="row" id="itemsCarrito">
        <div id="carritoid"></div>


      </div><!-- end row -->
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 p-4">
        <button class="btn btn-success" id="btnCompletarCarrito">completar carrito</button>
      </div>

      <div class="row" id="resPedido" style="display:none">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h1>Resultado del pedido</h1>
            <div class="alert alert-success" role="alert">
              pedido completado con exito <span id="numPedido"></span>
            </div>
        </div><!-- end col-->
      </div><!-- end row-->


  <footer class="footer">Pie de pagina</footer>
</body>
</html>