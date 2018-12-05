<?php
  session_set_cookie_params(0);
  session_start();
  
  function login() {
    
    $con=mysqli_connect("localhost","root","","sombrilla");
  
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $username = $_POST['usuario'];
    $sql = "SELECT * FROM usuario WHERE nombre = '$username'";
		$resultado = mysqli_query ($con, $sql);
		$num_filas = mysqli_affected_rows($con);

		if ($num_filas > 0) {
      $num_filas = mysqli_fetch_assoc($resultado);
      
			if ($_POST['password'] === $num_filas['contrasena']) {
        $_SESSION["id_usuario"] = $_POST['usuario'];
				header("Location: gestionInicio.php");
			} else {
        header("Location: index.php");
			}
		} else {
      header("Location: index.php");
      mysqli_close($con);
    }
	}
  
  if (isset($_POST['usuario']) && isset($_POST['password'])) {
    login();
  }
?>