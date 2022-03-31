<?php
class Model {
    protected $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";" , DB_USER, DB_PASSWORD);
        }catch(PDOException $e){
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }catch(Exception $e){
            die("Error generico: " . $e->getMessage());
        }
    }

    public function connect()
    {
        return $this->pdo;
    }
}
?>