
<header class="header">
<img src="<?php echo constant('URL'); ?>public/imagenes/articulos/Logo2.png" width="280px">
<a class="ingresar">
<input type="checkbox" id="btn-up">
	<label for="btn-up" class="up"><i id="icon"class="fas fa-user-circle"></i>Registrarse</label> <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->
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
	<div class="ventana">
	<form action="<?php echo ($urlF); ?>" method="post">
		<div class="contenedor">
			<header>Ingrese sus datos de registro</header>
			<label  class="X" for="btn-up">X</label> <!-- utilizamos el mismo id del checkbox para que funcione -->
			<div class="contenido">


				<input class="ContenidoU" type="text" placeholder="Nombre" name="usuario">
				<input class="ContenidoT" type="password" placeholder="Contraseña" name="contrasena">
				<input class="ContenidoC" type="text" placeholder="Ciudad" name="ciudad">
				<input class="ContenidoE" type="text" placeholder="Calle" name="calle">
				<input class="ContenidoC" type="text" placeholder="Telefono" name="telefono">
				<input class="ContenidoE" type="text" placeholder="Apellido" name="apellido">
				<input class="ContenidoR" type="submit" value="Registrarse" name=" ">

			</div>
			</form>
		</div>
	</div>

</a>
<a class="ingresar">
<input type="checkbox" id="btn-up2">
<label for="btn-up2" class="up2"><i id="icon"class="fas fa-sign-in-alt"></i>Iniciar Sesion</label> <!-- para vincular un input con label usar el mismo id en este caso btn-up, el nombre de los id generalmente lo relacionamos con el contenido para guiarnos, pero es la palabra que queremos -->
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
<div class="ventana2">
	<form action="<?php echo ($url); ?>" method="post">
		<div class="contenedor2">
			<header>Ingrese sus datos de usuario</header>
			<label  class="X2" for="btn-up2">X</label> <!-- utilizamos el mismo id del checkbox para que funcione -->
			<div class="contenido2">


				<input class="Contenido2" type="text" placeholder="Correo" name="nombre">
				<input class="Contenido2" type="password" placeholder="Contraseña" name="pass">
				<input class="Contenido2" type="submit" value="Iniciar">

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
    <li><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
			<li><a href="<?php echo constant('URL'); ?>tienda">Tienda</a></li>
			<li><a href="<?php echo constant('URL'); ?>#sidebar">Nosotros</a></li>
			<li><a href="<?php echo constant('URL'); ?>contacto">Contactos</a></li>
		</ul>
    <div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" name="" id="" placeholder="Escriba aqui...">
      </div>
</nav>