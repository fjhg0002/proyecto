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
$resultado=mysql_query("SELECT username FROM userlitdb");

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
?>