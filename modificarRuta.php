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
  $id_ruta = $_GET['id'];
  $con = mysqli_connect("localhost","root","","sombrilla");
  $sql = "SELECT nombre, descripcion FROM  Ruta, DescripcionRuta WHERE Ruta.id = $id_ruta and Ruta.id = DescripcionRuta.ruta and idioma = '0'";
  $resultado = mysqli_query ($con, $sql);
  $fila = mysqli_fetch_assoc($resultado);
?>

<form class ="mod-form" id="user-form" action='' method='post' accept-charset='UTF-8'>
  <div class = 'form-mod'>
    
    <h2> Modificar una ruta </h2>
    <label for='id'></label>
    <input type="hidden" id ="id" name="id" value="<?php echo $id_ruta; ?>"/>
    
    <div class='form-row-nombre'>
      <label for='nombre'>Nombre</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']?>"/>
    </div>

    <div class='form-row-descripcion'>
      <label for='descripcion'>Descripcion</label>
      <input type="text" id="descripcion" name="descripcion" value="<?php echo $fila['descripcion']?>"/>
    </div>

    <table class = 'tabla-ruta'>
      <thead>
      <tr>
        <th>id </th>
        <th>Parada</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Orden</th>
        <th></th>
      </tr>
      </thead>
      
    <?php
      // Busqueda de las paradas de una ruta
      $sql = "SELECT * FROM  ruta, pertenece, parada WHERE ruta.id = pertenece.id_ruta and ruta.id = $id_ruta and pertenece.id_parada = parada.id";
      $resultado = mysqli_query ($con, $sql);
      $num_filas = mysqli_affected_rows($con);

      if ($num_filas > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "<tbody>";
          echo "<tr>";
          echo "<td>" . $fila['id'] . "</td>";
          echo "<td>" . $fila['nombre'] . "</td>";
          echo "<td>" . $fila['latitud'] . "</td>";
          echo "<td>" . $fila['longitud'] . "</td>";
          echo "<td>" . $fila['orden'] . "</td>";
          echo "<td><a href=\"eliminarLugarParada.php?id_parada=" . $fila['id'] . "&id_ruta=$id_ruta\"> <button class =\"boton-eliminar\" type=\"button\"> Eliminar de la ruta </button> </a></td>";
          echo "</tr>";
          echo "</tbody>";
        }
      }
      echo "</table>";
    ?>
      
      <input type="submit" class="boton-modificar-form" name="submit" value="Modificar Ruta">
      <input type="button" class = "boton-atras" value="Atrás" onclick="history.back()">
    </div>
</form>

<?php
  if (isset($_POST['submit'])) {
    // confirm that the 'id' value is a valid integer before getting the form data
    if (is_numeric($_POST['id'])) {
      // get form data, making sure it is valid
      $id = $_POST['id'];
      $ruta = htmlspecialchars($_POST['nombre']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
      
      // check that firstname/lastname fields are both filled in
      if ($ruta == '' || $descripcion == '') {
        // generate error message
        $error = 'ERROR: Please fill in all required fields!';
      } else {
        mysqli_query ($con, "UPDATE Ruta SET nombre='$ruta' WHERE id='$id'")
        or die(mysqli_error($con));
        mysqli_query ($con, "UPDATE DescripcionRuta SET descripcion='$descripcion' WHERE ruta='$id' and idioma='0'")
        or die(mysqli_error($con));
        header("Location: modificarRuta.php?id=$id");
      }
    } else {
      // if the 'id' isn't valid, display an error
      echo 'Error!';
    }
  }
  
 
?>

</body>
</html>