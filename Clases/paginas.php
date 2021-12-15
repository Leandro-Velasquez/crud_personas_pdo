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

        
    }
?>