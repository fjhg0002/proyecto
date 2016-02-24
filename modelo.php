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
	$nomCuest=$_POST['nom_CuestB'];
	
	$consulta_Cuestionario1="select id_cuest FROM cuestionario where nom_cuest='$nomCuest'";
	$resultado_consulta_Cuest1=mysql_query($consulta_Cuestionario1);
	$fila1=mysql_fetch_array($resultado_consulta_Cuest1);
	$numCuest=$fila1["id_cuest"];
	
	$consulta_Cuestionario2="select id_seccion FROM seccion where nom_seccion='$secc' AND id_cuest='$numCuest'";
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
	$nomCuest=$_POST['nom_CuestB'];
	
	$consulta_Cuestionario1="select id_cuest FROM cuestionario where nom_cuest='$nomCuest'";
	$resultado_consulta_Cuest1=mysql_query($consulta_Cuestionario1);
	$fila1=mysql_fetch_array($resultado_consulta_Cuest1);
	$numCuest=$fila1["id_cuest"];
	
	$consulta_Cuestionario2="select id_seccion FROM seccion where nom_seccion='$secc' AND id_cuest='$numCuest'";
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
	$nomCuest=$_POST['nom_CuestB'];
	
	$consulta_Cuestionario1="select id_cuest FROM cuestionario where nom_cuest='$nomCuest'";
	$resultado_consulta_Cuest1=mysql_query($consulta_Cuestionario1);
	$fila1=mysql_fetch_array($resultado_consulta_Cuest1);
	$numCuest=$fila1["id_cuest"];
	
	$consulta_Cuestionario2="select id_seccion FROM seccion where nom_seccion='$secc' AND id_cuest='$numCuest'";
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
				$mensaje .= "<div id='DivSecciones'>";
				$mensaje .= "<div STYLE='height: 50px; width: 500px; border: 1px solid #000000'>";
				$mensaje .= "<div STYLE='margin-left: 10px; position: relative; top:33%'>Cuestionario del Usuario $cuestionarioNuevo</div>";
				$mensaje .= "</div>";
				while($fila1=mysql_fetch_array($resultado_consulta_Seccion)){
					$mensaje .= "<div STYLE='background-color:#B45F04; height: 50px; width: 500px; border: 1px solid #000000'>";
					$mensaje .= "<div STYLE='font-family: Georgia; margin-left: 20px; position: relative; top:33%'>";
					$mensaje .= "SECCION: ".$fila1["nom_seccion"];
					$mensaje .= "</div>";
					$mensaje .= "</div>";
					$id_seccion=$fila1["id_seccion"];
					$consulta_Subseccion="select * from subseccion where id_seccion='$id_seccion'";
					$resultado_consulta_Subseccion=mysql_query($consulta_Subseccion);				

					while($fila2=mysql_fetch_array($resultado_consulta_Subseccion)){
						$mensaje .= "<div STYLE='background-color:#FF8000; height: 50px; width: 500px; border: 1px solid #000000'>";
						$mensaje .= "<div STYLE='font-family: Georgia; margin-left: 40px; position: relative; top:33%'>";
						$mensaje .= "SUBSECCION: ".$fila2["nom_subseccion"];
						$mensaje .= "</div>";
						$mensaje .= "</div>";
						
						$id_subseccion=$fila2["id_subseccion"];
						$consulta_Pregunta="select * from pregunta where id_Sub='$id_subseccion'";
						$resultado_consulta_Pregunta=mysql_query($consulta_Pregunta);
						while($fila3=mysql_fetch_array($resultado_consulta_Pregunta)){						
							$mensaje .= "<div STYLE='background-color:#FF9F3F; height: 50px; width: 500px; border: 1px solid #000000'>";
							$mensaje .= "<div STYLE='font-family: Georgia; margin-left: 60px; position: relative; top:33%'>";
							$mensaje .= $fila3["enunciado"];
							$mensaje .= "</div>";
							$mensaje .= "</div>";
						}	
					}
				}
				$mensaje .= "</div>";
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
		
		$contra = base64_encode($password);

		$query=mysql_query("SELECT * FROM usuario WHERE username='".$username."'");
		$numrows=mysql_num_rows($query);

		if($numrows==0) {
			if ($password == $Rpassword){
				$sql="INSERT INTO usuario
					(name, last_name, type, email, username,password)
					VALUES('$name','$last_name','$type','$email', '$username', '$contra')";

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
		$message = "Ningún campo debe de estar vacio!";
	}
}

}

