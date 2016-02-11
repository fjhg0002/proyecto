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

function seccionesSegunCuestionario(){
	
	$cuest=$_POST['nom_CuestB'];
	$consulta_Cuestionario="select id_cuest FROM cuestionario where nom_cuest='$cuest'";
	$resultado_consulta_Cuest=mysql_query($consulta_Cuestionario);
	$fila=mysql_fetch_array($resultado_consulta_Cuest);
	$numCuest=$fila["id_cuest"];

	$resultado=mysql_query("SELECT nom_seccion FROM seccion WHERE id_cuest='$numCuest'");
	$secciones = array();
	while ($filaSec = mysql_fetch_array($resultado)){
		$secciones[]=$filaSec['nom_seccion'];
	}
	$sec= implode(",", $secciones);
	return $sec;
}

function subseccionesSegunSeccionDSu(){
	
	$secc=$_POST['seccionesDSu'];
	$consulta_Cuestionario2="select id_seccion FROM seccion where nom_seccion='$secc'";
	$resultado_consulta_Cuest2=mysql_query($consulta_Cuestionario2);
	$fila2=mysql_fetch_array($resultado_consulta_Cuest2);
	$numSec=$fila2["id_seccion"];

	$resultado2=mysql_query("SELECT nom_subseccion FROM subseccion WHERE id_seccion='$numSec'");
	$subsecciones = array();
	while ($filaSub = mysql_fetch_array($resultado2)){
		$subsecciones[]=$filaSub['nom_subseccion'];
	}
	$sub= implode(",", $subsecciones);
	return $sub;
}

function subseccionesSegunSeccionNPr(){
	
	$secc=$_POST['seccionesNPr'];
	$consulta_Cuestionario2="select id_seccion FROM seccion where nom_seccion='$secc'";
	$resultado_consulta_Cuest2=mysql_query($consulta_Cuestionario2);
	$fila2=mysql_fetch_array($resultado_consulta_Cuest2);
	$numSec=$fila2["id_seccion"];

	$resultado2=mysql_query("SELECT nom_subseccion FROM subseccion WHERE id_seccion='$numSec'");
	$subsecciones = array();
	while ($filaSub = mysql_fetch_array($resultado2)){
		$subsecciones[]=$filaSub['nom_subseccion'];
	}
	$sub= implode(",", $subsecciones);
	return $sub;
}

function subseccionesSegunSeccionDPr(){
	
	$secc=$_POST['seccionesDPr'];
	$consulta_Cuestionario2="select id_seccion FROM seccion where nom_seccion='$secc'";
	$resultado_consulta_Cuest2=mysql_query($consulta_Cuestionario2);
	$fila2=mysql_fetch_array($resultado_consulta_Cuest2);
	$numSec=$fila2["id_seccion"];

	$resultado2=mysql_query("SELECT nom_subseccion FROM subseccion WHERE id_seccion='$numSec'");
	$subsecciones = array();
	while ($filaSub = mysql_fetch_array($resultado2)){
		$subsecciones[]=$filaSub['nom_subseccion'];
	}
	$sub= implode(",", $subsecciones);
	return $sub;
}

function preguntasSegunSubsecciones(){
	
	$subs=$_POST['subseccionesDPr'];
	$consulta_Cuestionario2="select id_subseccion FROM subseccion where nom_subseccion='$subs'";
	$resultado_consulta_Cuest2=mysql_query($consulta_Cuestionario2);
	$fila2=mysql_fetch_array($resultado_consulta_Cuest2);
	$numSub=$fila2["id_subseccion"];

	$resultado2=mysql_query("SELECT enunciado FROM pregunta WHERE id_Sub='$numSub'");
	$preguntas = array();
	while ($filaPre = mysql_fetch_array($resultado2)){
		$preguntas[]=$filaPre['enunciado'];
	}
	$pre= implode(",", $preguntas);
	return $pre;
}

function getTodasLasSecciones(){
$resultado=mysql_query("SELECT DISTINCT nom_seccion FROM seccion");

$secciones = array();
while($fila = mysql_fetch_array($resultado)){
	$secciones[]=$fila;
}
return $secciones;
}

function getTodasLasSubsecciones(){
$resultado=mysql_query("SELECT DISTINCT nom_subseccion FROM subseccion");

$subsecciones = array();
while($fila = mysql_fetch_array($resultado)){
	$subsecciones[]=$fila;
}
return $subsecciones;
}

function getTodasLasPreguntas(){
$resultado=mysql_query("SELECT enunciado FROM pregunta");

$preguntas = array();
while($fila = mysql_fetch_array($resultado)){
	$preguntas[]=$fila;
}
return $preguntas;
}

