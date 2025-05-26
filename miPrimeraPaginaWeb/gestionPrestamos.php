<?php
include 'conexion.php';

function obtenerPrestamosRecientes() {
    global $conexion;
    
    $stmt = $conexion->prepare("SELECT * FROM `usuario` WHERE rol = 'Cliente'");
    
    $stmt->execute();
    $prestamos = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    
    return $prestamos;
}

/*function formatearFecha($fecha) {
    return date('d - F - Y', strtotime($fecha));
}

function determinarClaseEstado($estado) {
    return $estado == 'al día' ? 'verde' : 'rojo';
}*/

// Obtener datos para la vista
$prestamos = obtenerPrestamosRecientes();
?>