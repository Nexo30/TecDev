<nav >
  <div>
    <ul>
    <li>
    <a href="<?php echo constant('URL'); ?>index">Inicio</a>
    </li>
    </ul>
    <div>

      <ul>

        <li>
          <a  href="<?php echo constant('URL'); ?>articulos">Lista de productos</a>
        </li>

        <li>
          <a  href="<?php echo constant('URL'); ?>contactos">Contactos</a>
        </li>

        <li>
          <a  href="<?php echo constant('URL'); ?>nosotros">Nosotros</a>
        </li>
        <li>
        <a  href="<?php echo constant('URL'); ?>carrito">carrito</a><br> </br>
        </li>

            <li>
            <a href="<?php echo constant('URL'); ?>articulos/listar">Tienda</a>
            </li>



          <a  href="#" tabindex="-1" aria-disabled="true"></a>
        </li>


      </ul>
      <div >
      <?php if (isset($_SESSION["estalogueado"])) {
    $estaLogueado = $_SESSION["estalogueado"];
} else {
    $estaLogueado = false;
}
$estaLogueado = isset($_SESSION["estalogueado"]) ? $_SESSION["estalogueado"] : false;
if ($estaLogueado) {
    ?><?php $nombre = $_SESSION["nombre"];?>
          <a  href="#"><?php echo $nombre; ?></a>
          <a  href="<?php echo constant('URL'); ?>login/salir">Salir</a>
<?php } else {
    ?>
      <li>
      <a href="<?php echo constant('URL'); ?>regusuario/">Registrarse</a>
      </li>

         <li>
          <a  href="<?php echo constant('URL'); ?>login">Ingresar</a>
         </li>

         <li>
         <a  href="<?php echo constant('URL'); ?>loginadm">IngresarAdmin</a> <br> </br>
         </li>s
<?php }
;?>

      </div>
    </div>
  </div>
</nav>
