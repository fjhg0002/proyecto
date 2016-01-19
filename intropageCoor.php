<?php
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else { 
?>

<?php
require_once("includes/connection.php");
include("includes/header.php");
include("modelo.php");
include("vistaContenido.php")
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<script>
	
	
	
</script>


<div id="cabecera" >
	<h1>Bienvenido a Down Progress, sistema de seguimiento.</h1>
	<h3>¿Que tal está <span><?php echo $_SESSION['session_username'];?>! </span>?
		Está en la sesión de Administrador, si quiere finalizar sesión pulse <a href="logout.php">aquí</a> </h3>
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
			
			<div id="cuestionario" style="display: block">
			<h2>Nuevo Cuestionario</h2>
			<label>Nombre Cuestionario:<br />
			<input type="text" id="nom_Cuest" class value=""><br><br>

			<p class ="submit">
				<input type="button" id="button" class="button" value="Añadir Cuestionario"
					   onclick="addCuestionario(),verListado(),ocultarCuestionario()"><br><br>
			</p>
			
			</div>
					
			<div id="Lista" style=display:none>
			<table>
			<tr><td>
			
			<div id="ListadoPreguntas" >
				<?php
				$consulta_Seccion='select * from seccion';
				$resultado_consulta_Seccion=mysql_query($consulta_Seccion);
				$fila1=mysql_fetch_array($resultado_consulta_Seccion);
				
				$consulta_Subseccion='select * from subseccion';
				$resultado_consulta_Subseccion=mysql_query($consulta_Subseccion);
				$fila2=mysql_fetch_array($resultado_consulta_Subseccion);
				
				$consulta_Pregunta='select * from pregunta';
				$resultado_consulta_Pregunta=mysql_query($consulta_Pregunta);
				$fila3=mysql_fetch_array($resultado_consulta_Pregunta);
				
				echo "<table border=1 cellspacing=0 cellpadding=2table>";
				while($fila1=mysql_fetch_array($resultado_consulta_Seccion)){
					echo "<tr><td bgcolor='#A4A4A4'>";
					echo $fila1["nom_seccion"];
					echo "</tr></td>";
					while($fila2=mysql_fetch_array($resultado_consulta_Subseccion)){
						echo "<tr><td bgcolor='#BDBDBD'>";
						if($fila1["id_seccion"] == $fila2["id_seccion"]){
							echo $fila2["nom_subseccion"];
						}
						echo "</tr></td>";
						while($fila3=mysql_fetch_array($resultado_consulta_Pregunta)){
							echo "<tr><td bgcolor='#E6E6E6'>";
							if($fila2["id_subseccion"] == $fila3["id_Sub"]){
								echo $fila3["enunciado"];
							}	
							echo "</tr></td>";
						}	
					}
				}
				echo "</table>"
				?>
			</div>
			</td>
			
			<td>
			
			<div id="botonesListaPreguntas">
			<table>
			<tr> <td> <p class ="submit"> <input type="button" id="button1" class="button" value="Nueva Seccion" onclick="nuevaSeccion()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"> <input type="button" id="button2" class="button" value="Eliminar Seccion" onclick="eliminaSeccion()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"> <input type="button" id="button3" class="button" value="Nueva Subsección" onclick="nuevaSubseccion()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"> <input type="button" id="button4" class="button" value="Eliminar Subsección" onclick="eliminaSubseccion()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"><input type="button" id="button5" class="button" value="Nueva Pregunta" onclick="nuevaPregunta()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"><input type="button" id="button6" class="button" value="Eliminar Pregunta"onclick="eliminaPregunta()"> </p> </tr> </td>
			
			</table>
			</div>
			</div>
			
			</td></tr>
			</table>			
			
			<div id="nuevaSeccion" title="Nueva Sección" style="display:none">
				
				<label>Selecciona una sección de las siguientes:
				<?php
				$secciones=getTodasLasSecciones();
				echo "<select id='secciones'>";
				echo "<option value='ninguna'>Selecciona una Sección</option>";
				foreach ($secciones as $sec){
					echo "<option value='".$sec['nom_seccion']."'>".$sec['nom_seccion']."</option>";
				}
				echo "<option value='otra'>otra</option>";
				echo "</select><br>";
				?>			
			
				<input type="text" name="nom_Sec" id="nom_Sec"  size="20" value=""><br><br>
				<p class ="submit">
					<input type="button" id="button" classs="button" value="Añadir Sección a este cuestionario"
						   onclick="addSeccion()"><br><br>
				</p>
			</div>
			
			<div id="eliminaSeccion" title="Eliminar Sección" style="display:none">
				
				<label>Selecciona una sección de las siguientes:
				<?php
				$secciones=getTodasLasSecciones();
				echo "<select id='secciones'>";
				echo "<option value='ninguna'>Selecciona una Sección</option>";
				foreach ($secciones as $sec){
					echo "<option value='".$sec['nom_seccion']."'>".$sec['nom_seccion']."</option>";
				}
				echo "</select><br>";
				?>			
			
				<p class ="submit">
					<input type="button" id="button" classs="button" value="Eliminar esta Sección de este cuestionario"
						   onclick="deleteSeccion()"><br><br>
				</p>
			</div>
			
			<div id="nuevaSubseccion" title="Nueva Subsección" style="display: none">
				
				<label>Elige la Sección donde quieres añadir la subsección:<br><br>
				<?php
				$secciones=getTodasLasSecciones();
				echo "<select id='secciones2'>";
				echo "<option value='ninguna'>Selecciona una Sección</option>";
				foreach ($secciones as $sec){
					echo "<option value='".$sec['nom_seccion']."'>".$sec['nom_seccion']."</option>";
				}
				echo "</select><br>";
				?>			

				
				<label>Selecciona la subseccion que quieres añadir o escriba una nueva:<br><br>
				<?php
				$subsecciones=getTodasLasSubsecciones();
				echo "<select id='listaSubsecciones'>";
				echo "<option value='ninguna'>Selecciona una Subsección</option>";
				foreach ($subsecciones as $subsec){
					echo "<option value='".$subsec["nom_subseccion"]."'>".$subsec["nom_subseccion"]."</option>";
				}
				echo "<option value='otra'>otra</option>";
				echo "</select><br>";
				
				?>
				
				<input type="text" id="nom_Sub" class value=""><br><br>
				<p class ="submit">
					<input type="button"id="button" value="Añadir Subsección a este cuestionario" onclick="addSubseccion()"><br><br>
				</p>

			</div>
			
			<div id="eliminaSubseccion" title="Eliminar Subsección" style="display: none">
				
				<label>Elige la Sección donde quieres eliminar la subsección:<br><br>
				<?php
				$secciones=getTodasLasSecciones();
				echo "<select id='secciones2'>";
				echo "<option value='ninguna'>Selecciona una Sección</option>";
				foreach ($secciones as $sec){
					echo "<option value='".$sec['nom_seccion']."'>".$sec['nom_seccion']."</option>";
				}
				echo "</select><br>";
				?>			

				
				<label>Selecciona la subseccion que quieres eliminar:<br><br>
				<?php
				$subsecciones=getTodasLasSubsecciones();
				echo "<select id='listaSubsecciones'>";
				echo "<option value='ninguna'>Selecciona una Subsección</option>";
				foreach ($subsecciones as $subsec){
					echo "<option value='".$subsec["nom_subseccion"]."'>".$subsec["nom_subseccion"]."</option>";
				}
				echo "<option value='otra'>otra</option>";
				echo "</select><br>";
				
				?>
				<p class ="submit">
					<input type="button"id="button" value="Eliminar Subsección de este cuestionario" onclick="deleteSubseccion()"><br><br>
				</p>

			</div>
			
			<div id="nuevaPregunta" title="Nueva Pregunta" style="display: none">
				<label>Título pregunta:
				<input type="text" id="tit_Pregunta" class value=""><br><br>
				
				<label>Selecciona la sección donde quiere insertar la pregunta:
				<?php
				$secciones=getTodasLasSecciones();
				echo "<select id='seccionesP'>";
				foreach ($secciones as $sec){
					echo "<option value='".$sec['nom_seccion']."'>".$sec['nom_seccion']."</option>";
				}
				echo "</select><br>";
				?>
				
				<label>Selecciona la subsección donde quiere insertar la pregunta:
				<?php
				$subsecciones=getTodasLasSubsecciones();
				echo "<select id='subseccionesP'>";
				foreach ($subsecciones as $sub){
					echo "<option value='".$sub['nom_subseccion']."'>".$sub['nom_subseccion']."</option>";
				}
				echo "</select><br>";
				?>

				<label>Tipo de respuesta:
				<select id='TiposRespuestas'>
					<option value="checkbox">Checkbox</option>
					<option value="desplegable">Despegable</option>
					<option value="Radio Button">Radio Button</option>
					<option value="Respuesta Corta">Radio Button</option>
				</select><br>

				<label>Opcion 1
				<input type="text" id="opcion1" class value=""><br>
				<label>Opcion 2
				<input type="text" id="opcion2" class value=""><br>
				<label>Opcion 3
				<input type="text" id="opcion3" class value=""><br>
				<label>Opcion 4
				<input type="text" id="opcion4" class value="">

				<p class ="submit">
					<input type="button"id="button" value="Añadir Pregunta a este cuestionario" onclick="addPregunta()"><br><br>
				</p>

				
			</div>

			<div id="eliminaPregunta" title="Eliminar Pregunta" style="display: none">
				
				<label>Selecciona la sección donde quiere eliminar la pregunta:
				<?php
				$secciones=getTodasLasSecciones();
				echo "<select id='seccionesP'>";
				foreach ($secciones as $sec){
					echo "<option value='".$sec['nom_seccion']."'>".$sec['nom_seccion']."</option>";
				}
				echo "</select><br>";
				?>
				
				<label>Selecciona la subsección donde quiere eliminar la pregunta:
				<?php
				$subsecciones=getTodasLasSubsecciones();
				echo "<select id='subseccionesP'>";
				foreach ($subsecciones as $sub){
					echo "<option value='".$sub['nom_subseccion']."'>".$sub['nom_subseccion']."</option>";
				}
				echo "</select><br>";
				?>

				<p class ="submit">
					<input type="button"id="button" value="Eliminar Pregunta de este cuestionario" onclick="deletePregunta()"><br><br>
				</p>
				
			</div>



	<?php
	//$seccion=getTodasLasSecciones();
	//require('vista.php');
	?>
</div>

</div>








</div>

<?php include("includes/footer.php"); ?>

<?php
}
?>
