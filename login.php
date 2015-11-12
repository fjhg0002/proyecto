<?php include("includes/header.php"); ?>

 <div class="container mlogin">
            <div id="login">
    <h1>Logueo</h1>
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
        <input type="submit" name="login" class="button" value="Entrar" />
    </p>
        <p class="regtext">¿No estas registrado? <a href="register.php" >¡Registrate Aquí</a>!</p>
</form>

    </div>

    </div>
	
	<?php include("includes/footer.php"); ?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	