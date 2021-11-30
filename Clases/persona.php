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

        public function registrarPersona($nombre, $apellido, $telefono, $email) {
            $sql = $this->pdo->prepare('INSERT INTO personas (nombre, apellido, telefono, email) VALUES (:nombre, :apellido, :telefono, :email)');
                
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':apellido', $apellido);
            $sql->bindParam(':telefono', $telefono);
            $sql->bindParam(':email', $email);

            $sql->execute();
        }

        public function mostrarDatos() {
            $respuesta = $this->pdo->query("SELECT * FROM personas");
            $rows = $respuesta->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows) > 0) {
                for($i = 0; $i < count($rows); $i++){
                    echo "<tr>";
                    foreach($rows[$i] as $key => $value){
                        if($key != "id"){
                            echo "<td>" . $value . "</td>";
                        }
                    }
                    echo '<td class="table__container-buttons">';
                    echo '<a href="" class="table__button table__button--modified">Editar</a>';
                    echo '<a href="" class="table__button">Eliminar</a>';
                    echo '</td>';
                    echo "</tr>";
                }
            }
        }

    }
?>