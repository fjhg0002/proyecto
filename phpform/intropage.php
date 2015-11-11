<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>


<?php include("includes/header.php"); ?>
<div id="welcome">	
	<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	<p><a href="logout.php">Finalice</a> sesión aquí!</p>
</div>

<?php include("includes/footer.php"); ?>
	

<?php
}
?>
