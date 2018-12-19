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

<?php
  $id_parada = $_GET['id'];
  $con = mysqli_connect("localhost","root","","sombrilla");
  $sql = "SELECT * FROM  parada, descripcionparada WHERE parada.id = $id_parada and parada.id = descripcionparada.parada and idioma ='0'";
  $resultado = mysqli_query ($con, $sql);
  $fila = mysqli_fetch_assoc($resultado);
?>

<form class ="mod-form" id="user-form" action='' method='post' accept-charset='UTF-8'>
  <div class = 'form-mod'>

    <h2> Modificar un lugar </h2>
    <label for='id'></label>
    <input type="hidden" id ="id" name="id" value="<?php echo $id_parada; ?>"/>

    <div class='form-row-nombre'>
      <label for='nombre'>Nombre</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']?>"/>
    </div>

    <div class='form-row-nombre'>
      <label for='nombre'>Latitud</label>
      <input type="text" id="latitud" name="latitud" value="<?php echo $fila['latitud']?>"/>
    </div>

    <div class='form-row-nombre'>
      <label for='nombre'>Longitud</label>
      <input type="text" id="longitud" name="longitud" value="<?php echo $fila['longitud']?>"/>
    </div>

    <div class='form-row-descripcion'>
      <label for='nombre'>Descripcion</label>
      <textarea name="descripcion" id="descripcion" placeholder="Descripcion de la parada"><?php echo $fila['descripcion']?></textarea>
    </div>

    <input type="submit" class="boton-modificar-form" name="submit" value="Modificar Lugar">
    <input type="button" class = "boton-atras" value="Atrás" onclick="history.back()">
    
  </div>
</form>

<?php
  if (isset($_POST['submit'])) {
    // confirm that the 'id' value is a valid integer before getting the form data
    if (is_numeric($_POST['id'])) {
      // get form data, making sure it is valid
      $id_parada = $_POST['id'];
      $parada = htmlspecialchars($_POST['nombre']);
      $latitud = htmlspecialchars($_POST['latitud']);
      $longitud = htmlspecialchars($_POST['longitud']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
      
      // check that firstname/lastname fields are both filled in
      if ($parada == '' || $latitud == '' || $longitud == '' || $descripcion == '') {
        // generate error message
        $error = 'Rellena todos los campos, por favor.';
        echo "<div class='form-mod'><div class='mensaje-error'> $error </div></div>";
      } else {
        mysqli_query ($con, "UPDATE parada SET nombre='$parada' WHERE id='$id_parada'")
        or die(mysqli_error($con));
        mysqli_query ($con, "UPDATE parada SET latitud='$latitud' WHERE id='$id_parada'")
        or die(mysqli_error($con));
        mysqli_query ($con, "UPDATE parada SET longitud='$longitud' WHERE id='$id_parada'")
        or die(mysqli_error($con));
        mysqli_query ($con, "UPDATE descripcionparada SET descripcion='$descripcion' WHERE parada='$id_parada' and idioma='0'")
        or die(mysqli_error($con));
        
        header("Location: modificarLugar.php?id=$id_parada");
        exit;
      }
    } else {
      // if the 'id' isn't valid, display an error
      echo 'Ha surgido un error inesperado.';
    }
  }
  
?>

</body>
</html>