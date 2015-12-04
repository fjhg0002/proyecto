<?php include("includes/header.php"); ?>

<h1>Down Progress, sistema de monitorización individualizada para el seguimiento del desarrollo de personas con Síndrome de Down.</h1>
<div id="login">
		   <h2>Logueo</h2>
					  <form name="loginform" id="loginform" action="index.php" method="POST">
					  <p>
					  <label for="user_login">Nombre De Usuario<br />
					  <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
					  </p>
					  <p>
					  <label for="user_pass">Contraseña<br />
					  <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
					  </p>
					  <p class="submit">
					  <input type="submit" id="button" name="login" class="button" value="Entrar" />
					  </p>
					  <p class="regtext">
					  ¿No estas registrado? <a href="register.php" >¡Registrate Aquí</a>!
					  </p>
					  </form>
</div>
	
	<?php include("includes/footer.php"); ?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	