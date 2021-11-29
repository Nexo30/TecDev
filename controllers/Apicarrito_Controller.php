<?php
require_once 'entidades/carrito.php';
require_once 'entidades/articulo.php';
class Apicarrito_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function completarCarrito()
    {
        try {
/*
$headers = apache_request_headers();
$tokenAux = @$headers['Authorization'];

$token = substr($tokenAux, 7, strlen($tokenAux));
Auth::Check($token);
$rol = Auth::GetData($token)->rol;
if ($rol != 'cliente') {
throw new Exception("no tiene autorizacion");
}*/

            $json = file_get_contents('php://input');
            //convierto en un array asociativo de php
            $datos = json_decode($json);
            $listaArticulos = $datos->lista;
            $usuario = $datos->usuario;
            //$lista = array();
            $lista = [];
            foreach ($listaArticulos as $key => $obj) {
                $articulo = new Carrito();
                $articulo->Cod_Art = $obj->Cod_Art;
                $articulo->Stock = $obj->Cantidad;
                $articulo->precio = $obj->Precio;
                $lista[] = $articulo;
            }
            if ($listaArticulos !== []) {
                $resultado = $this->model->completarCarrito($lista, $usuario);
            } else {
                $resultado == false;
            }
            $respuesta = [
                "datos" => $lista,
                "totalResultados" => count($lista),
                "usuario" => $usuario,
                "resultado" => $resultado,
            ];
            $this->view->respuesta = json_encode($respuesta);
            if ($resultado == false) {
                http_response_code(400);
                $this->view->respuesta = json_encode([
                    "resultado" => $resultado,
                    "respuesta" => "error al completar el pedido",
                ]);
            } else {
                http_response_code(200);

            }
            $this->view->render('api/carrito/completarcarrito');
            //code...

        } catch (Exception $e) {
            echo "<h1>" . $e->getMessage() . "</h1>";

            http_response_code(401);
        }
    }

}
