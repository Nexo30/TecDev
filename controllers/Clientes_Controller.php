<?php

class Clientes_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    public function render()
    {

        $Cliente = $this->model->get();
        $this->view->Cliente = $Cliente;
        $this->view->render('clientes/index');
    }

    public function eliminarCliente($param = null)
    {
        $Id = $param[0];

        if ($this->model->delete($Id)) {
            $mensaje = "Cliente eliminado correctamente";
            //$this->view->mensaje = "Alumno eliminado correctamente";
        } else {
            $mensaje = "No se pudo eliminar al Cliente";
            //$this->view->mensaje = "No se pudo eliminar al alumno";
        }

        //$this->render();

        echo $mensaje;
    }

}
