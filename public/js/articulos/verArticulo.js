(function ($, param) {
  $(document).ready(function () {
    //alert('hola');
    //console.log("funciona ver articulo");
    
    $("#btnEnviarForm").click(function (e) {
      e.preventDefault();
      //alert('hola');
      //console.log("enviarFormulario");
      var Cod_Art = $("#articuloId").val();
      var Cod_Cat = $("#articuloCat").val();
      var Nom_Art = $("#articuloNom").val();
      var Descripcion = $("#articuloDescripcion").val();
      var Marca = $("#articuloMarca").val();
      var Modelo = $("#articuloModelo").val();
      var Precio = $("#articuloPrecio").val();
      var Stock = $("#articuloStock").val();

      var objeto = {
        Cod_Art: Cod_Art,
        Cod_Cat: Cod_Cat,
        Nom_Art: Nom_Art,
        Descripcion: Descripcion,
        Marca: Marca,
        Modelo: Modelo,
        Precio: Precio,
        Stock: Stock,
      };
      
      const confirm = window.confirm("Deseas actualizar el elemento?");
      if (confirm) {
        //console.log("entro if");
        //solitud ajax,
        $("#form01").submit();
        //$("#filaart-"+alumnoId).remove();
      } else {
        console.log("entro else");
      }
    });
    

    /*$("#btnEnviarForm").click(function (e) {
      console.log("funciona");
      if (true) {
      }
    }); //end enviar Form post*/
  }); //end ready
})(jQuery, "hola mundo");
