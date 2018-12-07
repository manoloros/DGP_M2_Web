<html>
<head>
  <title>
    GranadaGO
  </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen"/>
  <script type="text/javascript" src="scripts/scripts.js"></script>
</head>
<body>

<?php
  session_set_cookie_params(0);
  session_start();
  require("php/construyeCabecera.php");
?>
  
<?php
  $con=mysqli_connect("localhost","root","","sombrilla");
  $sql = "SELECT * FROM ruta ORDER BY id ASC";
  $resultado = mysqli_query ($con, $sql);
  $num_filas = mysqli_affected_rows($con);
?>

  <table class = 'tabla-ruta'>
  <thead>
  <tr>
    <th>Nombre de la Ruta</th>
    <th>ID</th>
    <th></th>
    <th></th>
  </tr>
  </thead>";
    
    <?php
  if ($num_filas > 0) {
    while($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tbody>";
      echo "<tr>";
      echo "<td>" . $fila['nombre'] . "</td>";
      echo "<td>" . $fila['id'] . "</td>";
      echo "<td><a href=\"modificarRuta.php?id=" . $fila['id'] . "\"> <button type=\"button\"> Modificar </button> </a></td>";
      echo "<td><a href=\"eliminarRuta.php?id=" . $fila['id'] . "\"> <button type=\"button\"> Eliminar </button> </a></td>";
      echo "</tr>";
      echo "</tbody>";
    }
  }
  
  echo "</table>";
?>
</body>
</html>
