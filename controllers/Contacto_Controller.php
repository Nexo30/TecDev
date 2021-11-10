<?php

class Contacto_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->resultadoLogin = "";
    }
    public function render()
    {

        $this->view->render('contacto/index');

    }
}
