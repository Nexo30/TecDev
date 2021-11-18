<?php
require_once 'entidades/carrito.php';
class Apicarrito_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function completarCarrito()
    {
        $json = file_get_contents('php://input');
        $datos = json_decode($json);
        $listaArticulos = $datos->lista;
        $personas = $datos->ID;
        $lista = [];
        foreach ($listaArticulos as $key => $obj) {
            $articulos = new Carrito();
            $articulos->Cod_Art = $obj->$Cod_Art;
            $articulos->Nom_Art = $obj->Nom_Art;
            $articulos->Descripcion = $obj->Descripcion;
            $articulos->Precio = $obj->Precio;
            $articulos->Stock = $obj->Stock;
            $articulos->Estado = $obj->Estado;
            $articulos->Cod_Cat = $obj->Cod_Cat;
            $articulos->Imagen = $obj->Imagen;
            $lista[] = $articulos;
        }
        $respuesta = [];
        $resultado = $this->model->completarCarrito($lista, $personas);
        if ($resultado->res) {
            http_response_code(201);
            $respuesta = [
                "datos" => $lista,
                "IdPedidos" => $resultado->IdPedidos,
                "Personas" => $personas,
                "pedRes" => $resultado->res,
                "respuesta" => "Pedido Completado con Éxito",
            ];
            $this->view->respuesta = $respuesta;
        } else {
            http_response_code(400);
            $respuesta = json_encode([
                "resultado" => $resultado,
                "respuesta" => "Error al completar el pedido",
            ]);

        }
        //convierto la respuesta a json
        $this->view->respuesta = json_encode($respuesta);
        //llamo al método render
        $this->view->render('api/carrito/completarcarrito');
    }

}
