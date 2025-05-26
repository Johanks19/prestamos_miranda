<?php
include 'conexion.php';

$correo = $_POST['correo'];
$clave = $_POST['clave'];

// Consulta preparada para evitar inyección SQL
$stmt = $conexion->prepare("SELECT * FROM usuario WHERE correo = ? AND contraseña = ? AND rol = 'Prestamista'");
$stmt->bind_param("ss", $correo, $clave);
$stmt->execute();
$resultado = $stmt->get_result();
$filas = $resultado->num_rows;

// Elimina estas líneas redundantes que causan el error:
// $resultado = $conexion->query($sql);
// $filas = $resultado->num_rows;

if($filas > 0){
    header("Location: dashboard.html");
    exit(); 
} else {
    include("login.html");
    echo '<h1 class="bad">ERROR EN LA AUTENTICACION</h1>';
}

// Liberar recursos
$resultado->free();
$stmt->close(); // Cerrar la declaración preparada
$conexion->close();
?>