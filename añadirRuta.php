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

    <h2> Añadir una ruta nueva </h2>
    
    <label for='id'></label>
    <input type="hidden" id = "id" name="id" value="<?php echo $id; ?>"/>
    
    <div class='form-row-nombre'>
      <label for='nombre'>Nombre</label>
      <input  name="nombre" id="nombre" type="text" placeholder="Nombre de la ruta" value=""/>
    </div>
    
    <div class='form-row-descripcion'>
      <label for='descripcion'>Descripcion</label>
      <textarea name="descripcion" id="descripcion" placeholder="Descripcion de la ruta"></textarea>
    </div>
    
    <input type="submit" class='boton-añadir' name="submit" value="Añadir">
    <input type="button" class = "boton-atras" value="Atrás" onclick="history.back()">
  </div>
</form>

<?php
  if (isset($_POST['submit'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
      
    // check that firstname/lastname fields are both filled in
     if ($nombre == '' || $descripcion == '') {
       // generate error message
       $error = 'Rellena todos los campos, por favor.';
     } else {
  
       $con = mysqli_connect("91.121.86.72","dgppractica","dgp12345","dgp");
       
       // Insertar el nombre de la ruta
       mysqli_query ($con, "INSERT INTO Ruta (id, nombre) VALUES ('0', '$nombre')")
       or die(mysqli_error($con));
       
       $resultado = mysqli_query ($con, "SELECT id FROM Ruta WHERE nombre='$nombre'");
       $fila = mysqli_fetch_assoc($resultado);
       $id = $fila['id'];
       
       echo "<div class='form-mod'> ID de la rutina insertada: " . $id . "<div>";

       mysqli_query ($con, "INSERT INTO DescripcionRuta (ruta, idioma, descripcion) VALUES ($id, 0, '$descripcion')")
       or die(mysqli_error($con));
       
       // Insertar la descripcion de la ruta
       header("Location: gestionRutas.php");
       exit;
     }
  }
  ?>