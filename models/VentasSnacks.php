<?php

require_once './models/Conexion.php';

class VentasSnacks {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function registrarVenta($id_cliente, $fecha_hora, $cantidad, $producto, $costo_unitario, $total) {
        $query = "INSERT INTO venta_snack (id_cliente, fecha_hora, cantidad, producto, costo_unitario, total) 
                  VALUES ('$id_cliente', '$fecha_hora', '$cantidad', '$producto', '$costo_unitario', '$total')";
        return $this->conexion->conectar()->query($query);
    }

    public function obtenerVentas() {
        $query = "SELECT * FROM venta_snack";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerVentaPorId($id_venta_snack) {
        $query = "SELECT * FROM venta_snack WHERE id_venta_snack = $id_venta_snack";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_assoc();
    }

    public function eliminarVenta($id_venta) {
        $query = "DELETE FROM venta_snack WHERE id_venta = $id_venta";
        return $this->conexion->conectar()->query($query);
    }

    public function obtenerVentasDiarias() {
        // Obtener la fecha actual
        $fecha_actual = date('Y-m-d');
    
        // Consulta SQL para obtener las ventas diarias
        $query = "SELECT SUM(total) AS total_ventas 
        FROM venta_snack
        WHERE DATE(fecha_hora) = '$fecha_actual'"; // Filtrar por la fecha actual
    
        $resultado = $this->conexion->conectar()->query($query);
    
        // Verificar si se obtuvieron resultados
        if ($resultado->num_rows > 0) {
            // Obtener el resultado como un arreglo asociativo
            $ventas_diarias = $resultado->fetch_assoc();
            return $ventas_diarias;
        } else {
            // Si no hay ventas para el día actual, retornar un arreglo vacío
            return [];
        }
    }
    public function obtenerProductosMasVendidos($fechaInicio, $fechaFin) {
        $query = "SELECT producto, SUM(cantidad) AS cantidad 
                  FROM venta_snack 
                  WHERE fecha_hora BETWEEN '$fechaInicio' AND '$fechaFin' 
                  GROUP BY producto 
                  ORDER BY SUM(cantidad) DESC 
                  LIMIT 5";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    
    public function obtenerVentasPorRangoFechas($fechaInicio, $fechaFin) {
        $query = "SELECT * FROM venta_snack
                  WHERE fecha_hora BETWEEN '$fechaInicio' AND '$fechaFin'";
        $resultado = $this->conexion->conectar()->query($query);
        $ventasPorFecha = $resultado->fetch_all(MYSQLI_ASSOC);
        return $ventasPorFecha;
    }
}    

?>
