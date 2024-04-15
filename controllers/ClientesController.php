<?php

require_once __DIR__ . '/../models/Cliente.php';

class ClientesController {
    private $clienteModel;

    public function __construct() {
        $this->clienteModel = new Cliente();
    }


    public function index() {
        $clientes = $this->clienteModel->obtenerClientes();
        
        include './views/clientes/index.php';
    }

    public function alta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $this->clienteModel->insertarCliente($nombre, $correo);
            /*header("Location: ./index.php?controller=ClientesController&action=index");*/
        } else {
            include './views/clientes/alta.php';
        }
    }

    public function reporte() {
        $cantidad = $_POST['cantidad'];
        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];
        $clientes = $this->clienteModel->obtenerReporte($cantidad, $fecha1, $fecha2);
       header("Location: ./index.php?controller=ClientesController&action=index");

       echo "
       <style>
          
           body {
               background-image: url('img/fondo_pantalla.png'); 
               background-size: cover; 
               background-repeat: no-repeat; 
               background-position: center; /* Ubica la imagen en el centro */
       }
       
       </style>";
       echo "<br><br><br><br>";
        echo "<h2>Clientes que vieron Peliculas en un periodo de tiempo</h2>";
        echo "<table border='1'>";
        echo "<tr>";

        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Correo</th>";
        
        echo "</tr>";
        foreach ($clientes as $cliente) {
            echo "<tr>";
            echo "<td>" . $cliente['id_cliente'] . "</td>";
            echo "<td>" . $cliente['nombre'] . "</td>";
            echo "<td>" . $cliente['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    }

// Actualizacion de Clientes
    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $this->clienteModel->actualizarCliente($id, $nombre, $correo);
            header("Location: ./index.php?controller=ClientesController&action=index");
        } else {
            $id = $_GET['id'];
            $cliente = $this->clienteModel->obtenerClientePorId($id);
            include './views/clientes/editar.php';
        }
    }

// Baja de Clientes
    public function eliminar() {
        $id = $_GET['id'];
        $this->clienteModel->eliminarCliente($id);
        header("Location: ./index.php?controller=ClientesController&action=index");
    }
}

?>
