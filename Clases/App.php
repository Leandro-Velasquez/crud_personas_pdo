<?php
class App
{
    public function __construct()
    {
        if(isset($_GET['url']))
        {
            if(substr($_GET['url'], -1) == '/') $url = substr($_GET['url'], 0, -1);
            else $url = $_GET['url'];
            $url = explode('/', $url);

            $controller = array_shift($url) . 'Controller';

            if(count($url) > 0)
            {
                $method = array_shift($url);
            }
            else
            {
                $method = 'index';
            }

            if(count($url) > 0)
            {
                $parameters = $url;
            }
            else
            {
                $parameters = "";
            }

            if(file_exists("Controller/" . $controller . ".php"))
            {
                require "./Controller/". $controller .".php";

                $obj = new $controller;

                if(method_exists($obj, $method))
                {
                    call_user_func_array(array($obj, $method), array($parameters));
                }
            }
        }
        else
        {
            require "./Controller/PersonaController.php";

            $obj = new PersonaController;
            $obj->index();
        }
    }
}