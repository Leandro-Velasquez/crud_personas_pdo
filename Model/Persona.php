<?php
require "Model.php";

class Persona extends Model
{
    private $table = "personas";
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function save()
    {
        $gsent = $this->connect()->prepare('INSERT INTO personas (nombre, apellido, telefono, email) VALUES (:nombre, :apellido, :telefono, :email)');
        $gsent->bindParam(':nombre', $this->nombre, PDO::PARAM_STR, 60);
        $gsent->bindParam(':apellido', $this->apellido, PDO::PARAM_STR, 60);
        $gsent->bindParam(':telefono', $this->telefono, PDO::PARAM_STR, 45);
        $gsent->bindParam(':email', $this->email, PDO::PARAM_STR, 255);
        $gsent->execute();
    }

    public function update()
    {
        $gsent = $this->connect()->prepare("UPDATE $this->table SET nombre=:nombre, apellido=:apellido, telefono=:telefono, email=:email WHERE id=:id");
        $gsent->bindParam(':nombre', $this->nombre, PDO::PARAM_STR, 60);
        $gsent->bindParam(':apellido', $this->apellido, PDO::PARAM_STR, 60);
        $gsent->bindParam(':telefono', $this->telefono, PDO::PARAM_STR, 45);
        $gsent->bindParam(':email', $this->email, PDO::PARAM_STR, 255);
        $gsent->bindParam(':id', $this->id, PDO::PARAM_INT);
        $gsent->execute();
    }

    public function delete()
    {
        $gsent = $this->connect()->prepare("DELETE FROM " . $this->table . " WHERE id=:id");
        $gsent->bindParam(':id', $this->id);
        $gsent->execute();
    }
}