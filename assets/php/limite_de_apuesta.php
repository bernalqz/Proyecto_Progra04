<?php
if (isset($_POST)){
$Seleccion_nombre = $_POST['seleccion'];
$Numero = $_POST['numero'];
$MaxSorteo = $_POST['MaxSorteo'];
$MinSorteo = $_POST['MinSorteo'];
$Limited_number=1;
    }
require 'dbconnection.php'; 




// Consultar el id por medio del nombre seleccionado que se recibe en POST
$sql ="SELECT `Id_raffle` FROM `sorteos` WHERE `Name_raffle` = '$Seleccion_nombre';";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$Id_raffle = $row['Id_raffle'];
echo $Id_raffle;
//------ end


// Para actualizar el número con el Maximo y el mínimo

$sql="UPDATE `numeros` SET `Maxbet_number`='$MaxSorteo',`Minbet_number`='$MinSorteo',`Limited_number`='$Limited_number' WHERE Id_raffle_number = $Id_raffle AND Number_number = $Numero ";

if ($con->query($sql)===true) 
{
   HEADER("Location: ../../app/views/limites-de-apuesta.php");
}
else
{
    die("Error al editar datos: ".$conexion->error);
}

$con->close();

 ?>