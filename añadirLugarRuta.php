<?php
  
  $con = mysqli_connect("91.121.86.72","dgppractica","dgp12345","dgp");
  $id_ruta = $_GET['id_ruta'];
  $id_parada = $_GET['id_parada'];
  $orden = $_GET['orden'];
  
  // check if the 'id' variable is set in URL, and check that it is valid
  if (isset($_GET['id_ruta']) && is_numeric($_GET['id']) && ($_GET['id_parada']) && is_numeric($_GET['id_parada'])) {
    // get id value
    $id_ruta = $_GET['id_ruta'];
    $id_parada = $_GET['id_parada'];
  
    $con = mysqli_connect("91.121.86.72","dgppractica","dgp12345","dgp");
  
    mysqli_query ($con, "INSERT INTO Pertenece (id_ruta, id_parada, orden) VALUES ('$id_ruta', '$id_parada', '$orden')")
    or die(mysqli_error($con));
    
    // redirect back to the view page
    header("Location: gestionLugares.php");
    exit;
  } else {
    header("Location: gestionLugares.php");
    exit;
  }
?>