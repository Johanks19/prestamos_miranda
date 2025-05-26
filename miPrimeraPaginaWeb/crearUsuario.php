<?php

include 'conexion.php';
echo("Entrooooo");
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellido'];
$email=$_POST['email'];
$cedula=$_POST['cedula'];
$rol="Usuario";


$sql = "INSERT INTO usuario (nombre, apelldio, cedula, correo, rol) 
        VALUES (?, ?, ?, ?, ?)";

$sentencia = $conexion->prepare($sql);
$sentencia->bind_param("ssiss", $nombre, $apellidos, $cedula, $email, $rol);
//$sentencia->execute();

// Verificar si la preparación fue exitosa
        if(!$sentencia) {
                die("Error al preparar la consulta: " . $conexion->error);
        }

    // Vincular parámetros (nota el tipo de datos "sssss" para cada campo)
        $sentencia->bind_param("ssiss", $nombre, $apellidos, $cedula, $email, $rol);

    // Ejecutar y verificar
        if($sentencia->execute()) {
        // Verificar cuántas filas fueron afectadas
        if($sentencia->affected_rows > 0) {
                echo("Entro");
                header("Location: nuevoPrestamo.html");
        exit();
        } else {
                die("No se insertaron registros. ¿El usuario ya existe?");
        }
        } else {
                die("Error al ejecutar la consulta: " . $sentencia->error);
        }


// Liberar recursos
$stmt->close(); // Cerrar la declaración preparada
$conexion->close();
?>


?>