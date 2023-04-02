<?php

    include("dbconnection.php");
    
    $ID = $_POST['idNumber'];
    $Id_raffle = $_POST['id-raffle'];
    $limit=0;
   echo $ID;

// Buscar límite predeterminado para el número en el sorteo
//Máximo
$sql ="SELECT `Max_raffle` FROM `sorteos` WHERE `Id_raffle` = '$Id_raffle';";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$Max_raffle = $row['Max_raffle'];
//Mínimo:
$sql ="SELECT `Min_raffle` FROM `sorteos` WHERE `Id_raffle` = '$Id_raffle';";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$Min_raffle = $row['Min_raffle'];


// Actualizar el límite al número por defecto
$sql="UPDATE `numeros` SET `Limited_number`='$limit',`Minbet_number`='$Min_raffle',`Maxbet_number`='$Max_raffle'
 WHERE Id_number = $ID";

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