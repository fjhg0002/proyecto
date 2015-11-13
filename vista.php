<html>
	<head>
	</head>
	
	<body>
		
	<h2>Preguntas:</h2>
	<table border=1 cellspacing=0 cellpadding=2>
	<tr><td>Sección</td></tr>

<?php foreach ($seccion as $sec): ?>
	<tr><td>
		<?php echo $sec["nom_seccion"] ?>
		
	<!-- echo '<tr><td><a href="/muestra_datos_cuestionario.php?nombre='.$row["nom_cuest"].'">'.$row["nom_cuest"].'</a></td></tr><br>';
	-->
	</td></tr>
<?php endforeach; ?>
	</table>
</body>
</html>


