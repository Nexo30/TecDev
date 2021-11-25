(function ($) {
  $(document).ready(function () {
    let idioma = $("#idioma").val();
    
    console.log("idioma: " + idioma);
    document.documentElement.setAttribute("lang", idioma);
  if( window.localStorage )
  {
    if( !localStorage.getItem('Cargar') )
    {
      localStorage['Cargar'] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem('Cargar');
  }
  });
})(jQuery);