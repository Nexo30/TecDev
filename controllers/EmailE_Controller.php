<?php
class EmailE_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->resultadoLogin = "";
        $this->view->mensajeC = "";

    }
    public function render()
    {

        $this->view->render('contacto/EmailE');

    }
}
