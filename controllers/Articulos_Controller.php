<?php
require_once 'entidades/articulo.php';

class Articulos_Controller extends Controller
{
    public function __construct()
    {

        $cambio = "a eliminar";
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->mensajeC = "";
        $this->view->resultadoLogin = "";
    }

    //http://localhost/prophp3bj/proyectoPHPComun/articulos
    public function render()
    {

        $articulos = $this->model->get();
        $this->view->articulos = $articulos;
        $this->view->render('articulos/index');
    }

    public function verArticulo($param = null)
    {
        $idArticulo = $param[0];
        $articulo = $this->model->verArticulo($idArticulo);

        $_SESSION["id_articulo"] = $idArticulo;

        $this->view->articulo = $articulo;
        $this->view->render('articulos/verArticulo');
    }

    public function actualizar($param = null)
    {
        $resultado = false;
        try {
            $articulo = new Articulo();
            $articulo->Cod_Art = $_POST['Cod_Art'];
            $articulo->Cod_Cat = $_POST['Cod_Cat'];
            $articulo->Nom_art = $_POST['Nom_Art'];
            $articulo->Descripcion = $_POST['Descripcion'];
            $articulo->Marca = $_POST['Marca'];
            $articulo->Modelo = $_POST['Modelo'];
            $articulo->Stock = $_POST['Stock'];
            $precioSF = $_POST['Precio'];
            $Precio = floatval($precioSF);
            $articulo->Precio = number_format((float) $Precio, 2, '.', '');
            $resultado = $this->model->actualizar($articulo);
        } catch (\Throwable $th) {
            $resultado = false;
        }
        $this->view->respuesta = $resultado;
        $this->view->render('articulos/actualizar');
    }
    public function listar($param = null)
    {

        //obtiene todos los articulos
        $articulos = $this->model->get();
        //lo asigna a la varible articulos
        $this->view->articulo = $articulos;
        //lista los articulos
        $this->view->render('articulos/listar');
    }

}
