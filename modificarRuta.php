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
  $id = $_GET['id'];
  $con=mysqli_connect("localhost","root","","sombrilla");
  $sql = "SELECT nombre, descripcion FROM  Ruta, DescripcionRuta WHERE Ruta.id = $id";
  $resultado = mysqli_query ($con, $sql);
  $fila = mysqli_fetch_assoc($resultado);
?>

<div class = 'formulario'>
  
  <p> ID: <?php echo $_GET['id'];?> </p>

  <p> Nombre: <?php echo $fila['nombre']?> </p>

  <p> Descripcion: <?php echo $fila['descripcion']?> </p>

</div>


</body>
</html>