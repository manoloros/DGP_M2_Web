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
  <div class="login-page">
    <div class="form">
      <form class ="login-form" action='login.php' id = 'formulario' method='post' accept-charset='UTF-8'>
        <fieldset>
          <legend>Login</legend>
          <input type='hidden' name='submitted' value='1'/>

          <label for='username' > Usuario:</label>
          <input type='text' name='usuario' maxlength="15" />

          <label for='password' >Contraseña:</label>
          <input type='password' name='password' maxlength="15" />

          <input type='submit' name='Submit' value='Login' />
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>
