<?php
if (isset($_POST)){
$Id_gamer = $_POST['id'];
$NombreJugador = $_POST['Nombre'];
$NickJugador = $_POST['Apodo'];
$CedJugador = $_POST['Cedula'];
    }
require 'dbconnection.php'; 

$sql = "UPDATE `jugadores` SET `Name_gamer`='$NombreJugador',`Nick_gamer`='$NickJugador',
`Ced_gamer`='$CedJugador' WHERE Id_gamer = $Id_gamer";

if ($con->query($sql)===true) 
{
   HEADER("Location: ../../app/views/registrar-jugador.php");
}
else
{
    die("Error al editar datos: ".$conexion->error);
}

$con->close();
 ?>