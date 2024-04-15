<?php

require_once './models/VentasSnacks.php';
require_once './models/Clientes.php';

class SnackController {
    private $ventasSnacksModel;

    public function __construct() {
        $this->ventasSnacksModel = new VentasSnacks();
    }

    public function index() {
        $ventas = $this->ventasSnacksModel->obtenerVentas();
        $ventasDiarias = $this->ventasSnacksModel->obtenerVentasDiarias(); // Obtener las ventas diarias
        include './views/ventas_snack/index.php';
    }

    public function alta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario de alta de venta de snacks
            $id_cliente = $_POST['id_cliente'];
            $fecha_hora = $_POST['fecha_hora'];
            $cantidad = $_POST['cantidad'];
            $producto = $_POST['producto'];
            $costo_unitario = $_POST['costo_unitario'];
            $total = $_POST['total'];
    
            $this->ventasSnacksModel->registrarVenta($id_cliente, $fecha_hora, $cantidad, $producto, $costo_unitario, $total);
            header("Location: index.php?controller=SnackController&action=index");
            exit();
        } else {
            $clientesModel = new Clientes();
            $clientes = $clientesModel->obtenerClientes();

            include './views/ventas_snack/alta.php';
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id_venta = $_GET['id'];
            $this->ventasSnacksModel->eliminarVenta($id_venta);
            header("Location: index.php?controller=SnackController&action=index");
            exit();
        }
    }
    
    public function filtrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin'])) {
            $fechaInicio = $_GET['fecha_inicio'];
            $fechaFin = $_GET['fecha_fin'];
            $ventasSnackFiltradas = $this->ventasSnacksModel->obtenerVentasPorRangoFechas($fechaInicio, $fechaFin);
            $datosFiltrados = true; // bandera para saber si se han filtrado datos
            
            // Obtener los 5 productos más vendidos dentro del rango de fechas
            $productosMasVendidos = $this->ventasSnacksModel->obtenerProductosMasVendidos($fechaInicio, $fechaFin);
            
            include './views/ventas_snack/index.php';
            exit();
        }
    
        include './views/ventas_snack/index.php';
    }
}     

?>
