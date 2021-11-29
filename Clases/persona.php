<?php
    class Persona{
        private $pdo;

        public function __construct($host, $dbname, $user, $password)
        {
            try{
                $this->pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . ";" , $user, $password);
            }catch(PDOException $e){
                die("Error al conectar con la base de datos: " . $e->getMessage());
            }catch(Exception $e){
                die("Error generico: " . $e->getMessage());
            }
        }

        
    }
?>