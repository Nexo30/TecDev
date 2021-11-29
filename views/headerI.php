<?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
<header class="header">
<img src="<?php echo constant('URL'); ?>public/imagenes/articulos/Logo2.png" width="280px">
<a class="ingresar" href="<?php echo constant('URL'); ?>">
Salir <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->
</a>
<a class="Carrito" href="<?php echo constant('URL'); ?>carrito/carritoI">
<i class="fas fa-shopping-cart"></i>
</a>
<span class="CarritoCont" id="cantidadElemCarrito">0</span>
<?php $nombre = $_SESSION["nombre"];
?>

<h1 id="Res"><?php echo $nombre; ?></h1>
</header>
  <nav class="navbar">
		<ul>
    <li><a href="<?php echo constant('URL'); ?>Inicio/indexI"><?php echo Translate::__('index'); ?></a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda/tiendaI"><?php echo Translate::__('Shop'); ?></a></li>
			<li><a href="<?php echo constant('URL'); ?>inicio/indexI/#sidebarI"><?php echo Translate::__('Us'); ?></a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto/indexI"><?php echo Translate::__('Contacts'); ?></a></li>
		</ul>
    <?php if (isset($_SESSION["tipo"])) {
    $tipo = $_SESSION["tipo"];
} else {
    $tipo = "cliente";
}
$tipo = isset($_SESSION["tipo"]) ? $_SESSION["tipo"] : false;
if ($tipo == "admin") {
    ?>   	<li id="Adm"><a class="adm" href="<?php echo constant('URL'); ?>Articulos"><?php echo Translate::__('AdmA'); ?></a></li>
    <li id="Adm"><a class="adm" href="<?php echo constant('URL'); ?>Clientes"><?php echo Translate::__('AdmC'); ?></a></li>
<?php } else if ($tipo == "cliente") {

    ?>
<?php }
;?>
    <a class="Idioma" href="<?php echo constant('URL'); ?>idioma/indexI"><?php echo Translate::__('leng'); ?></a>
    <div class="search-wrapper">
		<span class="las la-search"></span>
    <input type="search" id="buscadortexto" placeholder="<?php echo Translate::__('Search'); ?>">
    <div class="btn_buscar" id="clickBuscar">

    </div>
  </div>
<form action="<?php echo constant('URL'); ?>tienda/buscarI" method="post" id="searchForm" style="display: none;">
<input type="hidden" name="textoBuscador" value="" id="textoculto">
  <input type="submit" value="enviar" id="btnSend">
</form>
</nav>