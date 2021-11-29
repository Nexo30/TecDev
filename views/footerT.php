<?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/footerT.css">
<footer class="footer">
<a class="no" href="https://www.facebook.com/nexo.bueno.3/">
<i class="fab fa-facebook"></i>
</a>
<a class="no" href="https://www.instagram.com/_tecdev_/">
<i class="fab fa-instagram"></i>
</a>
<a class="no" href="https://twitter.com/HT_Motors">
<i class="fab fa-twitter"></i>
</a>
 <aside class="logo"><img src="<?php echo constant('URL'); ?>public/imagenes/articulos/Logo2.png" width="280px"></aside>
<aside class="informacion"><ul class="contact-details">
<li><i class="fas fa-map-marker-alt"></i><?php echo Translate::__('Dir'); ?>: Avenida Imaginaria, Las Piedras</li>
<li><i class="fas fa-phone-alt"></i> Call Center: <a href="tel:+093823455">2369 5734</a></li>
<li><i class="far fa-envelope"></i> Email: <a href="mailto:HTMConsultas@gmail.com">HTMConsultas@gmail.com</a></li>
<li><i class="far fa-clock"></i> <?php echo Translate::__('Ho'); ?></li>
</ul></aside>
<script src="<?php echo constant('URL'); ?>public/js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/main/main.js"></script>
</footer>
