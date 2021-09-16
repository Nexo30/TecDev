<?php
class Tienda_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function render()
    {

        $this->view->render('tienda/tienda');

    }
}
