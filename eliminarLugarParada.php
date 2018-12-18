<?php
  $con = mysqli_connect("localhost","root","","sombrilla");
  $id_ruta = $_GET['id_ruta'];
  $id_parada = $_GET['id_parada'];
  
  // check if the 'id' variable is set in URL, and check that it is valid
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // get id value
    $id = $_GET['id'];
    // delete the entry
    $result = mysqli_query($con, "DELETE FROM AccesibilidadRuta WHERE id_ruta=$id")
    or die(mysqli_error($con));
    
  }
?>
