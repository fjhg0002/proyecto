<?php
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else { 
?>

<?php require_once("includes/connection.php");

?>

<?php
include("includes/header.php");
include("modelo.php");
?>

<div id="cabecera" >
	<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
    <h2>Está en la sesión de Administrador</h2>
	<p><a href="logout.php">Finalice</a> sesión aquí!</p>
</div>


<div id="menu" >
	<?php
		$cuestionarios=getTodosLosCuestionarios();
		$usuarios=getTodosLosUsuarios();
		require('vistaMenu.php');
	?>	
</div>

<div id="contenido">
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>

	<div>
		<div id="nuevoUsuario" style="display: none;">
			<h1>Registro de Usuarios</h1>
			<form name="registerform" id="registerform" action="intropageCoor.php" method="post">
				<label for="user_login">Nombre:<br />
				<input type="text" name="name" id="name" class value=""><br><br>
				
				<label for="user_login">Apellidos:<br />
				<input type="text" name="last_name" id="last_name" value=""><br><br>
	
				<label for="userlogin">Tipo de usuario:</label> <br/>
									<select id="type" name="type"><br>
									<option value="" selected="selected">- Selecciona Tipo de Usuario -</option>
									<option value="coordinador">Coordinador</option>
									<option value="tutor">Tutor</option>
									<option value="familia">Famlia</option>
									<option value="personaDown">Persona Down</option>
									</select><br><br>
	
				<label for="user_pass">E-mail:<br />
				<input type="email" name="email" id="email" value=""><br><br>
	
				<label for="user_pass">Nombre De Usuario:<br />
				 <input type="text" name="username" id="username" value=""><br><br>
				
				<label for="user_pass">Contraseña:<br />
				<input type="password" name="password" id="password" value=""><br><br>
				
				<label for="user_pass">Repetir Contraseña:<br />
					<input type="password" name="Rpassword" id="Rpassword" value="">
						<p class="submit">
							<input type="submit" name="register" id="register" class="button" value="Añadir Usuario" />
						</p>
			</form>
		</div>

	</div>

	<?php
	require_once("modelo.php");
	registroUsuarios();
	?>

	<div id="nuevoCuestionario" style="display: none">
		<h1>Nuevo Cuestionario</h1>
		<form name="registerform" id="registerform" action="intropageCoor.php" method="post">
	
			<label>Nombre Cuestionario:<br />
			<input type="text" name="nom_Cuest" id="nom_Cuest" class value=""><br><br>
	
	
			<p class ="submit">
				<input type="submit" name="cuest" id="cuest" class="button" value="Añadir Cuestionario" ><br><br>
			</p>  		
	
			<?php if (!empty($messageCuest)) {echo "<p class=\"error\">" . "Mensaje: ". $messageCuest . "</p>";} ?>


			<label>Nueva Sección:<br />
			<input type="text" name="nom_Sec" id="nom_Sec" class value=""><br><br>

			<p class ="submit">
				<input type="button"name="button" value="Añadir Sección a este cuestionario" ><br><br>
			</p>
	
	
			<?php
			require_once("modelo.php");
			$nom_Cuest=añadirCuestionario();
			$nom_Secc=añadirSeccion('nom_Sec');
			?>
			
			<label>Añadir Subsección de las existentes:<br />
			<?php
			$consulta_mysql='select * from subseccion';
			$resultado_consulta_mysql=mysql_query($consulta_mysql);
			echo "<select name='select1'>";
			while($fila=mysql_fetch_array($resultado_consulta_mysql)){
				echo "<option value='".$fila['nom_subseccion']."'>".$fila['nom_subseccion']."</option>";
			}
			echo "</select>";
			?>
			<p class ="submit">
				<input type="button"name="button" value="Añadir Subsección"><br><br>
			</p>

			<label>o si lo prefiere añada una nueva:<br />
			<input type="text" name="nom_Sub" id="nom_Sub" class value=""><br><br>
			<p class ="submit">
				<div id="nuevoCuestionario" style="display: none">
				<input type="button"name="button" value="Añadir nueva Subseccion">
			</p><br><br>
	</div>

	<p class ="submit">
		<input type="button"name="button" value="Nueva Sección" onclick="nuevaSeccion()"><br><br>
	</p>

	<p class="submit"> <input type="submit" name="register" id="newCuestionario" class="button" value="Añadir Pregunta" />
	</p><br><br>


	<br>
	<p class="submit"
	<input type="submit" name="register" id="nuevoCuestionario" class="button" value="Añadir Cuestionario" />
	</p>

	<table border=1 cellspacing=0 cellpadding=2>
	<tr>
		<td>Secciones:</td>
		<td>Subsecciones:</td>
		<td>Preguntas</td>
	</tr>
	<tr>
		<td>Desarrollo Motriz:</td>
		<td>0-1 año</td>
		<td>¿Gatea?</td>
	</tr>
		<tr>
		<td></td>
		<td></td>
		<td>¿Se queda sentado?</td>
	</tr>

	<tr>
		<td></td>
		<td>1-2 años</td>
		<td>¿Anda solo?</td>
	</tr>
	<tr>
		<td>Lenguage:</td>
		<td>3-4 años</td>
		<td>¿Habla?</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>¿Dice las vocales?</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>¿Sabe leér?</td>
	</tr>
	</table>
</form>

	<?php
	$seccion=getTodasLasSecciones();
	require('vista.php');
	?>
</div>

</div>








</div>

<?php include("includes/footer.php"); ?>

<?php
}
?>
