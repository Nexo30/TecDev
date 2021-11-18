<header class="header">
<img src="<?php echo constant('URL'); ?>public/imagenes/articulos/Logo2.png" width="280px">
<a class="ingresar" href="<?php echo constant('URL'); ?>/">
Salir <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->
</a>
<a class="Carrito">
<i class="fas fa-shopping-cart"></i>
</a>
<?php $nombre = $_SESSION["nombre"];
?>

<h1 id="Res"><?php echo $nombre; ?></h1>
</header>
  <nav class="navbar">
		<ul>
    <li><a href="<?php echo constant('URL'); ?>Inicio">Inicio</a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda">Tienda</a></li>
			<li><a href="<?php echo constant('URL'); ?>#sidebar">Nosotros</a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto">Contactos</a></li>
			<li id="Adm"><a href="<?php echo constant('URL'); ?>Articulos">Administrar Articulos</a></li>
		</ul>
    <div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" name="" id="" placeholder="Escriba aqui...">
      </div>
</nav>