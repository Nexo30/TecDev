<?php

class Homepage_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensajeC = "";

    }
    public function render()
    {

        $this->view->render('homepage/index');

    }
}
