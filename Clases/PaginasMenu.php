<?php
class PaginasMenu extends Controller
{
    private $cantidadRegistrosTotalesTabla;
    private $registrosPorPagina;
    private $numeroDePaginas;
    public $registros;

    public function __construct($registros, $cantidadRegistrosTotalesTabla, $numeroDePaginas)
    {
        $this->registros = $registros;
        $this->registrosPorPagina = $numeroDePaginas;
        $this->cantidadRegistrosTotalesTabla = $cantidadRegistrosTotalesTabla;
        $this->calcularCantidadPaginas();
    }

    public function calcularCantidadPaginas()
    {
        $this->numeroDePaginas = ceil($this->cantidadRegistrosTotalesTabla / $this->registrosPorPagina);
    }

    public function links()
    {
        return require "./View/Components/paginacion.php";
    }
}
?>