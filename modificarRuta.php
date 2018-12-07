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

<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
  <p>
    <label>TempID:
      <input type="text" name="TempID" value="<?php echo $fila['id']?>"></label>
  </p>
  <p>
    <label>Name:
      <input type="text" name="Name" value="<?php echo $fila['Nombre']?>"></label>
  </p>
  <p>
    <label>CountryCode:
      <input type="text" name="CountryCode" value="<?php echo $fila['CountryCode']?>"></label>
  </p>
  <p>
    <label>Budget:
      <input type="text" name="Budget" value="<?php echo $fila['Budget']?>"></label>
  </p>
  <p>
    <label>Used:
      <input type="text" name="Used" value="<?php echo $fila['Used']?>"></label>
  </p>
  <p>
    <input type="submit" name="submit" value="Submit">
  </p>
</form>

</body>
</html>
