<?php
session_start();
?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php

if(isset($_SESSION["session_username"])){
	// echo "Session is set"; // for testing purposes
	header("Location: intropage.php");
}

if(isset($_POST["login"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
    	$username=$_POST['username'];
    	$password=$_POST['password'];

    	$query =mysql_query("SELECT * FROM usuario WHERE username='".
							$username."' AND password='".$password."'");

    	$numrows=mysql_num_rows($query);
    	if($numrows!=0){
    		while($row=mysql_fetch_assoc($query)){
    			$dbusername=$row['username'];
    			$dbpassword=$row['password'];
				$dbtype=$row['type'];

    		}

    		if($username == $dbusername && $password == $dbpassword){
    			$_SESSION['session_username']=$username;
				
				if($dbtype=="coordinador")
					header("Location: intropageCoor.php");
				if($dbtype=="personaDown")
						header("Location: intropageDown.php");
				if($dbtype=="Tutor")
						header("Location: intropageTutor.php");
				if($dbtype=="Familia"){
						header("Location: intropageFamilia.php");
    			/* Redirect browser */
    			header("Location: intropage.php");
				}
    		}
    	} else {
 			$message =  "Nombre de usuario ó contraseña invalida!";
   		}
	} else {
    $message = "Todos los campos son requeridos!";
	}
} else {
	header("Location: login.php");
	$message = "Debe de rellenar todos los campos!";

}
?>
