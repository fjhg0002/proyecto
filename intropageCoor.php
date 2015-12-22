<?php
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else { 
?>

<?php require_once("includes/connection.php");

?>

		<script>
			function ocultarBloques() {
				document.getElementById("nuevaSeccion").style.display="none";
				document.getElementById("nuevaSubseccion").style.display="none";
				document.getElementById("nuevaPregunta").style.display="none";
			}
			function nuevaSeccion() {
				ocultarBloques();
				document.getElementById("nuevaSeccion").style.display="block";
			}
			function nuevaSubseccion() {
				ocultarBloques();
				document.getElementById("nuevaSubseccion").style.display="block";
			}
			function nuevaPregunta() {
				ocultarBloques();
				document.getElementById("nuevaPregunta").style.display="block";
			}
			function verListado() {
                document.getElementById("Lista").style.display="block";
            }
			
		</script>




<?php
include("includes/header.php");
include("modelo.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

<script>
	function addCuestionario() {
		alert( "adding" );
        $.post( "modelo.php"
			   , { nom_Cuest: $("#nom_Cuest").val()
			   , funcion: "añadirCuestionario" }
			   , function( data ) {
			document.getElementById("Lista").style.display="block";
			alert( "Recibido: "+data )
			//$("#nom_Cuest").attr( "disabled", "disabled");
		});


    }
	
	function addSeccion() {
		alert( "adding seccion "+$("#secciones").val() );
        $.post( "modelo.php"
			   , { nom_Cuest: $("#nom_Cuest").val()
			   , nom_Sec: $("#nom_Sec").val()
			   , secciones: $("#secciones").val()
			   , funcion: "añadirSeccion" }
			   , function( data ) {
			alert( "Recibido: "+data +$("#secciones").val() );
			//$("#nom_Sec").attr( "disabled", "disabled");
		});
    }
	
	function addSubseccion() {
		alert("adding subseccion" + $("#secciones2").val() + $("#listaSubsecciones").val());
		$.post("modelo.php"
			   , { secciones2: $("#secciones2").val()
			   , listaSubsecciones: $("#listaSubsecciones").val()
			   , nom_Sub: $("#nom_Sub").val()
			   , funcion: "añadirSubseccion" }
			   , function( data ) {
			alert( "Recibido: "+data)
		});
	}
</script>

	<div id="nuevoCuestionario" style="display: none">
		<form name="registerform" id="registerform" action="intropageCoor.php" method="post">
			<h2>Nuevo Cuestionario</h2>
			<label>Nombre Cuestionario:<br />
			<input type="text" id="nom_Cuest" class value=""><br><br>

			<p class ="submit">
				<input type="button" id="button" class="button" value="Añadir Cuestionario"
					   onclick="addCuestionario(),verListado()"><br><br>
			</p>
					
			<div id="Lista" style=display:none>
			<table>
			<tr><td>
			<div id="ListadoPreguntas" >
				<?php
				$consulta_Seccion='select * from seccion';
				$resultado_consulta_Seccion=mysql_query($consulta_Seccion);
				
				$consulta_Subseccion='select * from subseccion';
				$resultado_consulta_Subseccion=mysql_query($consulta_Subseccion);
				
				$consulta_Pregunta='select * from pregunta';
				$resultado_consulta_Pregunta=mysql_query($consulta_Pregunta);
				
				echo "<table border=1 cellspacing=0 cellpadding=2table>";
				while($fila1=mysql_fetch_array($resultado_consulta_Seccion)){
					echo "<tr><td bgcolor='#A4A4A4'>";
					echo $fila1["nom_seccion"];
					echo "</tr></td>";
					while($fila2=mysql_fetch_array($resultado_consulta_Subseccion)){
						echo "<tr><td bgcolor='#BDBDBD'>";
						echo "Sub ";
						echo $fila2["nom_subseccion"];
						echo "</tr></td>";
						while($fila3=mysql_fetch_array($resultado_consulta_Pregunta)){
							echo "<tr><td bgcolor='#E6E6E6'>";
							echo "Pre ";
							echo $fila3["enunciado"];
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
			<tr> <td> <p class ="submit"> <input type="button" id="button" class="button" value="Nueva Seccion" onclick="nuevaSeccion()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"> <input type="button" id="button" class="button" value="Eliminar Seccion" onclick="eliminarSeccion()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"> <input type="button" id="button" class="button" value="Nueva Subsección" onclick="nuevaSubseccion()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"> <input type="button" id="button" class="button" value="Eliminar Subsección" onclick="eliminarSubseccion()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"><input type="button" id="button" class="button" value="Nueva Pregunta" onclick="nuevaPregunta()"> </p> </tr> </td>
			<tr> <td> <p class ="submit"><input type="button" id="button" class="button" value="Eliminar Pregunta"onclick="eliminarPregunta()"> </p> </tr> </td>
			</table>
			</div>
			</div>
			
			</td></tr>
			</table>			
			
			<div id="nuevaSeccion" style="display:none">
				<form id="nuevaS">
				<h2>Nueva Sección:</h2>
				<label>Selecciona una sección de las siguientes:
			
				<?php
				$consulta_mysql='select * from seccion';
				$resultado_consulta_mysql=mysql_query($consulta_mysql);
				echo "<select id='secciones' onchange='if(this.value=='otra') {
														document.getElementById('otraSeccion').disabled = false
														}else{
														document.getElementById('otraSeccion').disabled = true}'>";
				echo "<option value='ninguna'>Selecciona una Sección</option>";
				while($fila=mysql_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nom_seccion']."'>".$fila['nom_seccion']."</option>";
				}
				echo "<option value='otra'>otra</option>";
				echo "</select><br>";
				?>			
			
				<input type="text" name="nom_Sec" id="nom_Sec"  size="20" value=""><br><br>
				<p class ="submit">
					<input type="button" id="button" classs="button" value="Añadir Sección a este cuestionario"
						   onclick="addSeccion()"><br><br>
				</p>
				</form>
			</div>
			
			<div id="nuevaSubseccion" style="display: none">
				<h2>Nueva Subsección:</h2><br>
				<label>Elige la Sección donde quieres añadir la subsección:<br><br>

				<?php
				$consulta_mysql='select * from seccion';
				$resultado_consulta_mysql=mysql_query($consulta_mysql);
				echo "<select id='secciones2' onchange='if(this.value=='otra') {
														document.getElementById('otraSeccion').disabled = false
														}else{
														document.getElementById('otraSeccion').disabled = true}'>";
				echo "<option value='ninguna'>Selecciona una Sección</option>";
				while($fila=mysql_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nom_seccion']."'>".$fila['nom_seccion']."</option>";
				}
				echo "</select><br>";
				?>			

				
				<label>Selecciona la subseccion que quieres añadir o escriba una nueva:<br><br>

				<?php
				$consulta_mysql='select * from subseccion';
				$resultado_consulta_mysql=mysql_query($consulta_mysql);
				echo "<select id='listaSubsecciones'>";
				echo "<option value='ninguna'>Selecciona una Subsección</option>";
				while($fila=mysql_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nom_subseccion']."'>".$fila['nom_subseccion']."</option>";
				}
				echo "<option value='otra'>otra</option>";
				echo "</select><br>";
				?>
				
				<input type="text" id="nom_Sub" class value=""><br><br>
				<p class ="submit">
					<input type="button"id="button" value="Añadir Subsección a este cuestionario" onclick="addSubseccion()"><br><br>
				</p>

			</div>
			
			<div id="nuevaPregunta" style="display: none">
				<h2>Nueva Pregunta:</h2>
				<label>Título pregunta:
				<input type="text" id="nom_Sub" class value=""><br><br>

				<label>Selecciona el cuestionario donde quiere insertar la pregunta:
				<?php
				$consulta_mysql='select * from cuestionario';
				$resultado_consulta_mysql=mysql_query($consulta_mysql);
				echo "<select id='cuestionarios'>";
				while($fila=mysql_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nom_cuest']."'>".$fila['nom_cuest']."</option>";
				}
				echo "</select><br>";
				?>
				
				<label>Selecciona la sección donde quiere insertar la pregunta:
				<?php
				$consulta_mysql='select * from seccion';
				$resultado_consulta_mysql=mysql_query($consulta_mysql);
				echo "<select id='secciones'>";
				while($fila=mysql_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nom_seccion']."'>".$fila['nom_seccion']."</option>";
				}
				echo "</select><br>";
				?>
				
				<label>Selecciona la subsección donde quiere insertar la pregunta:
				<?php
				$consulta_mysql='select * from subseccion';
				$resultado_consulta_mysql=mysql_query($consulta_mysql);
				echo "<select id='subsecciones'>";
				while($fila=mysql_fetch_array($resultado_consulta_mysql)){
					echo "<option value='".$fila['nom_subseccion']."'>".$fila['nom_subseccion']."</option>";
				}
				echo "</select><br>";
				?>

				<label>Tipo de respuesta:
				<select id='TiposRespuestas'>
					<option value="checkbox">Checkbox</option>
					<option value="desplegable">Despegable</option>
					<option value="Radio Button">Radio Button</option>
				</select><br>

				<label>Opcion 1
				<input type="text" id="opcion1" class value=""><br>
				<label>Opcion 2
				<input type="text" id="opcion2" class value=""><br>
				<label>Opcion 3
				<input type="text" id="opcion3" class value=""><br>
				<label>Opcion 4
				<input type="text" id="opcion4" class value="">

				
			</div>



</form>

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
