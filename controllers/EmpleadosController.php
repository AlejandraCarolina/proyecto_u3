<style>
    
    body {
        background-image: url('img/fondo_pantalla.png'); 
        background-size: cover; 
        background-repeat: no-repeat; 
        background-position: center; /* Ubica la imagen en el centro */
    }
</style>

<?php

require_once './models/Empleados.php';

class EmpleadosController {
    private $empleadosModel;

    public function __construct() {
        $this->empleadosModel = new Empleados();
    }

    public function index() {
        $empleados = $this->empleadosModel->obtenerEmpleados();
        include './views/empleados/index.php';
    }

    public function alta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $puesto = $_POST['puesto'];
            $salario = $_POST['salario'];
            $fechaContratacion = $_POST['fecha_contratacion'];
            $this->empleadosModel->insertarEmpleado($nombre, $apellido, $puesto, $salario, $fechaContratacion);
            /*header("Location: index.php");*/
        } else {
            include './views/empleados/alta.php';
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $this->empleadosModel->eliminarEmpleado($id);
        /*header("Location: index.php");*/
    }

        public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_empleado'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $puesto = $_POST['puesto'];
            $salario = $_POST['salario'];
            $fechaContratacion = $_POST['fecha_contratacion'];
            $this->empleadosModel->actualizarEmpleado($id, $nombre, $apellido, $puesto, $salario, $fechaContratacion);
            header("Location: index.php");
        } else {
            $id = $_GET['id'];
            $empleado = $this->empleadosModel->obtenerEmpleadoPorId($id);
            include './views/empleados/editar.php';
        }
    }
}
