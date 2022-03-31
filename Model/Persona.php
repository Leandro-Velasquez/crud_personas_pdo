<?php
require "Model.php";

class Persona extends Model
{
    private $table = "personas";

    public function __construct()
    {
        parent::__construct($this->table);
    }
}