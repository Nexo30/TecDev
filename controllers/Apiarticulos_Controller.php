<?php
require_once 'entidades/articulo.php';

class Apiarticulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //localahost/proyectofinal3bj/BitPC/apiarticulos/
    public function render()
    {

        $listaArticulos = $this->model->listar();
        $respuesta = [
            "datos" => $listaArticulos,
            "totalResultados" => count($listaArticulos),
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api/articulos/listar');
    }

    public function listar()
    {

        $listaArticulos = $this->model->listar();
        $respuesta = [
            "articulosDisponibles" => $listaArticulos,
            "totalResultados" => count($listaArticulos),
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api/articulos/listar');
    }

    public function crear()
    {
        //obtengo los datos de la peticion http, post body
        $json = file_get_contents('php://input');
        //convierto en un array asociativo de php
        $obj = json_decode($json);

        $articulos = new Articulos();
        $articulos->Cod_Art = $obj->Cod_Art;
        $articulos->Nom_art = $obj->Nom_art;
        $articulos->Descripcion = $obj->Descripcion;
        $articulos->Stock = $obj->Stock;
        $articulos->Cod_Cat = $obj->Cod_Cat;
        $articulos->Precio = $obj->Precio;
        $articulos->Marca = $obj->Marca;
        $articulos->Modelo = $obj->Modelo;

        //$articulo->fecha = $obj->fecha;
        //array_push($listaArticulos, $articulo);
        //$items[] = $item;

        $resultado = $this->model->crear($articulos);
        //$articulo->id = $obj->id;
        //$articulo->nombre = $obj->nombre;
        //$articulos = $this->model->get();
        //$this->view->articulos = json_encode($articulos);
        //$listaObjetos = json_encode($listaArticulos);

        $respuesta = [
            "Cod_Art" => $resultado,
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api/articulos/crearm');
        //var_dump($this);
        //var_dump($this->view);
    } //end crear

    public function crearm()
    {
        //obtengo los datos de la peticion http, post body
        $json = file_get_contents('php://input');
        //convierto en un array asociativo de php
        $listaArticulos = json_decode($json);
        $lista = [];
        foreach ($listaArticulos as $key => $obj) {
            $articulos = new Articulos();
            $articulos->Nom_art = $obj->Nom_art;
            $articulos->Descripcion = $obj->Descripcion;
            $articulos->Precio = $obj->Precio;
            $articulos->Stock = $obj->Stock;
            $articulos->Estado = $obj->Estado;
            $articulos->Categoria = $obj->Categoria;
            $articulos->URL_Foto = $obj->URL_Foto;
            //$lista[] = $articulo;
            array_push($lista, $articulos);
        }

        $resultado = $this->model->crearm($lista);

        $respuesta = [
            "Cod_Art" => $resultado,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/articulos/crearm');

    }

    public function borrar($param)
    {
        $id = $param[0];
        $resultado = $this->model->borrar($Cod_Art);
        $verboHTTP = $_SERVER['REQUEST_METHOD'];
        $respuesta = [
            "Cod_Art" => $Cod_Art,
            "resultado" => $resultado,
            "verboHTTP" => $verboHTTP,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/articulos/borrar');
    } //end borrar

    public function actualizar()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $articulos = new Articulos();
        $articulos->Cod_Art = $obj->Cod_Art;
        $articulos->Nom_art = $obj->Nom_art;
        $articulos->Descripcion = $obj->Descripcion;
        $articulos->Precio = $obj->Precio;
        $articulos->Stock = $obj->Stock;
        $articulos->Marca = $obj->Marca;
        $articulos->Modelo = $obj->Modelo;
        $resultado = $this->model->actualizar($articulos);
        $verboHTTP = $_SERVER['REQUEST_METHOD'];
        $respuesta = [
            "Cod_Art" => $articulos->Cod_Art,
            "resultado" => $resultado,
            "verboHTTP" => $verboHTTP,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/articulos/crearm');
    } //end update

    public function ver($param)
    {
        $Cod_Art = $param[0];
        $articulos = $this->model->ver($Cod_Art);
        $verboHTTP = $_SERVER['REQUEST_METHOD'];
        $respuesta = [
            "Cod_Art" => $articulos->Cod_Art,
            "datos" => $articulos,
            "verboHTTP" => $verboHTTP,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render('api/articulos/ver');
    } // end ver
}
