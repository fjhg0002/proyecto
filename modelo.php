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

function getTodasLasSubsecciones(){
$resultado=mysql_query("SELECT nom_subseccion FROM subseccion");

$subsecciones = array();
while($fila = mysql_fetch_array($resultado)){
	$subsecciones[]=$fila;
}
return $subsecciones;
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
	return $messageCuest;
}


function añadirSeccion(){
	if( !empty($_POST['nom_Cuest']) && (!empty($_POST['nom_Sec']) || !empty($_POST['secciones']))){
	
		$nom_Cuest=$_POST['nom_Cuest'];
		$secciones = $_POST['secciones'];
		$nom_Sec=$_POST['nom_Sec'];
		
		$consulta=mysql_query("SELECT id_cuest FROM cuestionario WHERE nom_cuest='$nom_Cuest'");
		
		$fila=mysql_fetch_assoc($consulta);
		$num_Cuest=$fila['id_cuest'];
		
		if($secciones =="otra"){	
			$sql="INSERT INTO seccion (nom_seccion, id_cuest) VALUES('$nom_Sec', '$num_Cuest')";
			$result2=mysql_query($sql);
		}else{
			$sql="INSERT INTO seccion (nom_seccion, id_cuest) VALUES('$secciones', '$num_Cuest')";
			$result=mysql_query($sql);
		}
	}
}

function añadirSubseccion(){
	if(!empty($_POST['secciones2']) && (!empty($_POST['listaSubsecciones']) || !empty ($_POST['nom_Sub']))){
		
		$secciones2=$_POST['secciones2'];
		$listaSubsecciones=$_POST['listaSubsecciones'];
		$nom_Sub=$_POST['nom_Sub'];
		
		$consulta2=mysql_query("SELECT id_seccion FROM seccion WHERE nom_Seccion='$secciones2'");
							  
		$fila2=mysql_fetch_assoc($consulta2);
		$num_Sec = $fila2['id_seccion'];
		
		if($listaSubsecciones=="otra"){
			$sql="INSERT INTO subseccion (nom_Subseccion, id_seccion) VALUES ('$nom_Sub','$num_Sec')";
			$result=mysql_query($sql);
		}else{
			$sql="INSERT INTO subseccion (nom_Subseccion, id_seccion) VALUES ('$listaSubsecciones','$num_Sec')";
			$result=mysql_query($sql);
		}
	}
}

function añadirpregunta(){
	if(!empty($_POST['tit_Pregunta']) && !empty ($_POST['seccionesP']) && !empty($_POST['subseccionesP']) && !empty($_POST['TiposRespuestas'])  ){
		
		$tit_Pregunta=$_POST['tit_Pregunta'];
		$seccionesP=$_POST['seccionesP'];
		$subseccionesP=$_POST['subseccionesP'];
		$tipo=$_POST['TiposRespuestas'];

		$consulta3=mysql_query("SELECT id_seccion FROM seccion WHERE nom_seccion='$seccionesP'");
		$consulta4=mysql_query("SELECT id_subseccion FROM subseccion WHERE nom_subseccion='$subseccionesP'");

		$fila3=mysql_fetch_assoc($consulta3);
		$fila4=mysql_fetch_assoc($consulta4);

		$num_Sec = $fila3['id_seccion'];
		$num_Sub = $fila4['id_subseccion'];

		$sql="INSERT INTO pregunta (enunciado, id_Sec, id_Sub, tipo) VALUES ('$tit_Pregunta','$num_Sec','$num_Sub','$tipo')";
		$result=mysql_query($sql);
		
		/*
		if (!empty($_POST['opcion1'])){
			$op1=$_POST['opcion1'];
			$sql1="INSERT INTO respuesta (id_Sub, respuesta) VALUES ('$num_Sub','$op1')";
		}
		if (!empty($_POST['opcion2'])){
			$op2=$_POST['opcion2'];
			$sql2="INSERT INTO respuesta (id_Sub, respuesta) VALUES ('$num_Sub','$op2')";
		}
		if (!empty($_POST['opcion3'])){
			$op3=$_POST['opcion3'];
			$sql3="INSERT INTO respuesta (id_Sub, respuesta) VALUES ('$num_Sub','$op3')";
		}
		if (!empty($_POST['opcion4'])){
			$op4=$_POST['opcion4'];
			$sql4="INSERT INTO respuesta (id_Sub, respuesta) VALUES ('$num_Sub','$op4')";
		}
		*/
	}
}

/// MAIN
if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirCuestionario") {
	echo añadirCuestionario();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirSeccion") {
	añadirSeccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminarSeccion") {
	eliminaSeccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirSubseccion") {
	añadirSubseccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminaSubseccion") {
	eliminaSubseccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirPregunta") {
	añadirPregunta();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminaPregunta") {
	eliminaPregunta();
}


?>





