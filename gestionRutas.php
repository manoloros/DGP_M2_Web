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
  $sql = "SELECT * FROM ruta ORDER BY id DESC";
  $resultado = mysqli_query ($con, $sql);
  $num_filas = mysqli_affected_rows($con);
  
  echo "<table>
  <tr>
    <th>Nombre de la Ruta</th>
    <th>ID</th>
    <th>Numeros de Paradas</th>
  </tr>";
  
  if ($num_filas > 0) {
    while($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tr>";
      echo "<td>" . $fila['nombre'] . "</td>";
      echo "<td>" . $fila['id'] . "</td>";
      echo "</tr>";
    }
  }
  
  echo "</table>";
?>
</body>
</html>
