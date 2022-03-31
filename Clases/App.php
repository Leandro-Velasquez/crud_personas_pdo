<?php
class App
{
    public function __construct()
    {
        if(isset($_GET['url']))
        {
            $url = $_GET['url'];
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
            require "./Clases/Controller.php";

            $obj = new Controller;
            $obj->index();
        }
    }
}