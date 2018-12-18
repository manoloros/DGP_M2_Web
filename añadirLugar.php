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

<form class ="mod-form" action='' method='post' accept-charset='UTF-8'>
  <div class = 'form-mod'>

    <h2> Añadir un lugar nuevo </h2>

    <label for='id'></label>
    <input type="hidden" id = "id" name="id" value="<?php echo $id; ?>"/>

    <div class='form-row-nombre'>
      <label for='nombre'>Nombre</label>
      <input  name="nombre" id="nombre" type="text" placeholder="Nombre de la parada" value=""/>
    </div>

    <div class='form-row-nombre'>
      <label for='nombre'>Latitud</label>
      <input type="text" id="latitud" name="latitud" placeholder="Latitud" value=""/>
    </div>

    <div class='form-row-nombre'>
      <label for='nombre'>Longitud</label>
      <input type="text" id="longitud" name="longitud" placeholder="Longitud" value=""/>
    </div>

    <div class='form-row-descripcion'>
      <label for='descripcion'>Descripcion</label>
      <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion de la parada"/>
    </div>

    <input type="submit" class='boton-añadir' name="submit" value="Añadir">

  </div>
</form>

<?php
  if (isset($_POST['submit'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $latitud = htmlspecialchars($_POST['latitud']);
    $longitud = htmlspecialchars($_POST['longitud']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    
    // check that firstname/lastname fields are both filled in
    if ($nombre == '' || $latitud == '' || $longitud == '' || $descripcion == '') {
      // generate error message
      $error = 'ERROR: Please fill in all required fields!';
    } else {
      
      $con = mysqli_connect("localhost","root","","sombrilla");
      
      // Insertar el nombre de la ruta
      mysqli_query ($con, "INSERT INTO parada (id, nombre, latitud, longitud) VALUES ('0', '$nombre', '$latitud','$longitud')")
      or die(mysqli_error($con));
      
      $resultado = mysqli_query ($con, "SELECT id FROM parada WHERE nombre='$nombre'");
      $fila = mysqli_fetch_assoc($resultado);
      $id = $fila['id'];
      
      echo "<div class='form-mod'> ID de la parada insertada: " . $id . "<div>";
      
      mysqli_query ($con, "INSERT INTO descripcionparada (parada, idioma, descripcion) VALUES ($id, '0', '$descripcion')")
      or die(mysqli_error($con));
      
      // Insertar la descripcion de la ruta
      header("Location: gestionLugares.php");
    }
  }
?>