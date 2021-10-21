<?php

class Cliente_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";

    }

    public function render()
    {
        $this->view->render('Cliente/index');

    }

    public function ingresar_cli()
    {
        //var_dump($this); //desplegar los detalles de una variable
        //echo 'ejecutando crear';
        $ci = $_POST['ci'];
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];

        echo $ci;
        if ($this->model->ingresar_cliente(['ci' => $ci, 'nombre' => $nombre, 'pass' => $pass])) {
            $this->view->mensaje = "Se ha registrado correctamente";
            $this->view->render('Cliente/ingresar_cli');
        } else {
            $this->view->mensaje = "Error, intentelo de nuevo";
            $this->view->render('Cliente/ingresar_cli');
        }
    }

}
