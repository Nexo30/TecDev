(function($) {
  $(document).ready(function() {
    
    let carritoStr = localStorage.getItem("carrito");
    let carrito;
    if (carritoStr) {
      carrito = JSON.parse(carritoStr);
    }
      let $listaArticulos=[];
      
      let url= $("#url").val();
      console.log(url);
      
  
      let urlReq = url+"articulos/api_listar";
      console.log("url: "+urlReq);
      let headers = {"Content-Type":"application/json;charset=utf-8"}; 
      let data = {};
            $.ajax({
              url: urlReq,
              headers: headers,
              type: 'GET',
              data: data  
          })
          .done(function (data) { 
            $listaArticulos=data.datos;
           console.log(data);
           
           
           })
          .fail(function (jqXHR, textStatus, errorThrown) { 
            console.log("Error");
            console.log(serrorFunction());
           });
         
         

          //asiganr la funcionalidad del carrito
          const items = document.querySelectorAll(".btnAgregar");
          
         
          items.forEach(item => {
            

          item.addEventListener("click", function(){          
            let articuloId = this.dataset.id;
            //console.log("ID="+articuloId);
           
            let articulo= $listaArticulos.find(datos => datos.Cod_Art ==articuloId);
            //console.log($listaArticulos.find(datos => datos.Cod_Art ==articuloId)); 
              
            carrito = JSON.parse(localStorage.getItem("carrito"));
            
            //console.log("carrito: "+ carrito);

            if (carrito==null){
              
              //inicilizo el carrito
              //agrego el elememto al carrito
              
              let cantidadAux= $("#art-"+articuloId).val();
              //console.log(cantidadAux);
              let cantidad=1; 
              if (cantidadAux>=1){
                cantidad = cantidadAux;
              }
              //console.log("cantidad:" + cantidad);
              
              carrito=[];
              
              item={"Cod_Art" : articulo.Cod_Art,
                     "Precio": articulo.Precio,
                     "Nom_art" : articulo.Nom_art,
                      "Cantidad": cantidad,
                       "url": articulo.url}
              carrito.push(item);
              localStorage.setItem("carrito", JSON.stringify(carrito));
              $("#cantidadElemCarrito").text(carrito.length);
            } else{
              
                let cantidadAux= $("#art-"+articuloId).val();
                console.log(cantidadAux);
                

                let cantidad=1; 
                if (cantidadAux>=1){
                  cantidad = cantidadAux;
                }
        
                console.log("cantidad:" + cantidad);              
                console.log();
                item={"Cod_Art" : articulo.Cod_Art,
                      "Nom_art" : articulo.Nom_art,
                     "Precio": articulo.Precio,
                      "Cantidad": cantidad,
                      "url": articulo.url}
                let itemCarrito= carrito.find(articulo => articulo.Cod_Art ==articuloId);
                console.log("itemCarrito: "+JSON.stringify(itemCarrito));
                if (itemCarrito==undefined){
                  carrito.push(item);
                  localStorage.setItem("carrito", JSON.stringify(carrito));
                  $("#cantidadElemCarrito").text(carrito.length);
                } else{
                  
                }

              
            }
            console.log("carrito: "+JSON.stringify(carrito));
            //localStorage.setItem("carrito", )
            //$("#filaart-"+alumnoId).remove();
          });//end item click
      });//end item click items foreach

          


    
  });//end ready
})(jQuery);