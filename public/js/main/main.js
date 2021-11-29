(function($) {
  
  $(document).ready(function() {
    
      //alert('hola');
      //console.log("funciona ver articulo"); 
      let carrito = JSON.parse(localStorage.getItem("carrito"))
      //console.log("probando");
      if (carrito){
        $("#cantidadElemCarrito").text(carrito.length);
      }
      let idioma = Cookies.get('idioma');
      
      $idioma = idioma;   
      let idiomaAux= "en";      
      if (idioma){
        idiomaAux = idioma;
      }else {
        idiomaAux = idioma;
      }
      document.documentElement.setAttribute("lang", idiomaAux);

      function buscar() {
        let texto = $("#buscadortexto").val();
        console.log(texto);
        $("#textoculto").val(texto);
        if (texto) {
          console.log("entro");
          $("#btnSend").click();
        }
      }
  
      $("#buscadortexto").keypress(function (e) {
        console.log(e.which);
        if (e.which == 13) {
          buscar();
        }
      });
      $("#clickBuscar").click(function name(e) {
        buscar();
      });    
      
  });
})(jQuery);