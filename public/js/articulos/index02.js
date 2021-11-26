(function($, param) {
  $(document).ready(function() {
      const items = document.querySelectorAll(".eliminar");
      items.forEach(item => {
        item.addEventListener("click", function(){
          
          let articuloId = this.dataset.id;
          console.log(articuloId);

          const confirm = window.confirm("Deseas eliminar el elemento?");
          if (confirm){
            console.log("entro")
            let url= $("#url").val();
            let urlReq =url+"apiarticulos/borrar/"+articuloId;
            console.log("url: "+urlReq);
            let headers = {"Content-Type":"application/json;charset=utf-8"};
            let data = {};
            $.ajax({
              url: urlReq,
              headers: headers,
              type: 'DELETE',
              data: data
          })
          .done(function (data) { console.log(data);
            $("#filaart-"+articuloId).remove()})
            .fail(function (jqXHR, textStatus, errorThrown) {
              console.log(textStatus);
            });

          } else {
            console.log("entro eslse");
          }


        });//end item click
      });//end item click items foreach  
  });  
})(jQuery, "hola mundo");