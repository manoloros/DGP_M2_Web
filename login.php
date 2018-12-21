<?php

  
  function login() {
  
    $con = new mysqli("localhost", "dgppractica", "dgp12345","dgp");
  
    // Check connection
    if ($con->connect_error)
    {
      echo "Failed to connect to MySQL: " . $con->connect_error;
    }
    
    $username = $_POST['usuario'];
    $sql = "SELECT * FROM usuario WHERE nombre = '$username'";
		$resultado = mysqli_query ($con, $sql);
		$fila = mysqli_affected_rows($con);

		if ($fila > 0) {
      $fila = mysqli_fetch_assoc($resultado);
      
			if ($_POST['password'] === $fila['contrasena']) {
        
        $_SESSION["id_usuario"] = $_POST['usuario'];
				header("Location: gestionInicio.php");
        exit;
				exit;
			} else {
        header("Location: index.php");
        exit;
        exit;
			}
		} else {
      header("Location: index.php");
      exit;
      mysqli_close($con);
    }
	}
  
  if (isset($_POST['usuario']) && isset($_POST['password'])) {
    login();
  }
  
  session_start();
?>
