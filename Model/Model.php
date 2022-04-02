<?php
class Model {
    protected $pdo;
    private $table;

    public function __construct($table)
    {
        try{
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";" , DB_USER, DB_PASSWORD);
            $this->table = $table;
        }catch(PDOException $e){
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }catch(Exception $e){
            die("Error generico: " . $e->getMessage());
        }
    }

    public function all()
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $objectPdo = $this->pdo->query($sql);
        $resultados = $objectPdo->fetchAll(PDO::FETCH_CLASS);
        return $resultados;
    }

    public function getRegistroId(int $id)
    {
        $objectPdo = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $objectPdo->bindParam(':id', $id, PDO::PARAM_INT);
        $objectPdo->execute();
        return $objectPdo->fetch(PDO::FETCH_OBJ);
    }

    public function connect()
    {
        return $this->pdo;
    }
}
?>