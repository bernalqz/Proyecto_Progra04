<!DOCTYPE html>
<html>
<head>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="../../assets/css/styleLogin.css?ver=1.2">

	<title>video de loteria</title>
</head>
<body>

<div class="video-container2">
	<div class="contenido-registro">
		<form action="" method="post">
		<div class="top-header">
		<header>Sorteo.com</header>
		</div>
		<div class="input-field">			
			<input type="text" name="nombre" class="input" placeholder="Nombre" required>
			<i class="bx bx-user"></i>
		</div>
		<div class="input-field">			
			<input type="text" name="email" class="input" placeholder="Email" required>
			<i class='bx bx-envelope'></i>
		</div>
		<div class="input-field">			
			<input type="password" name="password" class="input" placeholder="Contraseña" required>
			<i class="bx bx-lock-alt"></i>
		</div>
		<div class="input-field">			
			<input type="password" name="cpassword" class="input" placeholder="Comfirmar" required>
			<i class="bx bx-lock-alt"></i>
		</div>
		<div class="input-field">			
			<input href="login.php" type="submit" name="submit" class="submit2" value="Registrarse">
		</div>
		<p class="pa">Ya tienes una cuenta? <a href="login.php">login</a></p>
		</form>
	</div>
</div>

	<video autoplay muted plays-inline class="back-video">
		<source src="../../assets/r-video.mp4" type="video/mp4">
	</video>

</body>
</html>

<?php
require '../../assets/php/dbconnection.php';

if(isset($_POST['submit'])){

   $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $sql = " SELECT * FROM registro WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($con, $sql);

   if(mysqli_num_rows($result) > 0){
	?>
    <h3 class="bad">Usuario existente. Escoja uno que esté disponible</h3>
	<?php
   }else{

      if($pass != $cpass){
	?>
	<h3 class="bad">Las contraseñas no coinsiden</h3>
	<?php
      }else{
         $insert = "INSERT INTO registro (nombre, email, password) VALUES('$nombre','$email','$pass')";
         mysqli_query($con, $insert);
         header('location:login.php');
      }
   }
};
$con->close();
?>