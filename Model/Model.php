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
        $objectPdo->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $objectPdo->fetch();
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

    public function connect()
    {
        return $this->pdo;
    }
}
?>