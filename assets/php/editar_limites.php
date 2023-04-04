<?php
if (isset($_POST)){
$Id_Number = $_POST['id'];
$MaxSorteo = $_POST['MaxSorteo'];
$MinSorteo = $_POST['MinSorteo'];

    }
require 'dbconnection.php'; 

$sql = "UPDATE `numeros` SET `Maxbet_number`='$MaxSorteo',`Minbet_number`='$MinSorteo'
 WHERE Id_number = $Id_Number";

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