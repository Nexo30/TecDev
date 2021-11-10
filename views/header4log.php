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
          <a  href="<?php echo constant('URL'); ?>contactos">Contactos</a>
        </li>

        <li>
          <a  href="<?php echo constant('URL'); ?>nosotros">Nosotros</a>
        </li>


            <li>
            <a href="<?php echo constant('URL'); ?>articulos/listar">Tienda</a>
            </li>



          <a  href="#" tabindex="-1" aria-disabled="true"></a>
        </li>


      </ul>
      <div >
      <?php
if (isset($_SESSION["estalogueado"])) {
    $estaLogueado = $_SESSION["estalogueado"];
} else {
    $estaLogueado = false;
}

$estaLogueado = isset($_SESSION["estalogueado"]) ? $_SESSION["estalogueado"] : false;
if ($estaLogueado) {

    ?>

    <?php $nombre = $_SESSION["nombre"];?>
          <a  href="#"><?php echo $nombre; ?></a>
          <a  href="<?php echo constant('URL'); ?>login/salir">Salir</a>

          <?php
if (isset($_SESSION["tipo"])) {

        if ($_SESSION["tipo"] == "admin") {?>

           <a  href="<?php echo constant('URL'); ?>articulos">Lista de productos</a>
           <a  href="<?php echo constant('URL'); ?>Crear_Articulo">Crear Articulo</a>
           <?php }?>

 <?php if ($_SESSION["tipo"] == "cliente") {?>

            <li>
              <a  href="<?php echo constant('URL'); ?>carrito">carrito</a><br> </br>
           </li>
  <?php }?>

<?php }?>

<?php } else {
    ?>
      <li>
      <a href="<?php echo constant('URL'); ?>Cliente/">Registrarse</a>
      </li>

         <li>
          <a  href="<?php echo constant('URL'); ?>login">Ingresar</a>
         </li>


<?php }
?>

      </div>
    </div>
  </div>
</nav>