function getTodasLasPreguntasSegúnSubseccion($seccion,$subseccion){
$resultado=mysql_query("SELECT enunciado FROM pregunta WHERE id_Sec=$seccion AND id_Sub=$subseccion");

$preguntas = array();
while($fila = mysql_fetch_array($resultado)){
	$preguntas[]=$fila;
}
return $preguntas;
}

function recuperaPreguntas(){
				$cuestionarioNuevo=$_POST['nom_CuestB'];
				$consulta_Cuestionario="select id_cuest FROM cuestionario where nom_cuest='$cuestionarioNuevo'";
				$resultado_consulta_Cuest=mysql_query($consulta_Cuestionario);
				$fila=mysql_fetch_array($resultado_consulta_Cuest);
				$numCuest=$fila["id_cuest"];
				
				$consulta_Seccion="select * from seccion where id_cuest='$numCuest'";
				$resultado_consulta_Seccion=mysql_query($consulta_Seccion);
				
				$mensaje = "";
				$mensaje .= "<table border=1 cellspacing=0 cellpadding=2table>";
				$mensaje .= "<tr><td>Cuestionario</tr></td>";
				while($fila1=mysql_fetch_array($resultado_consulta_Seccion)){
					$mensaje .= "<tr><td bgcolor='#A4A4A4'>";
					$mensaje .= "SECCION: ".$fila1["nom_seccion"];
					$mensaje .= "</tr></td>";
					$id_seccion=$fila1["id_seccion"];
					$consulta_Subseccion="select * from subseccion where id_seccion='$id_seccion'";
					$resultado_consulta_Subseccion=mysql_query($consulta_Subseccion);				

					while($fila2=mysql_fetch_array($resultado_consulta_Subseccion)){
						$mensaje .= "<tr><td bgcolor='#BDBDBD'>";
						$mensaje .= "SUBSECCION: ".$fila2["nom_subseccion"];
						$mensaje .= "</tr></td>";
						
						$id_subseccion=$fila2["id_subseccion"];
						$consulta_Pregunta="select * from pregunta where id_Sub='$id_subseccion'";
						$resultado_consulta_Pregunta=mysql_query($consulta_Pregunta);
						while($fila3=mysql_fetch_array($resultado_consulta_Pregunta)){
							$mensaje .= "<tr><td bgcolor='#E6E6E6'>";
							$mensaje .= $fila3["enunciado"];
							$mensaje .= "</tr></td>";
						}	
					}
				}
				$mensaje .= "</table>";
				return $mensaje;
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
	if( !empty($_POST['nom_CuestB']) && (!empty($_POST['nom_Sec']) || !empty($_POST['seccionesNSe']))){
	
		$nom_Cuest=$_POST['nom_CuestB'];
		$secciones = $_POST['seccionesNSe'];
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

function eliminarSeccion(){
		if( !empty($_POST['seccionesDSe'])){
	
		$seccionesDSe = $_POST['seccionesDSe'];
 		
		$consulta=mysql_query("SELECT id_seccion FROM seccion WHERE nom_seccion='$seccionesDSe'");
		$fila=mysql_fetch_assoc($consulta);
		$num_Sec=$fila['id_seccion'];
		$sql="DELETE FROM seccion WHERE id_seccion=$num_Sec";
		$result=mysql_query($sql);
		
		$consulta1=mysql_query("SELECT id_subseccion FROM subseccion WHERE id_seccion='$num_Sec'");
		while($fila1=mysql_fetch_array($consulta1)){
			$sql1="DELETE FROM subseccion WHERE id_subseccion=$fila1[id_subseccion]";
			$result1=mysql_query($sql1);
		}
		
		$consulta2=mysql_query("SELECT id FROM pregunta WHERE id_Sec='$num_Sec'");
		while($fila2=mysql_fetch_array($consulta2)){
			$sql2="DELETE FROM pregunta WHERE id=$fila2[id]";
			$result2=mysql_query($sql2);
		}	
	}
}

function añadirSubseccion(){
	if(!empty($_POST['seccionesNSu']) && (!empty($_POST['subseccionesNSu']) || !empty ($_POST['nom_Sub']))){
		
		$seccionesNSu=$_POST['seccionesNSu'];
		$subseccionesNSu=$_POST['subseccionesNSu'];
		$nom_Sub=$_POST['nom_Sub'];
		
		$consulta2=mysql_query("SELECT id_seccion FROM seccion WHERE nom_Seccion='$seccionesNSu'");
							  
		$fila2=mysql_fetch_assoc($consulta2);
		$num_Sec = $fila2['id_seccion'];
		
		if($subseccionesNSu=="otra"){
			$sql="INSERT INTO subseccion (nom_Subseccion, id_seccion) VALUES ('$nom_Sub','$num_Sec')";
			$result=mysql_query($sql);
		}else{
			$sql="INSERT INTO subseccion (nom_Subseccion, id_seccion) VALUES ('$subseccionesNSu','$num_Sec')";
			$result=mysql_query($sql);
		}
	}
}

function eliminarSubseccion(){
	if (!empty($_POST['subseccionesDSu'])){
	
		$subseccionesDSu = $_POST['subseccionesDSu'];
 		
		$consulta=mysql_query("SELECT id_subseccion FROM subseccion WHERE nom_subseccion='$subseccionesDSu'");
		$fila=mysql_fetch_assoc($consulta);
		$num_sub=$fila['id_subseccion'];
		$sql="DELETE FROM subseccion WHERE id_subseccion=$num_sub";
		$result=mysql_query($sql);
		
		$consulta2=mysql_query("SELECT id FROM pregunta WHERE id_Sub='$num_Sub'");
		while($fila2=mysql_fetch_array($consulta2)){
			$sql2="DELETE FROM pregunta WHERE id=$fila2[id]";
			$result2=mysql_query($sql2);
		}	
	}
}

function añadirPregunta(){
	if(!empty($_POST['tit_Pregunta']) && !empty ($_POST['seccionesNPr']) && !empty($_POST['subseccionesNPr']) && !empty($_POST['TiposRespuestas'])  ){
		
		$tit_Pregunta=$_POST['tit_Pregunta'];
		$seccionesNPr=$_POST['seccionesNPr'];
		$subseccionesNPr=$_POST['subseccionesNPr'];
		$tipo=$_POST['TiposRespuestas'];

		$consulta3=mysql_query("SELECT id_seccion FROM seccion WHERE nom_seccion='$seccionesNPr'");
		$consulta4=mysql_query("SELECT id_subseccion FROM subseccion WHERE nom_subseccion='$subseccionesNPr'");

		$fila3=mysql_fetch_assoc($consulta3);
		$fila4=mysql_fetch_assoc($consulta4);

		$num_Sec = $fila3['id_seccion'];
		$num_Sub = $fila4['id_subseccion'];

		$sql="INSERT INTO pregunta (enunciado, id_Sec, id_Sub, tipo) VALUES ('$tit_Pregunta','$num_Sec','$num_Sub','$tipo')";
		$result=mysql_query($sql);
	}
}

function eliminarPregunta(){
	if(!empty($_POST['seccionesP']) && !empty ($_POST['subseccionesP']) && !empty($_POST['preguntas'])){
			   
		$seccionesP=$_POST['seccionesP'];
		$subseccionesP=$_POST['subseccionesP'];
		$preguntas=$_POST['preguntas'];

		$consulta=mysql_query("SELECT id FROM pregunta WHERE enunciado='$preguntas'");
		$fila=mysql_fetch_assoc($consulta);
		$num_Pre = $fila['id'];


		$sql="DELETE FROM pregunta WHERE id='$num_Pre')";
		$result=mysql_query($sql);
	}
}


function añadirRespuesta(){
		$tit_Pregunta = $_POST['tit_Pregunta'];
		$consulta5=mysql_query("SELECT id FROM pregunta WHERE enunciado='$tit_Pregunta'");
		$fila5=mysql_fetch_assoc($consulta5);
		$num_Pre = $fila5['id'];

			$op1=$_POST['opcion1'];
			$sql1="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$op1')";
		
			$op2=$_POST['opcion2'];
			$sql2="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$op2')";
		return $num_Pre;

		if (!empty($_POST['opcion3'])){
			$op3=$_POST['opcion3'];
			$sql3="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$op3')";
		}
		if (!empty($_POST['opcion4'])){
			$op4=$_POST['opcion4'];
			$sql4="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$op4')";
		}
	return "SI";
}

/// MAIN
if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirCuestionario") {
	echo añadirCuestionario();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="listadoSecciones") {
	echo seccionesSegunCuestionario();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="listadoSubseccionesDSu") {
	echo subseccionesSegunSeccionDSu();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="listadoSubseccionesNPr") {
	echo subseccionesSegunSeccionNPr();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="listadoSubseccionesDPr") {
	echo subseccionesSegunSeccionDPr();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="listadoPreguntas") {
	echo preguntasSegunSubsecciones();
}


if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirSeccion") {
	añadirSeccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminarSeccion") {
	echo eliminarSeccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="dialogoEliminaSeccion") {
	echo dialogoEliminaSeccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirSubseccion") {
	añadirSubseccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminarSubseccion") {
	eliminarSubseccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirPregunta") {
	echo añadirPregunta();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirRespuesta") {
	echo añadirRespuesta();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminarPregunta") {
	eliminarPregunta();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="recuperaPreguntas") {
	echo recuperaPreguntas();
}

?>


