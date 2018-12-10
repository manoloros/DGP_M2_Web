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
  require("php/construyeCabecera.php");
?>

<?php
  $con=mysqli_connect("localhost","root","","sombrilla");
  $sql = "SELECT * FROM ruta ORDER BY id ASC";
  $resultado = mysqli_query ($con, $sql);
  $num_filas = mysqli_affected_rows($con);
?>
<div class ="cuadro-tabla">
  <a href=añadirRuta.php> <button class = "boton-añadir" type="button"> Añadir Ruta Nueva </button> </a>
  <p></p>

  <table class = 'tabla-ruta'>
    <thead>
    <tr>
      <th>id</th>
      <th>Nombre de la Ruta</th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    
    <?php
      if ($num_filas > 0) {
        while($fila = mysqli_fetch_assoc($resultado)) {
          echo "<tbody>";
          echo "<tr>";
          echo "<td>" . $fila['id'] . "</td>";
          echo "<td>" . $fila['nombre'] . "</td>";
          echo "<td><a href=\"modificarRuta.php?id=" . $fila['id'] . "\"> <button class =\"boton-modificar\" type=\"button\"> Modificar </button> </a></td>";
          echo "<td><a href=\"eliminarRuta.php?id=" . $fila['id'] . "\"> <button class =\"boton-eliminar\" type=\"button\"> Eliminar </button> </a></td>";
          echo "</tr>";
          echo "</tbody>";
        }
      }
      
      echo "</table>";
    ?>
</div>
</body>
</html>
