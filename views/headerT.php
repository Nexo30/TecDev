<?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
<?php
$url1 = $_SERVER["REQUEST_URI"];
$url2 = basename("$url1");
if ($url2 == "TecDev") {
    $url = "$url1" . "inicio/ingresar";
} else {
    $url = "$url2" . "/" . "ingresar";
}
if ($url == "registrar" . "/" . "ingresar") {
    $url = "ingresar";
}
if ("$url2" . "/" . "$url2" == $url) {
    $url = $url2;
}
if ("$url" == "inicio/ingresar") {
    $url = "ingresar";
}
if ($url == "EmailE" . "/" . "ingresar") {
    $url = "ingresar";
}
;?>
	<?php
$urlS = $_SERVER["REQUEST_URI"];
$urlB = basename("$urlS");
if ($urlB == "TecDev") {
    $urlF = "$urlS" . "inicio/registrar";
} else {
    $urlF = "$urlB" . "/" . "registrar";
}
if ($urlF == "ingresar" . "/" . "registrar") {
    $urlF = "registrar";
}
if ($urlF == "EmailE" . "/" . "registrar") {
    $urlF = "registrar";
}
if ("$urlB" . "/" . "$urlB" == $urlF) {
    $urlF = $urlB;
}
if ("$urlF" == "inicio/registrar") {
    $urlF = "registrar";
}

;?>
<header class="header">
<img src="<?php echo constant('URL'); ?>public/imagenes/articulos/Logo2.png" width="280px">

<a class="ingresar">
<input type="checkbox" id="btn-up">
	<label for="btn-up" class="up"><i id="icon"class="fas fa-user-circle"></i><?php echo Translate::__('Sing_up'); ?></label> <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->
	<div class="ventana">
	<form action="<?php echo ($urlF); ?>" method="post">
		<div class="contenedor">
			<header><?php echo Translate::__('RegDa'); ?></header>
			<label  class="X" for="btn-up">X</label> <!-- utilizamos el mismo id del checkbox para que funcione -->
			<div class="contenido">


				<input class="ContenidoU" type="text" placeholder="<?php echo Translate::__('Correo'); ?>" name="usuario">
				<input class="ContenidoT" type="password" placeholder="<?php echo Translate::__('Pass'); ?>" name="contrasena">
				<input class="ContenidoC" type="text" placeholder="<?php echo Translate::__('City'); ?>" name="ciudad">
				<input class="ContenidoE" type="text" placeholder="<?php echo Translate::__('Street'); ?>" name="calle">
				<input class="ContenidoC" type="text" placeholder="<?php echo Translate::__('Tel'); ?>" name="telefono">
				<input class="ContenidoE" type="text" placeholder="<?php echo Translate::__('Ape'); ?>" name="apellido">
				<input class="ContenidoR" type="submit" value="<?php echo Translate::__('Reg'); ?>" name="submit">

			</div>
			</form>
		</div>
	</div>

</a>
<a class="ingresar">
<input type="checkbox" id="btn-up2">
<label for="btn-up2" class="up2"><i id="icon"class="fas fa-sign-in-alt"></i><?php echo Translate::__('Sing_in'); ?></label> <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->

<div class="ventana2">
	<form action="<?php echo ($url); ?>" method="post">
		<div class="contenedor2">
			<header><?php echo Translate::__('UserDa'); ?></header>
			<label  class="X2" for="btn-up2">X</label>
			<div class="contenido2">


				<input class="Contenido2" type="text" placeholder="<?php echo Translate::__('Correo'); ?>" name="nombre">
				<input class="Contenido2" type="password" placeholder="<?php echo Translate::__('Pass'); ?>" name="pass">
				<input class="Contenido2" type="submit" value="<?php echo Translate::__('Sing_in'); ?>">

			</div>
     </form>
		</div>
	</div>

</a>
<a class="Carrito" href="<?php echo constant('URL'); ?>carrito">
<i class="fas fa-shopping-cart"></i>
</a>
<span class="CarritoCont" id="cantidadElemCarrito">0</span>
</a>
<h1 id="Res"><?php echo $this->resultadoLogin; ?></h1>
<h1 id="Res"><?php echo $this->mensaje; ?></h1>
<h1 id="Res"><?php echo $this->mensajeC; ?></h1>

</header>
  <nav class="navbar">
		<ul>
    <li><a href="<?php echo constant('URL'); ?>"><?php echo Translate::__('index'); ?></a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda"><?php echo Translate::__('Shop'); ?></a></li>
			<li><a href="<?php echo constant('URL'); ?>#sidebar"><?php echo Translate::__('Us'); ?></a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto"><?php echo Translate::__('Contacts'); ?></a></li>
		</ul>
		<a class="Idioma" href="<?php echo constant('URL'); ?>idioma"><?php echo Translate::__('leng'); ?></a>
		<div class="search-wrapper">
		<span class="las la-search"></span>
    <input type="search" id="buscadortexto" placeholder="<?php echo Translate::__('Search'); ?>">
    <div class="btn_buscar" id="clickBuscar">

    </div>
  </div>
<form action="<?php echo constant('URL'); ?>tienda/buscar" method="post" id="searchForm" style="display: none;">
<input type="hidden" name="textoBuscador" value="" id="textoculto">
  <input type="submit" value="enviar" id="btnSend">
</form>

</nav>