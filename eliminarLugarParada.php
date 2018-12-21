
<?php
  $con = mysqli_connect("91.121.86.72","dgppractica","dgp12345","dgp");
  
  // check if the 'id' variable is set in URL, and check that it is valid
  if (isset($_GET['id_ruta']) && is_numeric($_GET['id_parada'])) {
    // get id value
    $id_ruta = $_GET['id_ruta'];
    $id_parada = $_GET['id_parada'];
    // delete the entry
    $result = mysqli_query($con, "DELETE FROM Pertenece WHERE id_parada=$id_parada and id_ruta=$id_ruta")
    or die(mysqli_error($con));
    header("Location: modificarRuta.php?id=" . $id_ruta);
    exit;
  }
?>


