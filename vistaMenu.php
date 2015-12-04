<html>
	<head>
		<script>
			function ocultarTodos() {
				document.getElementById("nuevoUsuario").style.display="none";
				document.getElementById("nuevoCuestionario").style.display="none";

			}
			function nuevoUsuario() {
				ocultarTodos();
				document.getElementById("nuevoUsuario").style.display="block";
			}

			function nuevoCuestionario() {
				ocultarTodos();
				document.getElementById("nuevoCuestionario").style.display="block";
			}
		</script>
	</head>
	
	<body>
		<nav id = "menu">
			<h2>Cuestionarios</h2>		
				<?php echo "<select multiple='multiple' size='5' id='listadeCuestionarios'>" ?>
				<?php foreach ($cuestionarios as $cuest): ?>
				<?php echo "<option value='".$cuest["nom_cuest"]."'>".$cuest["nom_cuest"]."</option>"; ?>
				<?php endforeach; ?>
				<?php echo"</select>"?><br>
				<input type="button" id="button" value="Nuevo Cuestionario" onclick="nuevoCuestionario()"><br>
							
			<h2>Usuarios</h2> <br/>
				<?php echo "<select multiple='multiple' size='5' id='listadeUsuarios'>" ?>
				<?php foreach ($usuarios as $usu): ?>
				<?php echo "<option value='".$usu["username"]."'>".$usu["username"]."</option>"; ?>
				<?php endforeach; ?>
				<?php echo"</select>"?><br>
				<input type="button" id="button" value="Nuevo Usuario" onclick="nuevoUsuario()">

</body>
</html>


