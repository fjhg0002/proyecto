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

<div id="contenedor">
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

		<div id="nuevoUsuario" style="display: none;">
			<h2>Registro de Usuarios</h2>
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
		
		<div id="buscarUsuario" style="display: none">
			<h2 id="nuevo">Buscar Usuario</h2>
			<label>Escribe el usuario que desea buscar:<br />
				
				<?php
				$usuarios=getTodosLosUsuarios();
				echo "<select id='usuario'>";
				echo "<option value='ninguna'>Selecciona un Usuario</option>";
				foreach ($usuarios as $usu){
					echo "<option value='".$usu['username']."'>".$usu['username']."</option>";
				}
				echo "</select><br>";
				?>			

			<p class ="submit">
				<input type="button" id="button" class="button" value="Modificar Usuario"
					   onclick="modificarUsuario()">
				<input type="button" id="button" class="button" value="Eliminar Usuario"
					   onclick="eliminarUsuario()"><br><br>
			</p>
			
		</div>
		
		<div id="DatosUsuario" style="display: none"></div>


	<?php
	require_once("modelo.php");
	registroUsuarios();
	?>



	<div id="nuevoCuestionario" style="display: none">
			
			<div id="cuestionario" style="display: block">
			<h2>Nuevo Cuestionario</h2>
			<label>Nombre Cuestionario:<br />
			<input type="text" id="nom_CuestN" class value=""><br><br>

			<p class ="submit">
				<input type="button" id="button" class="button" value="Añadir Cuestionario"
					   onclick="addCuestionario()"><br><br>
			</p>
			
			</div>
			
			<div id="buscarCuestionario" style="display: block">
			<h2 id="nuevo">Buscar Cuestionario</h2>
			<label>Escribe el cuestionario que desea buscar:<br />

			<!--input type="text" id="nom_CuestB" class value=""><br><br-->
				
				<?php
				$cuestionarios=getTodosLosCuestionarios();
				echo "<select id='nom_CuestB' name='nom_CuestB'>";
				echo "<option value='ninguna'>Selecciona un Cuestionario</option>";
				foreach ($cuestionarios as $cuest){
					echo "<option value='".$cuest['nom_cuest']."'>".$cuest['nom_cuest']."</option>";
				}
				echo "</select><br>";
				?>			

			<p class ="submit">
				<input type="button" id="button" class="button" value="Buscar Cuestionario"
					   onclick="verCuestionario();listadoSecciones()"><br><br>
			</p>
			
			</div>
					
			<div id="Lista" style="display:none">
			
			<div id="botonesListaPreguntas">
			<table>
			<tr>
				<td> <p class ="submit"> <input type="button" id="buttonDialogo1" class="button" value="Nueva Seccion" onclick="nuevaSeccion()"> </p></td>
				<td> <p class ="submit"> <input type="button" id="buttonDialogo3" class="button" value="Nueva Subsección" onclick="nuevaSubseccion()"> </p></td>
				<td> <p class ="submit"> <input type="button" id="buttonDialogo5" class="button" value="Nueva Pregunta" onclick="nuevaPregunta()"> </p></td>			
			</tr>

			<tr>
				<td> <p class ="submit"> <input type="button" id="buttonDialogo2" class="button" value="Eliminar Seccion" onclick="eliminaSeccion()"> </p> </td>
				<td> <p class ="submit"> <input type="button" id="buttonDialogo4" class="button" value="Eliminar Subsección" onclick="eliminaSubseccion()"> </p></td>			
				<td> <p class ="submit"> <input type="button" id="buttonDialogo6" class="button" value="Eliminar Pregunta"onclick="eliminaPregunta()"> </p></td>
			</tr>
			</table>
			</div>

			<div id="ListadoPreguntas" STYLE=" height: 300px; width: 600px; overflow: auto;"></div>


			</div>
			
			
			
			<div id="nuevaSeccion" title="Nueva Sección" style="display:none">
				<label>Selecciona una sección de las siguientes:<br>
				<?php
				$secciones=getTodasLasSecciones();
				echo "<select id='seccionesNSe'>";
				echo "<option value='ninguna'>Selecciona una Sección</option>";
				foreach ($secciones as $sec){
					echo "<option value='".$sec['nom_seccion']."'>".$sec['nom_seccion']."</option>";
				}
				echo "<option value='otra'>otra</option>";
				echo "</select><br>";
				?>
				<label>O selecciona otra, y escribe una nueva aquí:<br>
		
				<input type="text" name="nom_Sec" id="nom_Sec"  size="20" value=""><br><br>
				<p class ="submit">
					<input type="button" id="buttonOK" classs="button" value="Añadir Sección a este cuestionario"
						   onclick="addSeccion()"><br><br>
				</p>
			</div>
			
			<div id="eliminaSeccion" title="Eliminar Sección" style="display:none">
				<label>Selecciona la sección que quieres eliminar:<br>
				<?php echo "<select id='seccionesDSe'> </select><br><br>"?>			
			
				<p class ='submit'>
				<input type='button' id='buttonOK' classs='button' value='Eliminar esta Sección de este cuestionario' onclick='deleteSeccion()'><br><br>
				</p>
			</div>
			
			<div id="nuevaSubseccion" title="Nueva Subsección" style="display: none">
				
				<label>Elige la Sección donde quieres añadir la subsección:<br>
				<?php echo "<select id='seccionesNSu'> </select><br>"; ?>			
				
				<label>Selecciona una subsección de las siguientes:<br>
				<?php
				$subsecciones=getTodasLasSubsecciones();
				echo "<select id='subseccionesNSu'>";
				echo "<option value='ninguna'>Selecciona una Subsección</option>";
				foreach ($subsecciones as $sub){
					echo "<option value='".$sub['nom_subseccion']."'>".$sub['nom_subseccion']."</option>";
				}
				echo "<option value='otra'>otra</option>";
				echo "</select><br>";
				?>
				
				<label>O selecciona otra, y escribe una nueva aquí:<br>
			
				<input type="text" id="nom_Sub" class value=""><br><br>
				<p class ="submit">
					<input type="button"id="buttonOK" value="Añadir Subsección a este cuestionario" onclick="addSubseccion()"><br><br>
				</p>
			</div>
			
			<div id="eliminaSubseccion" title="Eliminar Subsección" style="display: none">
				
				<label>Elige la Sección donde quieres eliminar la subsección:<br>
				<?php echo "<select id='seccionesDSu' onchange='listadoSubseccionesDSu()'> </select><br>";?>			

				
				<label>Selecciona la subseccion que quieres eliminar:<br>
				<?php echo "<select id='subseccionesDSu'> </select><br><br>";
				
				?>
				<p class ="submit">
					<input type="button"id="buttonOK" value="Eliminar Subsección de este cuestionario" onclick="deleteSubseccion()"><br><br>
				</p>

			</div>
			
			<div id="nuevaPregunta" title="Nueva Pregunta" style="display: none">
				<label>Título pregunta:
				<input type="text" id="tit_Pregunta" class value=""><br>
				
				<label>Selecciona la sección donde quiere insertar la pregunta:
				<?php echo "<select id='seccionesNPr' onchange='listadoSubseccionesNPr()'> </select><br>" ?>
				
				<label>Selecciona la subseccion:<br>
				<?php echo "<select id='subseccionesNPr'> </select><br>";?>

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
				<input type="text" id="opcion4" class value=""><br><br>

				<p class ="submit">
					<input type="button"id="buttonOK" value="Añadir Pregunta a este cuestionario" onclick="addPregunta();addRespuesta()"><br><br>
				</p>
			</div>

			<div id="eliminaPregunta" title="Eliminar Pregunta" style="display: none">
				
				<label>Selecciona la sección donde quiere eliminar la pregunta:
				<?php echo "<select id='seccionesDPr' onchange='listadoSubseccionesDPr()'> </select><br>" ?>
				
				<label>Selecciona la subseccion:<br>
				<?php echo "<select id='subseccionesDPr' onchange='listadoPreguntas()'> </select><br>"?>
				
				<label>Selecciona la pregunta:<br>
				<?php echo "<select id='preguntas'> </select><br>"?>

				<p class ="submit">
					<input type="button"id="buttonOK" value="Eliminar Pregunta de este cuestionario" onclick="deletePregunta()"><br><br>
				</p>	
			</div>



	<?php
	//$seccion=getTodasLasSecciones();
	//require('vista.php');
	?>
</div>

</div>








</div>
</div>

<?php include("includes/footer.php"); ?>

<?php
}
?>