function buscarDatosUsuario(){
	$usuario=$_POST['usuario'];
			
	$consulta_Usuario="select * FROM usuario where username='$usuario'";
	$resultado_consulta_Usu=mysql_query($consulta_Usuario);
	$fila=mysql_fetch_array($resultado_consulta_Usu);
				
	$id_usu=$fila["id"];
	$name_usu=$fila["name"];
	$last_name_usu=$fila["last_name"];
	$type_usu=$fila["type"];
	$email_usu=$fila["email"];
	$username_usu=$fila["username"];
	$password_usu=$fila["password"];
	$contra = base64_decode($password_usu);
				
	$mensaje1 = "";
	$mensaje1 .= "<h2>Registro de Usuarios</h2>";
	$mensaje1 .= "<form name='modifyUserForm' id='modifyUserForm' action='intropageCoor.php' method='post'>";
	
	$mensaje1 .= "<label for='user_login'>Nombre:<br />";
	$mensaje1 .= "<input type='text' name='nameM' id='nameM' class value='$name_usu'><br><br>";
	
	$mensaje1 .= "<label for='user_login'>Apellidos:<br />";
	$mensaje1 .= "<input type='text' name='last_nameM' id='last_nameM' value='$last_name_usu'><br><br>";
	
	$mensaje1 .= "<label for='userlogin'>Tipo de usuario:</label> <br/>";
	$mensaje1 .= "<select id='typeM' name='typeM'><br>";
	
	$mensaje1 .= "<option value='ninguno'>- Selecciona Tipo de Usuario -</option>";
	if ($type_usu != 'coordinador'){
	$mensaje1 .= "<option value='coordinador'>Coordinador</option>";
	}
	if ($type_usu != 'tutor'){
	$mensaje1 .= "<option value='tutor'>Tutor</option>";
	}
	if ($type_usu != 'familia'){	
	$mensaje1 .= "<option value='familia'>familia</option>";
	}
	if ($type_usu != 'personaDown'){
	$mensaje1 .= "<option value='personaDown'>Persona Down</option>";
	}
	$mensaje1 .= "<option value='$type_usu' selected>$type_usu</option>";
	$mensaje1 .= "</select><br><br>";
	
	$mensaje1 .= "<label for='user_pass'>E-mail:<br />";
	$mensaje1 .= "<input type='emailM' name='emailM' id='emailM' value='$email_usu'><br><br>";
	
	$mensaje1 .= "<label for='user_pass'>Nombre De Usuario:<br />";
	$mensaje1 .= " <input type='text' name='usernameM' id='usernameM' value='$username_usu'><br><br>";
	
	$mensaje1 .= "<label for='user_pass'>Contraseña:<br />";
	$mensaje1 .= "<input type='password' name='passwordM' id='passwordM' value='$contra'><br><br>";
	
	$mensaje1 .= "<label for='user_pass'>Repetir Contraseña:<br />";
	$mensaje1 .= "<input type='password' name='RpasswordM' id='RpasswordM' value='$contra'>";
	
	$mensaje1 .= "<p class='submit'>";
	$mensaje1 .= "<input type='submit' name='buttonD' id='buttonD' class='button' value='Modificar Usuario' onclick='modificarUsuario()'>";
	$mensaje1 .= "</p>";
	$mensaje1 .= "</form>";
	return $mensaje1;				
			
}

function modificarDatosUsuario(){
	
		if(!empty($_POST['nameM']) && !empty($_POST['last_nameM']) && !empty($_POST['typeM']) && !empty($_POST['emailM']) && !empty($_POST['usernameM']) && !empty($_POST['passwordM']) && !empty($_POST['RpasswordM'])) {


		$userM=$_POST['usuario'];
		$nameM=$_POST['nameM'];
		$last_nameM=$_POST['last_nameM'];
		$typeM=$_POST['typeM'];
		$emailM=$_POST['emailM'];
		$usernameM=$_POST['usernameM'];
		$passwordM=$_POST['passwordM'];
		$RpasswordM=$_POST['RpasswordM'];
		
		$contra = base64_encode($passwordM);
		
		$consultaM=mysql_query("SELECT id FROM usuario WHERE username='$userM'");  
		$filaM=mysql_fetch_assoc($consultaM);
		$numUser = $filaM['id'];

			if (($passwordM == $RpasswordM) && ($userM == $usernameM)){
				$sqlM="UPDATE usuario SET name='$nameM', last_name='$last_nameM', type='$typeM', type='$typeM', password = '$contra'
					WHERE id='$numUser'";
				$resultM=mysql_query($sqlM);

				if($resultM){
	 				$messageM = "Usuario modificado correctamente";
				} else {
	 				$messageM = "Error al ingresar datos de la informacion!";
				}
			} else {
				$messageM = "No coinciden las contraseñas o cambiaste el nombre de usuario!";
			}
		} else {
		$messageM = "Ningún campo debe de estar vacio!";
		}
	return $messageM;
}

