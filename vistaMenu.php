<html>
	<head>
		<script>
			function ocultarTodos() {
				document.getElementById("nuevoUsuario").style.display="none";
				document.getElementById("nuevoCuestionario").style.display="none";
				document.getElementById("buscarCuestionario").style.display="none";
				document.getElementById("buscarUsuario").style.display="none";
				document.getElementById("Lista").style.display="none";
			}
			function nuevoUsuario() {
				ocultarTodos();
				document.getElementById("nuevoUsuario").style.display="block";
			}
			
			function buscarUsuario() {
				ocultarTodos();
				document.getElementById("buscarUsuario").style.display="block";
			}

			function nuevoCuestionario() {
				ocultarTodos();
				document.getElementById("nuevoCuestionario").style.display="block";
				document.getElementById("cuestionario").style.display="block";
			}
			
			function buscarCuestionario() {
				ocultarTodos();
				document.getElementById("nuevoCuestionario").style.display="block";
				document.getElementById("cuestionario").style.display="none";
				document.getElementById("buscarCuestionario").style.display="block";
			}
		</script>
	</head>
	
	<body>
		<nav id = "menu">
				<input type="button" id="buttonMenu" value="Nuevo Cuestionario" onclick="nuevoCuestionario()"><br>
				<input type="button" id="buttonMenu" value="Buscar Cuestionario" onclick="buscarCuestionario()"><br>

				<input type="button" id="buttonMenu" value="Nuevo Usuario" onclick="nuevoUsuario()">
				<input type="button" id="buttonMenu" value="Buscar Usuario" onclick="buscarUsuario()">


</body>
</html>


