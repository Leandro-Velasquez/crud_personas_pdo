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
        !empty($params_array)?extract($params_array):null;
        require "./View/" . $view . ".php";
    }
}