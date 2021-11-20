<?php

class Carrito_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->mensajeC = "";
        $this->view->resultadoLogin = "";

    }
    public function render()
    {

        $this->view->render('carrito/index');

    }
}
