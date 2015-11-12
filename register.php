<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>


<?php

if(isset($_POST["register"])){


	if(!empty($_POST['name']) && !empty($_POST['last_name']) && !empty($_POST['type']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['Rpassword'])) {
	
		$name=$_POST['name'];
		$last_name=$_POST['last_name'];
		$type=$_POST['type'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$Rpassword=$_POST['Rpassword'];


		$query=mysql_query("SELECT * FROM userlitdb WHERE username='".$username."'");
		$numrows=mysql_num_rows($query);
	
		if($numrows==0) {
			if ($password == $Rpassword){
				$sql="INSERT INTO userlitdb
					(name, last_name, type, email, username,password) 
					VALUES('$name','$last_name','$type','$email', '$username', '$password')";

				$result=mysql_query($sql);


				if($result){
	 				$message = "Cuenta Correctamente Creada";
				} else {
	 				$message = "Error al ingresar datos de la informacion!";
				}
			} else {
				$message = "No coinciden las contraseñas!";
			}

		} else {
	 	$message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
	}

} else {
	 $message = "Todos los campos no deben de estar vacios!";
}
}

?>


<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
	
<div class="container mregister">
			<div id="login">
	<h1>Registro de Usuarios</h1>
<form name="registerform" id="registerform" action="register.php" method="post">

	<p>
		<label for="user_login">Nombre<br />
		<input type="text" name="name" id="name" class="input" size="32" value=""  /></label>
	</p>
    
    <p>
		<label for="user_login">Apellidos<br />
		<input type="text" name="last_name" id="last_name" class="input" size="32" value=""  /></label>
	</p>
	
    <p>        
        <label for="userlogin">Tipo de usuario</label> <br/>
			<select id="so" name="type">
  				<option value="" selected="selected">- Selecciona Tipo de Usuario -</option>
  				<option value="admin">Administrador</option>
  				<option value="tutor">Tutor</option>
                <option value="familia">Famlia</option>
                <option value="personaDown">Persona Down</option>
			</select>
        </label>
	</p>
	
	<p>
		<label for="user_pass">E-mail<br />
		<input type="email" name="email" id="email" class="input" value="" size="32" /></label>
	</p>
	
	<p>
		<label for="user_pass">Nombre De Usuario<br />
		<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
	</p>
	
	<p>
		<label for="user_pass">Contraseña<br />
		<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
	</p>	
    
    <p>
		<label for="user_pass">Repetir Contraseña<br />
		<input type="password" name="Rpassword" id="Rpassword" class="input" value="" size="32" /></label>
	</p>

		<p class="submit">
		<input type="submit" name="register" id="register" class="button" value="Registrar" />
	</p>
	
	<p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
</form>
	
	</div>
	</div>
	
	
	
	<?php include("includes/footer.php"); ?>