<nav >
  <div>
    <a href="<?php echo constant('URL'); ?>index">Inicio</a>
    <button>
      <span></span>
    </button>
    <div>
      <ul>
        <li>
          <a href="#"></a>
        </li>
        <li>
          <a  href="<?php echo constant('URL'); ?>articulos">Articulos</a>
        </li>
        <li >
          <a  href="#" >
            Listar Articulos
          </a>
          <ul >
            <li><a href="<?php echo constant('URL'); ?>articulos/listar">Articulos</a></li>
            <li><hr ></li>
          </ul>
        </li>
        <li >
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
     <li class="nav-item">
              <a class="nav-link text" href="<?php echo constant('URL'); ?>carrito" >
      Carrito
      </a>
        </li>
        <li class="nav-item">
              <a class="nav-link text" href="<?php echo constant('URL'); ?>contacto" >
      Contacto
      </a>
        </li>

        <a  href="<?php echo constant('URL'); ?>login">Ingresar</a>
<?php }
;?>

      </div>
    </div>
  </div>
</nav>
