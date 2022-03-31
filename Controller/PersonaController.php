<?php
require "./Clases/Controller.php";

class PersonaController extends Controller
{
    public function index()
    {
        return $this->view('crud/index');
    }

    public function create()
    {
        return $this->view('crud/create');
    }

    public function store()
    {

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