function deleteUsuario(){
	if (!empty($_POST['usuario'])){
		
		$user=$_POST['usuario'];
		
		$sql="DELETE FROM usuario WHERE username='$user'";
		$consulta = mysql_query($sql);
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
		if( !empty($_POST['seccionesDSe']) && !empty($_POST['nom_CuestB'])){
	
		$nomCuest = $_POST['nom_CuestB'];
		$sql0 ="SELECT id_cuest FROM cuestionario WHERE nom_cuest = '$nomCuest'";
		$consulta0 = mysql_query($sql0);
		$fila0=mysql_fetch_assoc($consulta0);
		$numCuest = $fila0['id_cuest'];
		
		$toRet="";
		$seccionesDSe = $_POST['seccionesDSe'];
 		$sqlA="SELECT id_seccion FROM seccion WHERE nom_seccion='$seccionesDSe' AND id_cuest='$numCuest'";
		$toRet+="A: "+$sqlA+"\n";
		$consulta=mysql_query($sqlA);
		$fila=mysql_fetch_assoc($consulta);
		$num_Sec=$fila['id_seccion'];
		
		$sqlB="DELETE FROM seccion WHERE id_seccion=$num_Sec";
		$toRet+="B: "+$sqlB+"\n";

		$result=mysql_query($sqlB);
		
		$sqlC="SELECT id_subseccion FROM subseccion WHERE id_seccion='$num_Sec'";
		$consulta1=mysql_query($sqlC);
		$toRet+="C: "+$sqlC+"\n";
		while($fila1=mysql_fetch_array($consulta1)){
			$sqlD="DELETE FROM subseccion WHERE id_subseccion=$fila1[id_subseccion]";
			$result1=mysql_query($sqlD);
			$toRet+="   D: "+$sqlD+"\n";
		}
		
		$sqlE="SELECT id FROM pregunta WHERE id_Sec='$num_Sec'";
		$consulta2=mysql_query($sqlE);
		$toRet+="B: "+$sqlE+"\n";
		while($fila2=mysql_fetch_array($consulta2)){
			$sqlF="DELETE FROM pregunta WHERE id=$fila2[id]";
			$result2=mysql_query($sqlF);
			$toRet+="     F: "+$sqlF+"\n";
			$sqlG="DELETE FROM respuesta WHERE id_pre=$fila2[id]";
			$result3=mysql_query($sqlG);
			$toRet+="     G: "+$sqlG+"\n";
		}
	}
	return $toRet;
}

function añadirSubseccion(){
	if(!empty($_POST['seccionesNSu']) && !empty($_POST['nom_CuestB']) && (!empty($_POST['subseccionesNSu']) || !empty ($_POST['nom_Sub']))){
		
		$seccionesNSu=$_POST['seccionesNSu'];
		$subseccionesNSu=$_POST['subseccionesNSu'];
		$nom_Sub=$_POST['nom_Sub'];
		$nomCuest = $_POST['nom_CuestB'];

		$consulta=mysql_query("SELECT id_cuest FROM cuestionario WHERE nom_cuest='$nomCuest'");  
		$fila=mysql_fetch_assoc($consulta);
		$numCuest = $fila['id_cuest'];

		$consulta20=mysql_query("SELECT id_seccion FROM seccion WHERE nom_seccion='$seccionesNSu' AND id_cuest='$numCuest'");  
		$fila20=mysql_fetch_assoc($consulta20);
		$num_Sec = $fila20['id_seccion'];

		if($subseccionesNSu=="otra"){
			$sql="INSERT INTO subseccion (nom_subseccion, id_seccion) VALUES ('$nom_Sub','$num_Sec')";
			$result=mysql_query($sql);
		}else{
			$sql="INSERT INTO subseccion (nom_subseccion, id_seccion) VALUES ('$subseccionesNSu','$num_Sec')";
			$result=mysql_query($sql);
		}
	}
}

function eliminarSubseccion(){
	if (!empty($_POST['subseccionesDSu']) && !empty($_POST['nom_CuestB']) && !empty($_POST['seccionesDSu'])){
	
		$nomCuest = $_POST['nom_CuestB'];
		$seccionesDSu = $_POST['seccionesDSu'];
		$subseccionesDSu = $_POST['subseccionesDSu'];

		$sql0="SELECT id_cuest FROM cuestionario WHERE nom_cuest='$nomCuest'";
		$consulta0=mysql_query($sql0);
		$fila0=mysql_fetch_assoc($consulta0);
		$numCuest=$fila0['id_cuest'];

		$sql1="SELECT id_seccion FROM seccion WHERE nom_seccion='$seccionesDSu' AND id_cuest='$numCuest'";
		$consulta1=mysql_query($sql1);
		$fila1=mysql_fetch_assoc($consulta1);
		$numSec=$fila1['id_seccion'];

		$sql2="SELECT id_subseccion FROM subseccion WHERE nom_subseccion='$subseccionesDSu' AND id_seccion='$numSec'";
		$consulta2=mysql_query($sql2);
		$fila2=mysql_fetch_assoc($consulta2);
		$numSub=$fila2['id_subseccion'];
		
		$sql="DELETE FROM subseccion WHERE id_subseccion='$numSub'";
		$result=mysql_query($sql);
		
		$sql3="SELECT id FROM pregunta WHERE id_Sub='$numSub'";
		$consulta3=mysql_query($sql3);
		while($fila3=mysql_fetch_array($consulta3)){
			$sql4="DELETE FROM pregunta WHERE id=$fila3[id]";
			$result1=mysql_query($sql4);
			$sql5="DELETE FROM respuesta WHERE id_pre=$fila3[id]";
			$result2=mysql_query($sql5);
		}	
	}
}

function añadirPregunta(){
	if(!empty($_POST['tit_Pregunta']) && !empty($_POST['nom_CuestB']) && !empty ($_POST['seccionesNPr']) && !empty($_POST['subseccionesNPr']) && !empty($_POST['TiposRespuestas'])  ){
		
		$tit_Pregunta=$_POST['tit_Pregunta'];
		$seccionesNPr=$_POST['seccionesNPr'];
		$subseccionesNPr=$_POST['subseccionesNPr'];
		$tipo=$_POST['TiposRespuestas'];
		$nomCuest=$_POST['nom_CuestB'];

		$sql0="SELECT id_cuest FROM cuestionario WHERE nom_cuest='$nomCuest'";
		$consulta0=mysql_query($sql0);
		$fila0=mysql_fetch_assoc($consulta0);
		$numCuest=$fila0['id_cuest'];
		
		$consulta3=mysql_query("SELECT id_seccion FROM seccion WHERE nom_seccion='$seccionesNPr' AND id_cuest='$numCuest'");
		$fila3=mysql_fetch_assoc($consulta3);
		$num_Sec = $fila3['id_seccion'];

		$consulta4=mysql_query("SELECT id_subseccion FROM subseccion WHERE nom_subseccion='$subseccionesNPr' AND id_seccion='$num_Sec'");
		$fila4=mysql_fetch_assoc($consulta4);
		$num_Sub = $fila4['id_subseccion'];

		$sql="INSERT INTO pregunta (enunciado, id_Sec, id_Sub, tipo) VALUES ('$tit_Pregunta','$num_Sec','$num_Sub','$tipo')";
		$result=mysql_query($sql);
	}
}

function eliminarPregunta(){
	if(!empty($_POST['seccionesDPr']) && !empty ($_POST['subseccionesDPr']) && !empty($_POST['preguntas']) ){
			   
		$seccionesDPr=$_POST['seccionesDPr'];
		$subseccionesDPr=$_POST['subseccionesDPr'];
		$preguntas=$_POST['preguntas'];

		$consulta3=mysql_query("SELECT id_seccion FROM seccion WHERE nom_seccion='$seccionesDPr'");
		$consulta4=mysql_query("SELECT id_subseccion FROM subseccion WHERE nom_subseccion='$subseccionesDPr'");

		$fila3=mysql_fetch_assoc($consulta3);
		$fila4=mysql_fetch_assoc($consulta4);

		$numSec = $fila3['id_seccion'];
		$numSub = $fila4['id_subseccion'];

		$consulta=mysql_query("SELECT id FROM pregunta WHERE enunciado='$preguntas' AND id_Sec='$numSec' AND id_Sub='$numSub'");
		$fila=mysql_fetch_assoc($consulta);
		$num_Pre = $fila['id'];

		$sqlA="DELETE FROM pregunta WHERE id='$num_Pre'";
		$resultA=mysql_query($sqlA);
		
		$sql1="SELECT id_resp FROM respuesta WHERE id_pre='$num_Pre'";
		$consulta1=mysql_query($sql1);
		while($fila1=mysql_fetch_array($consulta1)){
			$sql2="DELETE FROM respuesta WHERE id_resp=$fila1[id_resp]";
			$result1=mysql_query($sql2);
		}
	}
}


function añadirRespuesta(){
		$tit_Pregunta = $_POST['tit_Pregunta'];
		$consulta5=mysql_query("SELECT id FROM pregunta WHERE enunciado='$tit_Pregunta'");
		$fila5=mysql_fetch_assoc($consulta5);
		$num_Pre = $fila5['id'];
		$tipo = $_POST['TiposRespuestas'];
	
		
	if ( $tipo == 'corta'){
		$Corta=$_POST['RCorta'];
		$sqlC="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$Corta')";
		$resultC=mysql_query($sqlC);
	}
	
	if ( $tipo == 'larga'){
		$Larga=$_POST['RLarga'];
		$sqlL="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$Larga')";
		$resultL=mysql_query($sqlL);
	}
	
	if( $tipo == 'desplegable' || $tipo == 'cuadros' || $tipo == 'circulos'){
		if (!empty($_POST['opcion1'])){
			$op1=$_POST['opcion1'];
			$sql1="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$op1')";
			$result1=mysql_query($sql1);
		}
		
		if (!empty($_POST['opcion2'])){
			$op2=$_POST['opcion2'];
			$sql2="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$op2')";
			$result2=mysql_query($sql2);
		}

		if (!empty($_POST['opcion3'])){
			$op3=$_POST['opcion3'];
			$sql3="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$op3')";
			$result3=mysql_query($sql3); 
		}
		
		if (!empty($_POST['opcion4'])){
			$op4=$_POST['opcion4'];
			$sql4="INSERT INTO respuesta (id_pre, respuesta) VALUES ('$num_Pre','$op4')";
			$result4=mysql_query($sql4); 
		}
	}
	return "SI";
}

function tipodeRespuesta(){
	if (!empty($_POST['TiposRespuestas'])){
		$tipo="";
		$tipo=$_POST['TiposRespuestas'];
		if($tipo=='larga'){
			$mensaje = "";
			$mensaje .= "<label>Respuesta<br><br>";
			$mensaje .= "<textarea id='RLarga' rows='4' cols='50'></textarea><br>";
			return $mensaje;
		}
		if($tipo=='corta'){
			$mensaje = "";
			$mensaje .= "<label>Respuesta<br>";
			$mensaje .= "<input type='text' id='RCorta' class value=''><br>";
			return $mensaje;
		}
		if($tipo=='botones' || $tipo=='cuadros' || $tipo=='desplegable'){
			$mensaje = "";
			$mensaje .= "<label>Respuestas<br>";
			$mensaje .= "<label>Opcion 1";
			$mensaje .= "<input type='text' id='opcion1' class value=''><br>";
			$mensaje .= "<label>Opcion 2";
			$mensaje .= "<input type='text' id='opcion2' class value=''><br>";
			$mensaje .= "<label>Opcion 3";
			$mensaje .= "<input type='text' id='opcion3' class value=''><br>";
			$mensaje .= "<label>Opcion 4";
			$mensaje .= "<input type='text' id='opcion4' class value=''><br><br>";
			return $mensaje;
		}
	}
}

/// MAIN
if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirCuestionario") {
	echo añadirCuestionario();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="buscarDatosUsuario") {
	echo buscarDatosUsuario();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="modificarUsuario") {
	echo modificarDatosUsuario();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminarUsuario") {
	echo deleteUsuario();
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
	echo añadirSeccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminarSeccion") {
	echo eliminarSeccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="dialogoEliminaSeccion") {
	echo dialogoEliminaSeccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirSubseccion") {
	echo añadirSubseccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminarSubseccion") {
	echo eliminarSubseccion();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirPregunta") {
	echo añadirPregunta();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="añadirRespuesta") {
	echo añadirRespuesta();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="eliminarPregunta") {
	echo eliminarPregunta();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="tipoRespuesta") {
	echo tipodeRespuesta();
}

if( isset( $_POST["funcion"]) && $_POST["funcion"]=="recuperaPreguntas") {
	echo recuperaPreguntas();
}



?>


