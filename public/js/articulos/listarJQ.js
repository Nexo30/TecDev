(function($) {
  $(document).ready(function() {

    //console.log(param);
    let carritoStr = localStorage.getItem("carrito");
    let carrito;
    if (carritoStr){
      carrito = JSON.parse(carritoStr);
      console.log("entro");
    }
    
     
           
            $listaArticulos=data.datos;
            console.log(data);
            //console.log($listaArticulos);

      

          $(".btnAgregar").each(function(index) {            
          $(this).on("click", function(){        
            let articuloId = $(this).data("articuloId");
            let articuloDescripcion = $(this).data("articuloDescripcion");
            let articuloCodigo = $(this).data("articuloCat");
            console.log(articuloId);
            let articulo= $listaArticulos.find(articulo => articulo.id ==articuloId);
            //console.log(JSON.stringify(articulo));            
            carrito = JSON.parse(localStorage.getItem("carrito"));
            //console.log("carrito: "+ carrito);
            if (carrito==null){
              //inicilizo el carrito
              //agrego el elememto al carrito
              let cantidadAux= $("#art-"+articuloId).val();
              let cantidad=1; 
              if (cantidadAux>=1){
                cantidad = cantidadAux;
              }
              //console.log("cantidad:" + cantidad);
              carrito=[];
              console.log();
              item={"id" : articulo.Cod_Art,
                     "precio": articulo.Precio,
                     "descripcion": articuloDescripcion,
                     "codigo": articuloCodigo,
                      "cantidad": cantidad,
                  }
              carrito.push(item);              
              localStorage.setItem("carrito", JSON.stringify(carrito));
              $("#cantidadElemCarrito").text(carrito.length);
            } else{
              //ya tienen por lo menos un item
              let cantidadAux= $("#art-"+articuloId).val();
              let cantidad=1; 
              if (cantidadAux>=1){
                cantidad = cantidadAux;
              }
              //console.log("cantidad:" + cantidad);              
              //console.log();
              item={"id" : articulo.Cod_Art,
                     "precio": articulo.Precio,
                     "descripcion": articulo.Descripcion,
                     "codigo": articulo.Cod_Cat,
                      "cantidad": Stock,
}
              let itemCarrito= carrito.find(articulo => articulo.Cod_Art ==articuloId);
              //console.log("itemCarrito: "+itemCarrito);
              if (itemCarrito==undefined){
                carrito.push(item);
                localStorage.setItem("carrito", JSON.stringify(carrito));
                $("#cantidadElemCarrito").text(carrito.length);
              } 
              
            }
            //console.log("carrito: "+$carrito);           
            //localStorage.setItem("carrito", )
            //$("#filaart-"+alumnoId).remove();
          });//end item click
      });//end item click items foreach

          



  });//end ready
})(jQuery);