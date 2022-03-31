<?php
class Controller
{
    public function index()
    {
        return $this->view('crud/index');
    }

    public function view($routeView)
    {
        require "./View/index.php";
    }

    public function content($view)
    {
        require "./View/" . $view . ".php";
    }
}