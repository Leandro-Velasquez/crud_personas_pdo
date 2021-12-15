<?php

class Persona{
        private $pdo;

        public function __construct($host, $dbname, $user, $password)
        {
            $this->actualizarDatos = false;
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

        public function eliminarPersonaRegistro($id) {
            $sql = $this->pdo->prepare('DELETE FROM personas WHERE id=:id');

            $sql->bindParam(':id', $id);

            $sql->execute();
        }
        
        public function editarDatosPersona($nombre, $apellido, $telefono, $email, $id) {
            $sql = $this->pdo->prepare("UPDATE personas SET nombre=:n, apellido=:a, telefono=:t, email=:e WHERE id=:id");

            $sql->bindParam(":n", $nombre);
            $sql->bindParam(":a", $apellido);
            $sql->bindParam(":t", $telefono);
            $sql->bindParam(":e", $email);
            $sql->bindParam(":id", $id);

            $sql->execute();
        }
        
        public function getDatosPersona($id) {
            $sql = $this->pdo->prepare("SELECT * FROM personas WHERE id=:id");
            $sql->bindParam(':id', $id);
            $sql->execute();

            $respuesta = $sql->fetch(PDO::FETCH_ASSOC);

            return $respuesta;
        }

        public function getArrayEmailsDB() {
            $sql = $this->pdo->prepare("SELECT email FROM personas");
            $sql->execute();
            $arrayEmails = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $arrayEmails;
        }

        public function mostrarDatos() {
            $respuesta = $this->pdo->query("SELECT * FROM personas");
            $rows = $respuesta->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows) > 0) {
                for($i = 0; $i < count($rows); $i++){
                    $id = "";
                    echo "<tr>";
                    foreach($rows[$i] as $key => $value){
                        if($key == "id"){
                            $id = $value;
                        }
                        if($key != "id"){
                            echo "<td>" . $value . "</td>";
                        }
                    }
                    ?>
                    <td class="table__container-buttons">
                        <form method="POST">
                            <button class="table__button" name="botonEditar" value=<?php echo $id; ?>>Editar</button>
                            <button class="table__button" name="id" value=<?php echo $id; ?>>Eliminar</button>
                        </form>
                    </td>
                    <?php
                    echo "</tr>";
                }
            }
        }

        public function getCantidadRegistros(){
            $sql = $this->pdo->query("SELECT COUNT(*) FROM personas");
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data["COUNT(*)"];
        }

        public function getRegistros($cantidadRegistros, $desde){
            $sql = $this->pdo->prepare("SELECT * FROM personas LIMIT :c OFFSET :d");

            $sql->bindParam(":c", $cantidadRegistros, PDO::PARAM_INT);
            $sql->bindParam(":d", $desde, PDO::PARAM_INT);

            $sql->execute();

            $registros = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $registros;
        }
    }
?>