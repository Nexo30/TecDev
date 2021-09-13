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
        $tel = $_POST['tel'];
        $direccion = $_POST['direccion'];
        $apellido = $_POST['apellido'];
        echo $ci;
        if ($this->model->ingresar_cliente(['ci' => $ci, 'nombre' => $nombre, 'tel' => $tel, 'direccion' => $direccion, 'apellido' => $apellido])) {
            $this->view->mensaje = "Se ha registrado correctamente";
            $this->view->render('Cliente/ingresar_cli');
        } else {
            $this->view->mensaje = "Error, intentelo de nuevo";
            $this->view->render('Cliente/ingresar_cli');
        }
    }

}
