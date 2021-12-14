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
        }

        public function calcularNumeroDePaginas(){
            $this->numeroDePaginas = ceil($this->totalRegistros / $this->registrosPorPagina);
        }
    }
?>