(function($, param) {
  $(document).ready(function() {
      //alert('hola');
      //console.log("funciona ver articulo"); 
      $("#btnEnviarForm").click(function() {
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
        "Cod_Art": Cod_Art,
        "Cod_Cat": Cod_Cat,
        "Nom_Art": Nom_Art,
        "Descripcion" : Descripcion,
        "Marca": Marca,
        "Modelo": Modelo,
        "Precio": Precio,
        "Stock" : Stock}
        const confirm = window.confirm("Deseas actualizar el elemento?");
        if (confirm){
          //console.log("entro if");
          //solitud ajax, 
          //$("#filaart-"+alumnoId).remove();
          let url= $("#url").val();
          let urlReq =url+"api260260articulos/actualizar";
          //console.log("url: "+urlReq);
          let headers = {"Content-Type":"application/json;charset=utf-8"};
          let data = JSON.stringify(objeto);
          $.ajax({
            url: urlReq,
            headers: headers,            
            type: 'PUT',
            data: data
        })
        .done(function (data) { 
          console.log(data);})
        .fail(function (jqXHR, textStatus, errorThrown) { serrorFunction(); });

        } else {
          console.log("entro else");
        }
    });//end enviar Form ajax

    $("#btnEnviarForm").click(function(e) {
      e.preventDefault();
      console.log("funciona");
      if (true){
        $("#form01").submit();
      }          
    });//end enviar Form post





  });//end ready
})(jQuery, "hola mundo");