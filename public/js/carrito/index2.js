(function($) {
  $(document).ready(function() {
      //alert('carrito');
      let carrito = JSON.parse(localStorage.getItem("carrito"));
      //$("#carrito").text(carrito.length);
      carrito.forEach(element => {
        //let insert = `<button type="button" class="btn btn-primary">${element.id}</button>` 
        let insert02 = `<div class="col-lg-4 col-md-6 col-sm-6 col-xs-4 p-3"
        id="art-${element.Cod_Art}">
        <div class="card">
          <img class="card-img-top" src="${element.Imagen}" alt="Card image cap"/>
          <div class="card-body">
            <h5 class="card-title">ID:${element.Cod_Art} ${element.Cod_Cat}</h5>
            <p class="card-text">${element.Descripcion}</p>
            <p class="card-text">${element.Marca}</p>
            <p class="card-text">${element.Modelo}</p>
            <p class="card-text">$ ${element.Precio}</p>
            <input id="cant-${element.Cod_Art}" class="form-control"
            value="${element.Stock}" type="number" disabled
            ></p>
            <button type="button" class="btn btn-danger btnEliminar"
            data-articulo-id="${element.Cod_Art}"
                        >Eliminar</button>
          </div>
          </div><!-- end card -->
        </div><!-- end col --><?php }`
        $("#carritoid").after(insert02);
      });
      /*for (let index = 0; index < array.length; index++) {

        
        
      }*/
      $("body").on("click",".btnEliminar" ,function(){
        console.log("entro");
        let articuloId= $(this).data("articuloId");
        const confirm = window.confirm("Deseas eliminar el elemento?");
        console.log("holaP");
        if (confirm){
          $(`#art-${articuloId}`).remove();
          let carritoStr = localStorage.getItem("carrito");
          $("#cantidadElemCarrito").text(carrito.length);
          if (carritoStr){
            console.log("-----------------");
            let carrito= JSON.parse(carritoStr);
            console.log(carrito);
            let itemCarrito= carrito.find(articulo => articulo.id ==articuloId);
            carrito.forEach(function(art, index, object) {
              if(art.id == articuloId){
                object.splice(index, 1);
                localStorage.setItem("carrito", JSON.stringify(carrito));
                //console.log("probando");
                
                
                
              }
              console.log("hola");
              $("#cantidadElemCarrito").text(carrito.length);
          });
          //$("#cantidadElemCarrito").text(carrito.length);
          
           
          }
        }

      });
      
  });  
})(jQuery);