<?php
require "./Clases/PaginasMenu.php";

class Model {
    protected $pdo;
    private $table;
    public $limit = 5;
    public $offset = 0;

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
        $objectPdo->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        $resultados = $objectPdo->fetchAll();
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

    public function paginate()
    {
        $url = "";
        if(substr($_GET['url'], -1) == '/') $url = substr($_GET['url'], 0, -1);
        else $url = $_GET['url'];
        if(count(explode('/', $url)) > 2)
        {
            $page = substr(explode('/', $url)[2], -1);
        }
        else $page=1;
        $this->offset = ($page - 1) * $this->limit;
        $objectPdo = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' LIMIT :limit OFFSET :offset');
        $objectPdo->bindParam(':limit', $this->limit, PDO::PARAM_INT);
        $objectPdo->bindParam(':offset', $this->offset, PDO::PARAM_INT);
        $objectPdo->execute();
        $objectPdo->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return (new PaginasMenu($objectPdo->fetchAll(), $this->getCantidadRegistros(), $this->limit));
    }

    public function links()
    {
        return require "./View/Components/paginacion.php";
    }

    public function getCantidadRegistros()
    {
        $resultado = $this->pdo->query('SELECT COUNT(*) AS cantidad_registros FROM ' . $this->table);

        return $resultado->fetch(PDO::FETCH_ASSOC)['cantidad_registros'];
    }

    public function connect()
    {
        return $this->pdo;
    }
}
?>