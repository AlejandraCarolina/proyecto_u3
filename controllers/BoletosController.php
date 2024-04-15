<?php

require_once './models/VentasBoletos.php';
require_once './models/Cliente.php';
require_once './models/Peliculas.php';
require_once './models/Empleados.php';

class BoletosController {
    private $ventasBoletosModel;

    public function __construct() {
        $this->ventasBoletosModel = new VentasBoletos();
    }

    public function index() {
        // Obtener ventas diarias
        $ventasDiarias = $this->ventasBoletosModel->obtenerVentasDiarias();
        
        // Obtener ventas de boletos
        $ventas = $this->ventasBoletosModel->obtenerVentas();
        
        include './views/ventas_boletos/index.php';
    }

    public function alta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario de alta de venta de boletos
            $id_cliente = $_POST['id_cliente'];
            $id_pelicula = $_POST['id_pelicula'];
            $id_empleado = $_POST['id_empleado']; // Agregado: Obtener el ID del empleado
            $fecha_hora = $_POST['fecha_hora']; // Agregado: Obtener la fecha y hora
            $cantidad = $_POST['cantidad']; // Agregado: Obtener la cantidad de boletos
            $sala = $_POST['sala']; // Agregado: Obtener el número de sala
            $costo = $_POST['costo']; // Agregado: Obtener el costo
            $asiento = $_POST['asiento']; // Agregado: Obtener el número de asiento
    
            // Insertar la venta en la base de datos
            $this->ventasBoletosModel->registrarVenta($id_cliente, $id_pelicula, $id_empleado, $fecha_hora, $cantidad, $sala, $costo, $asiento);
            header("Location: index.php?controller=BoletosController&action=index");
            exit();
        } else {
            // Obtener la lista de clientes
            $clientesModel = new Cliente();
            $clientes = $clientesModel->obtenerClientes();
    
            // Obtener la lista de películas
            $peliculasModel = new Peliculas();
            $peliculas = $peliculasModel->obtenerPeliculasConGeneros();
    
            // Obtener la lista de empleados // Agregado: Obtener la lista de empleados
            $empleadosModel = new Empleados();
            $empleados = $empleadosModel->obtenerEmpleados();
    
            // Mostrar el formulario de alta de venta de boletos con la lista de clientes, películas y empleados
            include './views/ventas_boletos/alta.php';
        }
    }
    

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id_venta = $_GET['id'];
            $this->ventasBoletosModel->eliminarVenta($id_venta);
            header("Location: index.php?controller=BoletosController&action=index");
            exit();
        }
    }

    public function filtrar() {
        // Obtener el rango de fechas del formulario
        $fechaInicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : null;
        $fechaFin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : null;
        
        if ($fechaInicio && $fechaFin) {
            // Filtrar ventas por rango de fechas
            $ventasFiltradas = $this->ventasBoletosModel->obtenerVentasPorRangoFechas($fechaInicio, $fechaFin);
            
            // Establecer la bandera de datosFiltrados
            $datosFiltrados = true;
            
            // Cargar la vista con los datos datosFiltradoss y la bandera de datosFiltrados
            include './views/ventas_boletos/index.php';
        } else {
            // Si no se especifica un rango de fechas, redirigir al index
            header("Location: index.php?controller=BoletosController&action=index");
            exit();
        }
    }    
}
?>
