
<?php
if (isset($_POST)){
$Id_bet = $_POST['id'];
$Name = $_POST['name'];
}
echo $Name;
echo $Id_bet;

?>
<?php
require 'dbconnection.php'; 

$sql="UPDATE `apuestas` SET `Ganador_bet`='0' WHERE Id_bet = '$Id_bet'";
if ($con->query($sql)===true) 
{
   $mensaje= "El pago a ".$Name." fué realizado"; 

   HEADER("Location: ../../app/views/panel-de-juego.php?mensaje=$mensaje");
}
else
{
    die("Error al editar datos: ".$conexion->error);
}


$con->close();
?>