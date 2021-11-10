<nav>
  <div>
    <a href="<?php echo constant('URL'); ?>index">Inicio</a>


    <div id="navbarSupportedContent">

      <div>

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

<?php }
;?>

      </div>


    </div>
    </div>
  </div>
</nav>


