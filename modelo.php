<?php

require_once("includes/connection.php");

function getTodosLosCuestionarios(){
$resultado=mysql_query("SELECT nom_cuest FROM cuestionario");

$cuestionarios = array();
while($fila = mysql_fetch_array($resultado)){
	$cuestionarios[] = $fila;
}
return $cuestionarios;
}

function getTodosLosUsuarios(){
$resultado=mysql_query("SELECT username FROM usuario");

$usuarios = array();
while($fila = mysql_fetch_array($resultado)){
	$usuarios[]=$fila;
}
return $usuarios;
}

function getTodasLasSecciones(){
$resultado=mysql_query("SELECT nom_seccion FROM seccion");

$secciones = array();
while($fila = mysql_fetch_array($resultado)){
	$secciones[]=$fila;
}
return $secciones;
}


function registroUsuarios(){
if(isset($_POST["register"])){

	if(!empty($_POST['name']) && !empty($_POST['last_name']) && !empty($_POST['type']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['Rpassword'])) {

		$name=$_POST['name'];
		$last_name=$_POST['last_name'];
		$type=$_POST['type'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$Rpassword=$_POST['Rpassword'];

		$query=mysql_query("SELECT * FROM usuario WHERE username='".$username."'");
		$numrows=mysql_num_rows($query);

		if($numrows==0) {
			if ($password == $Rpassword){
				$sql="INSERT INTO usuario
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
}


function añadirCuestionario(){
if(!empty($_POST['nom_Cuest'])){
		
		$nom_Cuest=$_POST['nom_Cuest'];
	
		$query1=mysql_query("SELECT * FROM cuestionario WHERE nom_Cuest='".$nom_Cuest."'");
		$numrows1=mysql_num_rows($query1);

		if($numrows1==0) {
				$sql1="INSERT INTO cuestionario
					(nom_cuest)
					VALUES('$nom_Cuest')";

				$result1=mysql_query($sql1);

				if($result1){
	 				$messageCuest = "Cuestionario añadido correctamente";
				} else {
	 				$messageCuest = "Error al ingresar datos del cuestionario!";
				}
		} else {
	 	$messageCuest = "El nombre del cuestionario ya existe! Por favor, intenta con otro!";
		}

	} else {
		$messageCuest = "No puede estar el campo vacío!";
	}
}


function añadirSeccion(){
	if(!empty($_POST['nom_Sec']) && !empty($_POST['nom_Cuest'])){
	
		$nom_Sec=$_POST['nom_Sec'];
		$nom_Cuest=$_POST['nom_Cuest'];
		
		$num_Cuest=mysql_query("SELECT id_cuest FROM cuestionario WHERE nom_cuest='$nom_Cuest'");
			
		$sql2="INSERT INTO seccion (nom_seccion, id_cuest) VALUES('$nom_Sec', '$num_Cuest')";
		$result2=mysql_query($sql2);

	}
}


/// MAIN
if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirCuestionario") {
	añadirCuestionario();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirSeccion") {
	añadirSeccion();
}


?>





