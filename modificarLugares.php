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
  $sql = "SELECT * FROM ruta ORDER BY id ASC";
  $resultado = mysqli_query ($con, $sql);
  $num_filas = mysqli_affected_rows($con);
?>


</body>
</html>
