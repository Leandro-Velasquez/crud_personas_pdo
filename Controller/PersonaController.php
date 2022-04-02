<?php
require "./Clases/Controller.php";
require "./Model/Persona.php";

class PersonaController extends Controller
{
    public function index()
    {
        $personas = (new Persona)->all();
        return $this->view('crud/index', compact("personas"));
    }

    public function create()
    {
        return $this->view('crud/create');
    }

    public function store()
    {
        $registro = new Persona;
        $registro->nombre = $_POST['nombre'];
        $registro->apellido = $_POST['apellido'];
        $registro->telefono = $_POST['telefono'];
        $registro->email = $_POST['email'];
        $registro->save();
        header("Location:" . URL_SITE . "Persona/index");
        die();
    }

    public function update()
    {
        $persona = (new Persona)->getRegistroId($_POST['id']);
        $persona->nombre = $_POST['nombre'];
        $persona->apellido = $_POST['apellido'];
        $persona->telefono = $_POST['telefono'];
        $persona->email = $_POST['email'];
        $persona->update();
        header("Location:" . URL_SITE . "Persona/index");
        die();
    }

    public function show($params_array)
    {
        $persona = (new Persona)->getRegistroId($params_array['0']);
        return $this->view('crud/show', compact('persona'));
    }

    public function destroy($params_array)
    {
        $persona = (new Persona)->getRegistroId($params_array['0']);
        $persona->delete();
        header("Location:" . URL_SITE . "Persona/index");
        die();
    }

    public function edit()
    {
        return $this->view('crud/read');
    }
}