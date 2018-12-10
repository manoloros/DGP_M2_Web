<?php
  
  /*
  eliminarRuta.PHP
  Deletes a specific entry from the 'Ruta' table
  */
  
  $con = mysqli_connect("localhost","root","","sombrilla");
  $id = $_GET['id'];
  
  // check if the 'id' variable is set in URL, and check that it is valid
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // get id value
    $id = $_GET['id'];
    // delete the entry
    $result = mysqli_query($con, "DELETE FROM Ruta WHERE Ruta.id=$id")
    or die(mysqli_error($con));

    // redirect back to the view page
    header("Location: gestionRuta.php");
  } else {
    header("Location: gestionRuta.php");
  }
?>
