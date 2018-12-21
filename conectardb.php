<?php
  $enlace = mysqli_connect("91.121.86.72","dgppractica","dgp12345","dgp");
  
  if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }
  
  echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
  echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;
  
  $result = mysqli_query ($enlace, "SELECT * FROM Usuario WHERE nombre = 'admin'");
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo json_encode($row);
    }
  } else {
    echo "0 results";
  }
  
  echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
  echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;
  
  mysqli_close($enlace);
?>