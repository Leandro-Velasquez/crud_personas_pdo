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
        return $this->view('crud/update');
    }

    public function show()
    {

    }

    public function destroy()
    {

    }

    public function edit()
    {
        return $this->view('crud/read');
    }
}