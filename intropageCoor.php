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

<div class="container mregister">
	<div id="nuevoCuestionario" style="display: none">
	<h1>Creación de Cuestionarios</h1>
<form name="registerform" id="registerform" action="intropageAdmin.php" method="post">

<label>Nombre:<br />
 <input type="text" name="name" id="name" class value=""><br><br>

<p class ="submit">
	<input type="button"name="button" value="Nueva Sección" onclick="nuevaSeccion()"><br><br>
</p>

<p class="submit"> <input type="submit" name="register" id="newCuestionario" class="button" value="Añadir Pregunta" /> </p><br><br>


<?php
$seccion=getTodasLasSecciones();
require('vista.php');
?>	
	
</table><br><br>
<p class="submit"
<input type="submit" name="register" id="nuevoCuestionario" class="button" value="Añadir Cuestionario" />
</p>

</form>
 </div>

</div>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>


<div class="container mregister">
<div id="nuevaSeccion"  style="display: none">
<h1>Nueva Sección</h1>
<form name="registerform" id="registerform" action="intropageAdmin.php" method="post">

<label>Nombre Sección:<br />
 <input type="text" name="name" id="name" class value=""><br><br>

<label for="Subseccion">Subsecciones:<br />

<input type="checkbox" name="subseccion" value=" 0-1 año">0-1 año<br>
<input type="checkbox" name="subseccion" value=" 1-2 años">1-2 años<br>
<input type="checkbox" name="subseccion" value=" 2-3 años">2-3 años<br>
<input type="checkbox" name="subseccion" value=" 3-4 años">3-4 años<br>
<input type="checkbox" name="subseccion" value=" 4-5 años">4-5 años<br>
<input type="checkbox" name="subseccion" value=" 5-6 años">5-6 años<br>


<p class="submit">
	<input type="submit" name="NewSeccion" id="NewSubseccion" class="button" value="Añadir Subseccion" />
</p>

<input type="submit" name="register" id="quitarSubseccion" class="button" value="Quitar Subsección" />

<table border=1 cellspacing=0 cellpadding=2>
	<tr><td>Subsecciones</td></tr>
	<tr><td>5 a 6 años</td></tr>
	<tr><td>2 a 3 años</td></tr>

</table>

</form>
</div>
</div>
</div>

<script type="text/javascript">
function seleccion(valor){
alert('Se seleccionó el valor: '+valor);
}
</script>




<?php include("includes/footer.php"); ?>

<?php
}
?>
