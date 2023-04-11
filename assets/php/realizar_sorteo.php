
<?php

    if (isset($_POST)){
    $Ruffle = $_POST['seleccion'];
    $Numero = $_POST['numero'];
       
    }
require 'dbconnection.php';


// Genera los premios en la tabla apuestas
if($con){
    $sql ="SELECT * FROM `apuestas` WHERE `Name_raffle_bet` = '$Ruffle' AND `Number_bet` = '$Numero';";
$datos_consulta = $con->query($sql);
if ($datos_consulta->num_rows>0){
    $contador=0;
    while($fila=$datos_consulta->fetch_assoc()){
       
        $Id_bet = $fila['Id_bet'];
        $Id_factura = $fila['Id_sales_bet'];
        $Id_raffle = $fila['Id_raffle_bet'];
        $Times_raffle = $fila['Times_raffle_bet'];
        $Id_Number = $fila['Id_number_bet'];
        $Name_gamer = $fila['Name_gamer_bet'];
        $Name_raffle = $fila['Name_raffle_bet'];
        $Number = $fila['Number_bet'];
        $Money_bet = $fila['Money_bet'];
        $Active = $fila['Active'];
        $ganador = $fila['Ganador_bet'];
        $Premi= 0;
        $Premi= $Money_bet * $Times_raffle;
        //Incluir el premio dentro de la apuesta
        $sql="UPDATE `apuestas` SET `Ganador_bet`='1',`Premio_bet`= $Premi WHERE Id_bet = '$Id_bet';";
        $con->query($sql)===true;
           
     } // aqui finaliza el while
  }
}

//--------------


// Pone inactivas las apuestas que ya JUgaron pero no tuvieron premio
if($con){
    $sql ="SELECT * FROM `apuestas` WHERE (`Name_raffle_bet` = '$Ruffle');";
$datos_consulta = $con->query($sql);
if ($datos_consulta->num_rows>0){
    $contador=0;
    while($fila=$datos_consulta->fetch_assoc()){
       
        $Id_bet = $fila['Id_bet'];
        $ganador = $fila['Ganador_bet'];
        $Active = $fila['Active'];
        
       
        //Incluir el premio dentro de la apuesta
        $sql="UPDATE `apuestas` SET `Active`='0' WHERE Id_bet = '$Id_bet';";
        $con->query($sql)===true;

     } // aqui finaliza el while
  }
}

$con->close();

HEADER("Location: ../../app/views/panel-de-juego.php");

?>




