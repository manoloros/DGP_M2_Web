<html>
<head>
  <title>
  </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen"/>
  <script type="text/javascript" src="scripts/scripts.js"></script>
</head>
<header>
  <div class="container">
    <nav>
      <a href="gestionInicio.php">Inicio</a>
      <a href="gestionLugares.php">Lugares</a>
      <a href="gestionRutas.php">Rutas</a>
      <a href="Contacto.php">Contacto</a>
      <?php
        if(isset($_SESSION["id_usuario"])) {
          echo "<a Logueado como: $_SESSION[id_usuario] <button href='logout.php'> Logout </button></a>";
        } ?>
    </nav>
  </div>
</header>
</html>