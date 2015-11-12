<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>


<?php include("includes/header.php"); ?>
<div class="container cabecera" id="cabecera" >	
	<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
    <h2>Está en la sesión de Familia</h2>
	<p><a href="logout.php">Finalice</a> sesión aquí!</p>
</div>

<div class="container menu" id="menu" >	
	<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
    <h2>Está en la sesión de Familia</h2>
	<p><a href="logout.php">Finalice</a> sesión aquí!</p>
</div>

<div class="container contenido" id="contenido" >	
	<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
    <h2>Está en la sesión de Familia</h2>
	<p><a href="logout.php">Finalice</a> sesión aquí!</p>
</div>

<?php include("includes/footer.php"); ?>
	

<?php
}
?>
