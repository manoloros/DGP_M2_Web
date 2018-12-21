<?php
  
  $con = mysqli_connect("91.121.86.72","dgppractica","dgp12345","dgp");
  $id = $_GET['id'];
  
  // check if the 'id' variable is set in URL, and check that it is valid
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // get id value
    $id = $_GET['id'];
    // delete the entry
    $result = mysqli_query($con, "DELETE FROM Pertenece WHERE id_parada = $id")
    or die(mysqli_error($con));
    $result = mysqli_query($con, "DELETE FROM DescripcionParada WHERE parada = $id")
    or die(mysqli_error($con));
    $result = mysqli_query($con, "DELETE FROM HistorialParada WHERE id_parada=$id")
    or die(mysqli_error($con));
    $result = mysqli_query($con, "DELETE FROM AccesibilidadParada WHERE id_parada=$id")
    or die(mysqli_error($con));
    $result = mysqli_query($con, "DELETE FROM ImagenesParada WHERE parada=$id")
    or die(mysqli_error($con));
    $result = mysqli_query($con, "DELETE FROM ValoraParada WHERE parada=$id")
    or die(mysqli_error($con));
    $result = mysqli_query($con, "DELETE FROM Parada WHERE id=$id")
    or die(mysqli_error($con));
    
    // redirect back to the view page
    header("Location: gestionLugares.php");
    exit;
  } else {
    header("Location: gestionLugares.php");
    exit;
  }
?>