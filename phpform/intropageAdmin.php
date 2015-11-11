<?php
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>

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

<script>
	function ocultarTodos() {
        //code
		  document.getElementById("nuevoUsuario").style.display="none";
  document.getElementById("nuevoCuestionario").style.display="none";
  document.getElementById("nuevaSeccion").style.display="none";

    }
function nuevoUsuario() {
	ocultarTodos();
  document.getElementById("nuevoUsuario").style.display="block";
}
</script>

<script>
function nuevoCuestionario() {
	ocultarTodos();
  document.getElementById("nuevoCuestionario").style.display="block";
}
</script>

<script>
function nuevaSeccion() {
	ocultarTodos();
  document.getElementById("nuevaSeccion").style.display="block";
}
</script>

<div id="cabecera" >
	<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
    <h2>Está en la sesión de Administrador</h2>
	<p><a href="logout.php">Finalice</a> sesión aquí!</p>
</div>

<div id="menu" >
<table>
	<tr>
		<td><h2>Cuestionarios</h2></td>
    </tr>
    <tr>
		<td><a href="joven.php">Cuestionario Joven</a></td>
    </tr>
	<tr>
		<td><a href="adulto.php">Cuestionario Adulto</a></td>
    </tr>
	<tr>
		<td><a href="adolescente.php">Cuestionario Adolescente</a></td>
    </tr>
	<tr>
		<td><a href="niño.php">Cuestionario Niño</a></td>
    </tr>
	<tr>
		<td><form>
			<input type="button"name="button" value="Nuevo Cuestionario" onclick="nuevoCuestionario()">
		</form></td>
	</tr>
</table>

<?php
$query=mysql_query("SELECT nom_cuest FROM cuestionario");

while($row = mysql_fetch_array($query)){
echo '<tr><td><a href="/muestra_datos_cuestionario.php?nombre='.$row["nom_cuest"].'">'.$row["nom_cuest"].'</a></td></tr><br>';
}

?>

<input type="button"name="button" value="Nuevo Cuestionario" onclick="nuevoCuestionario()">

    <br>

    <h2>Usuarios</h2>
	<a href="joven.php">Jose Rodriguez</a><br>
    <a href="adolescente.php">María Martinez</a><br>
	<a href="adulto.php">Juan Muñoz</a><br>
   	<a href="niño.php">Antonia Ruiz</a>
    <form>
    <input type="button"name="button" value="Nuevo Usuario" onclick="nuevoUsuario()">
	</form>

<?php
$query=mysql_query("SELECT username FROM userlitdb");

while($row = mysql_fetch_array($query)){
echo '<tr><td>'.$row["username"].'</td></tr><br>';
}

?>


</div>

<div id="contenido">
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>

<div>
	<div id="nuevoUsuario" style="display: none;">
	<h1>Registro de Usuarios</h1>
<form name="registerform" id="registerform" action="intropageAdmin.php" method="post">

<label for="user_login">Nombre:<br />
 <input type="text" name="name" id="name" class value=""><br><br>

<label for="user_login">Apellidos:<br />
 <input type="text" name="last_name" id="last_name" value=""><br><br>

<label for="userlogin">Tipo de usuario:</label> <br/>
					<select id="type" name="type"><br>
  					<option value="" selected="selected">- Selecciona Tipo de Usuario -</option>
  					<option value="admin">Administrador</option>
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

Preguntas:
<table border=1 cellspacing=0 cellpadding=2>
	<tr><td>Sección</td></tr>
<?php
$query=mysql_query("SELECT nom_seccion FROM seccion");
while($row = mysql_fetch_array($query)){
echo '<tr><td>'.$row["nom_seccion"].'</td></tr>';
}
?>
</table><br><br>
<p class="submit"
<input type="submit" name="register" id="nuevoCuestionario" class="button" value="Añadir Cuestionario" />
</p>

</form>
 </div>

</div>


<div class="container mregister">
<div id="nuevaSeccion"  style="display: none">
<h1>Nueva Sección</h1>
<form name="registerform" id="registerform" action="intropageAdmin.php" method="post">

<label>Nombre Sección:<br />
 <input type="text" name="name" id="name" class value=""><br><br>

<select name="subseccion" size="10" multiple>
  <option selected>Elige Subsecciones</option>
  <option value="1">0-1 año</option>
  <option value="2">1-2 años</option>
  <option value="3">2-3 años</option>
  <option value="4">3-4 años</option>
  <option value="4">4-5 años</option>
  <option value="4">5-6 años</option>
  <option value="4">6-7 años</option>
  <option value="4">7-8 años</option>

</select>

<input type="submit" name="register" id="añadirSubseccion" class="button" value="Añadir Subsección" />
<input type="submit" name="register" id="quitarSubseccion" class="button" value="Quitar Subsección" />

<table border=1 cellspacing=0 cellpadding=2>
	<tr><td>Secciones Seleccionadas</td></tr>
	<tr><td>1-2 años</td></tr>
	<tr><td>2-3 años</td></tr>
</table>
</form>
</div>
</div>
</div>




<?php include("includes/footer.php"); ?>

<?php
}
?>
