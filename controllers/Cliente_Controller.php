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
        $nom_usuario = $_POST['nom_usuario'];
        $pass = $_POST['pass'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $calle = $_POST['calle'];
        $ciudad = $_POST['ciudad'];
        $numero = $_POST['numero'];

        if ($this->model->ingresar_cliente(['ci' => $ci, 'nom_usuario' => $nom_usuario, 'pass' => $pass, 'nombre' => $nombre, 'apellido' => $apellido, 'calle' => $calle, 'ciudad' => $ciudad, 'numero' => $numero])) {
            $this->view->mensaje = "Se ha registrado correctamente";
            $this->view->render('Cliente/ingresar_cli');
        } else {
            $this->view->mensaje = "Error, intentelo de nuevo";
            $this->view->render('Cliente/ingresar_cli');
        }
    }

}
