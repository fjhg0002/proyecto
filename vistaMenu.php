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
				<?php foreach ($cuestionarios as $cuest): ?>
				<?php echo $cuest["nom_cuest"] ?><br>
				<?php endforeach; ?>
				<input type="button"name="button" value="Nuevo Cuestionario" onclick="nuevoCuestionario()"><br>

				
			<h2>Usuarios</h2>
				<?php foreach ($usuarios as $usu): ?>
				<?php echo $usu["username"] ?><br>
				<?php endforeach; ?>
				<input type="button"name="button" value="Nuevo Usuario" onclick="nuevoUsuario()">
</body>
</html>


