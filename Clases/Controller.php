<?php
class Controller
{

    public function index()
    {
        return $this->view('crud/index');
    }

    public function view($routeView, $params_array = null)
    {
        require "./View/index.php";
    }

    public function content($view, $params_array = null)
    {
        extract($params_array);
        require "./View/" . $view . ".php";
    }
}