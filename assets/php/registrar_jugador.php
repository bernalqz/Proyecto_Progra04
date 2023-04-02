<?php

    if (isset($_POST)){
    $Nombre = $_POST['Nombre'];
    $Apodo = $_POST['Apodo'];
    $Cedula = $_POST['Cedula'];
    }

require 'dbconnection.php';

        $sql = "INSERT INTO jugadores (Name_gamer, Nick_gamer, Ced_gamer)
                VALUES ('$Nombre', '$Apodo', '$Cedula')";

        if ($con->query($sql)===true) 
        {
           HEADER("Location: ../../app/views/registrar-jugador.php");
        }
        else
        {
            die("Error al ingresar datos: ".$con->error);
        }   
    

?>