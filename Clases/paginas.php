<?php
    class Paginas extends Persona{
        private $numeroDePaginas;
        private $totalRegistros;
        private $registrosPorPagina;
        
        public function __construct($registrosPorPagina)
        {
            parent::__construct("localhost:3307", "personas_crud_pdo", "root", "");
            $this->registrosPorPagina = $registrosPorPagina;
            $this->totalRegistros = $this->getCantidadRegistros();
            $this->calcularNumeroDePaginas();
        }

        public function calcularNumeroDePaginas(){
            $this->numeroDePaginas = ceil($this->totalRegistros / $this->registrosPorPagina);
        }

        public function botones(){
            echo '<ul class="paginas">';
            for($i = 0; $i < $this->numeroDePaginas; $i++){
                ?>
                <li><a class="paginas__boton" href="index.php?pagina=<?php echo ($i + 1); ?>"><?php echo ($i + 1); ?></a></li>
                <?php
            }
            echo '</ul>';
        }

        public function mostrarRegistros(){
            if(isset($_GET['pagina'])){
                $pagina = $_GET['pagina'] - 1;
                $indiceRegistros = $this->registrosPorPagina * $pagina;
                $registros = $this->getRegistros($this->registrosPorPagina, $indiceRegistros);


                for($i = 0; $i < count($registros); $i++){
                    $id = "";
                    echo "<tr>";
                    foreach($registros[$i] as $key => $value){
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
            }else{
                $pagina = 1;
                $indiceRegistros = $this->registrosPorPagina * $pagina;
                $registros = $this->getRegistros($this->registrosPorPagina, $indiceRegistros);


                for($i = 0; $i < count($registros); $i++){
                    $id = "";
                    echo "<tr>";
                    foreach($registros[$i] as $key => $value){
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
    }
?>