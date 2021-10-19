<?php

class Contactos_Controller extends Controller
{
    public function __construct()
    {
        $contactos = "contactos";
        parent::__construct();
        $this->view->mensaje = "";
    }

    public function render()
    {
        $this->view->render('contactos/index');
    }
}
