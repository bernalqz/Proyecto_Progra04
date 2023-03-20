<?php

    if (isset($_POST)){
    $NombreSorteo = $_POST['NombreSorteo'];
    $VecesSorteo = $_POST['VecesSorteo'];
    $MaxSorteo = $_POST['MaxSorteo'];
    $MinSorteo = $_POST['MinSorteo'];
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
    

?>