<?php
if (isset($_POST)){
$Id_raffle = $_POST['id'];
$NombreSorteo = $_POST['NombreSorteo'];
$VecesSorteo = $_POST['VecesSorteo'];
$MaxSorteo = $_POST['MaxSorteo'];
$MinSorteo = $_POST['MinSorteo'];
    }
require 'dbconnection.php'; 

$sql = "UPDATE `sorteos` SET `Name_raffle`='$NombreSorteo',`Times_raffle`='$VecesSorteo',
`Max_raffle`='$MaxSorteo',`Min_raffle`='$MinSorteo' WHERE Id_raffle = $Id_raffle";

if ($con->query($sql)===true) 
{
   HEADER("Location: ../../app/views/registrar-sorteo.php");
}
else
{
    die("Error al editar datos: ".$conexion->error);
}


// Para actualizar también los números con el Maximo y el mínimo

$sql="UPDATE `numeros` SET `Maxbet_number`='$MaxSorteo',`Minbet_number`='$MinSorteo' WHERE Id_raffle_number = $Id_raffle";

if ($con->query($sql)===true) 
{
   HEADER("Location: ../../app/views/registrar-sorteo.php");
}
else
{
    die("Error al editar datos: ".$conexion->error);
}

$con->close();
 ?>