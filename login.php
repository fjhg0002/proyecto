<?php include("includes/header.php"); ?>

<img src="http://localhost/downprogress/proyecto/img/logo.jpg" style="float:left" margin="10px" width="800px" height="400px" alt="descripcion de la imagen">
<h1 align="center">Down Progress, sistema de monitorización individualizada para el seguimiento del desarrollo de personas con Síndrome de Down.</h1>
<div id="login">
		   <h2 align="right">Logueo</h2>
					  <form name="loginform" id="loginform" action="index.php" method="POST">
					  <p margin="1000px" align="right">
					  <label for="user_login">Nombre De Usuario<br />
					  <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
					  </p>
					  <p margin="1000px" align="right">
					  <label for="user_pass">Contraseña<br />
					  <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
					  </p>
					  <p margin="1000px" align="right" class="submit">
					  <input type="submit" id="button" name="login" class="button" value="Entrar" />
					  </p>
					  </form>
</div>
	
	<?php include("includes/footer.php"); ?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	