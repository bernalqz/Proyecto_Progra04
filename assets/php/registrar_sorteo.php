<?php

    if (isset($_POST)){
    $NombreSorteo = $_POST['NombreSorteo'];
    $VecesSorteo = $_POST['VecesSorteo'];
    $MaxSorteo = $_POST['MaxSorteo'];
    $MinSorteo = $_POST['MinSorteo'];
    $Id_usser = 1; // Id de usuario colocado hardcodeado
    }

require 'dbconnection.php';


        $sql = "INSERT INTO sorteos (Name_raffle, Times_raffle, Max_raffle, Min_raffle)
                VALUES ('$NombreSorteo', '$VecesSorteo', '$MaxSorteo ', '$MinSorteo ' )";

      if ($con->query($sql)===true) 
        {
           HEADER("Location: ../../app/views/registrar-sorteo.php");
        }
        else
        {
            die("Error al ingresar datos: ".$conexion->error);
        }   
    
// Para crear los 100 números del sorteo:
//consultar Id del sorteo agregado
$sql ="SELECT `Id_raffle` FROM `sorteos` WHERE `Name_raffle` = '$NombreSorteo';";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$Id_raffle = $row['Id_raffle'];
//echo $Id_raffle;

// Un ciclo para crear los 100 numeros del sorteo
$i=0;
while($i<101){
    $sql = "INSERT INTO numeros (Id_usser_number,Id_raffle_number,Number_number,Maxbet_number,Minbet_number) 
    VALUES ('$Id_usser','$Id_raffle','$i','$MaxSorteo','$MinSorteo')";
    if ($con->query($sql) == TRUE) {
    $i++;  
    }
    else{
        echo "Error al insertar el valor $i: " . $conn->error;
    }
}
// para el llenado de la tabla:

$con->close();
?>






