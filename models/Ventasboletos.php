<?php

require_once './models/Conexion.php';

class VentasBoletos {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function registrarVenta($id_cliente, $id_pelicula, $id_empleado, $fecha_hora, $cantidad, $sala, $costo, $asiento) {
        $query = "INSERT INTO venta_boletos (id_cliente, id_pelicula, id_empleado, fecha_hora, cantidad, sala, costo, asiento) 
                  VALUES ('$id_cliente', '$id_pelicula', '$id_empleado', '$fecha_hora', '$cantidad', '$sala', '$costo', '$asiento')";
        return $this->conexion->conectar()->query($query);
    }

    public function obtenerVentas() {
        $query = "SELECT * FROM venta_boletos";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerVentaPorId($id_venta) {
        $query = "SELECT * FROM venta_boletos WHERE id_boleto = $id_venta";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_assoc();
    }

    public function eliminarVenta($id_venta) {
        $query = "DELETE FROM venta_boletos WHERE id = $id_venta";
        return $this->conexion->conectar()->query($query);
    }

    public function obtenerVentasDiarias() {
        // Obtener la fecha actual
        $fecha_actual = date('Y-m-d');
    
        // Consulta SQL para obtener las ventas diarias
        $query = "SELECT DATE(fecha_hora) AS fecha_venta, SUM(costo) AS total_ventas 
                  FROM venta_boletos 
                  WHERE DATE(fecha_hora) = '$fecha_actual' 
                  GROUP BY DATE(fecha_hora)";
    
        // Ejecutar la consulta
        $resultado = $this->conexion->conectar()->query($query);
    
        // Verificar si se obtuvieron resultados
        if ($resultado) {
            // Verificar si hay ventas para el día actual
            if (mysqli_num_rows($resultado) > 0) {
                // Obtener el resultado como un arreglo asociativo
                $ventas_diarias = $resultado->fetch_assoc();
                return $ventas_diarias;
            }
        }
    
        // Si no hay ventas para el día actual, retornar un arreglo vacío
        return [];
    }
    
    public function obtenerVentasPorRangoFechas($fechaInicio, $fechaFin) {
        // Consulta SQL para obtener las ventas dentro del rango de fechas
        $query = "SELECT * FROM venta_boletos 
                  WHERE fecha_hora >= '$fechaInicio' AND fecha_hora < DATE_ADD('$fechaFin', INTERVAL 1 DAY)";
        
        // Ejecutar la consulta
        $resultado = $this->conexion->conectar()->query($query);
        
        // Verificar si se obtuvieron resultados
        if ($resultado) {
            // Convertir el resultado en un arreglo asociativo
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
        // Si no se obtienen resultados, retornar un arreglo vacío
        return [];
    }        
}
?>
