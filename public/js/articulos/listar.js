(function($) {
  $(document).ready(function() {
    let carritoStr = localStorage.getItem("carrito");
    let carrito;
    if (carritoStr){
      carrito = JSON.parse(carritoStr);
      //console.log("entro");
    }
      let $listaArticulos=[];
      let url= $("#url").val();
      let urlReq =url+"apiarticulos/listar";
      let headers = {"Content-Type":"application/json;charset=utf-8"}; 
      let data = {};
            $.ajax({
              url: urlReq,
              headers: headers,
              type: 'DELETE',
              data: data
          })
          .done(function (data) { 
            $listaArticulos=data.articulosDisponibles;
            console.log($listaArticulos);
           })
          .fail(function (jqXHR, textStatus, errorThrown) {console.log("fallo");  });
          $(".btnAgregar").each(function(index) { 
        
          $(this).on("click", function(){    
            let IDProd = $(this).data("articuloId");
            let articuloNombre = $(this).data("articulosNom");
            let articuloDescripcion = $(this).data("articulosDescripcion");
            console.log("lista de articuls\n");
            console.log($listaArticulos);
            console.log('Articulo ID: '+IDProd);
            let articulo= $listaArticulos.find(articulo => {
              return articulo.Cod_Art == IDProd;
            });          
            carrito = JSON.parse(localStorage.getItem("carrito"));
            if (carrito==null){
              //inicilizo el carrito
              //agrego el elememto al carrito
              let cantidadAux= $("#art-"+Cod_Art).val();
              let cantidad=1; 
              if (cantidadAux>=1){
                cantidad = cantidadAux;
              }
              carrito=[];
              console.log($listaArticulos);
              item={"id" : articulo.Cod_Art,
                    "nombre": articulo.Nom_art,
                    "precio": articulo.Precio,
                    "descripcion": articulo.Descripcion,
                    "cantidad": articulo.Stock,
                    "Imagen": articulo.Imagen
                  }
              carrito.push(item);              
              localStorage.setItem("carrito", JSON.stringify(carrito));
              $("#cantidadElemCarrito").text(carrito.length);
            } else{
              //ya tienen por lo menos un item
              let cantidadAux= $("#art-"+Cod_Art).val();
              let cantidad=1; 
              if (cantidadAux>=1){
                cantidad = cantidadAux;
              }
              item={"Cod_Art" : articulo.Cod_Art,
                    "Nombre": articulo.Nom_art,
                    "Precio": articulo.Precio,
                    "Descripcion": articulo.Descripcion,
                    "Stock": articulo.Stock,
                    "url": articulo.Imagen
              }
              let itemCarrito= carrito.find(articulo => articulo.Cod_Art ==Cod_Art);
              if (itemCarrito==undefined){
                carrito.push(articulo);
                localStorage.setItem("carrito", JSON.stringify(carrito));
                $("#cantidadElemCarrito").text(carrito.length);
              } 
            }
          });
      });
  });
})(jQuery);