<!DOCTYPE html>
<html>
<head>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="../../assets/css/styleLogin.css?ver=1.2">
	<title>video de loteria</title>

</head>
<body>
	<div class="video-container">
		<form action="" method="post">
			<div class="top-header">
				<header>Sorteo.com</header>
			</div>

		<div class="contenido-login">
			<div class="input-field">			
				<input type="text" name="nombre" class="input" placeholder="Usuario" required>
				<i class="bx bx-user"></i>
			</div>
			<div class="input-field">			
				<input type="password" name="password" class="input" placeholder="Contraseña" required>
				<i class="bx bx-lock-alt"></i>
			</div>
			<div class="input-field">			
				<input type="submit" name="submit" class="submit" value="Iniciar sesión">
			</div class="input-field">
			<p class="input">Crear cuenta? <a class="input" href="registro.php">Registrarse</a></p>
		</div>
		</form>
	</div>

	<video autoplay muted plays-inline class="back-video">
		<source src="../../assets/video_corto.mp4" type="video/mp4">
	</video>

</body>
</html>

<?php
require '../../assets/php/dbconnection.php';

session_start();

if(isset($_POST['submit'])){

   $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM registro WHERE nombre = '$nombre' && password = '$pass' ";

   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      	$_SESSION['usuario'] = $row['nombre'];
        header('location:index.php');
	  
   }else{
	?>
	<h3 class="bad">Información incorrecta. Vuélvelo a intentar</h3>
	<?php
   }
};
$con->close();
?>

