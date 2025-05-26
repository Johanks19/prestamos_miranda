<?php

require'gestionPrestamos.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Control | Préstamos Miranda</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

  <header class="barra-navegacion">
    <div class="logo">
      <img src="logo.png" alt="Logo">
      <span>Préstamos Miranda</span>
    </div>
    <nav>
      <a href="#">Inicio</a>
      <a href="#">Préstamos</a>
      <a href="#">Clientes</a>
      <a href="#">Reportes</a>
      <img src="usuario.png" alt="Perfil" class="icono-usuario">
    </nav>
  </header>

  <main class="contenido-dashboard">

    <section class="resumen">
      <div class="tarjeta">
        <p>Capital Total</p>
        <h2>$125.000</h2>
        <small>+12.5% vs mes anterior</small>
      </div>
      <div class="tarjeta">
        <p>Préstamos activos</p>
        <h2>32</h2>
        <small>8 nuevos este mes</small>
      </div>
      <div class="tarjeta">
        <p>Ganancia Mensual</p>
        <h2>350.000</h2>
        <small>+7.5% vs mes anterior</small>
      </div>
      <div class="tarjeta">
        <p>Pagos Pendientes</p>
        <h2>9</h2>
        <small>3 menos que ayer</small>
      </div>
    </section>

    <section class="prestamos-recientes">
      <h3>Préstamos Recientes</h3>
        <table>
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Correo</th> <!-- Cambiado de Monto a Correo -->
      <th>Estado</th>
      <th>Próximo Pago</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($prestamos as $prestamo): ?>
    <tr>
      <td><?= htmlspecialchars($prestamo['nombre'].' '.$prestamo['apelldio']) ?></td>
      <td><?= htmlspecialchars($prestamo['correo']) ?></td> <!-- Mostrar correo como texto -->
      <td>
        <span class="estado <?= $prestamo['rol'] == 'al día' ? 'verde' : 'rojo' ?>">
          <?= ucfirst($prestamo['estado']) ?>
        </span>
      </td>
      <!-- <td><?= date('d - F - Y', strtotime($prestamo['proximo_pago'])) ?></td> -->
      <td>
        <a href="detalle_prestamo.php?id=<?= $prestamo['id'] ?>" class="accion">Ver</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
          <tr>
            <td>Carlos Rodríguez</td>
            <td>$5,000,000</td>
            <td><span class="estado verde">Al día</span></td>
            <td>15 - Marzo - 2025</td>
            <td>...</td>
          </tr>
          <tr>
            <td>Ana Martínez</td>
            <td>$3,500,000</td>
            <td><span class="estado rojo">Atrasado</span></td>
            <td>20 - Marzo - 2025</td>
            <td>...</td>
          </tr>
        </tbody>
      </table>
      <button class="boton-negro">+ NUEVO PRÉSTAMO</button>
      <button class="boton" onclick="location.href='registro.html'" >+ REGISTRAR CLIENTE </button>
    </section>

    <section class="graficos">
      <div class="grafico">Gráfico de Flujo de Capital</div>
      <div class="grafico">Gráfico de Estado de Préstamos</div>
    </section>

  </main>

  <footer class="pie">
    <span>🛈 Ayuda</span>
    <span>⚙ Configuración</span>
  </footer>

  <?php
// Cerrar conexión (opcional, se puede hacer en logica_prestamos.php)
$conexion->close();
?>

</body>
</html>
