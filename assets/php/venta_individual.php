<?php
if (isset($_POST)){
$Seleccion_raffle = $_POST['raffle'];
$Id_gamer = $_POST['id'];
$Name_gamer = $_POST['name'];
$Numero = $_POST['number'];
$Dinero = $_POST['amount'];
$Id_usser = 1;
}
?>

<?php
require 'dbconnection.php'; 
// Consultar el id del sorteo por medio del nombre seleccionado que se recibe en POST
$sql ="SELECT `Id_raffle` FROM `sorteos` WHERE `Name_raffle` = '$Seleccion_raffle';";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$Id_raffle = $row['Id_raffle'];
//------ end

// Consultar el id del numero por medio del numero seleccionado que se recibe en POST
$sql ="SELECT `Id_number` FROM `numeros` WHERE `Number_number` = '$Numero';";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$IdNumero = $row['Id_number'];
//------ end




//<!--Validación de restricciones de apuesta consulta restricciones:

$sql ="SELECT * FROM `numeros` WHERE `Id_raffle_number` = '$Id_raffle' AND `Number_number` = '$Numero';";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$Maxbet_number = $row['Maxbet_number'];
$Minbet_number = $row['Minbet_number'];

//echo "Para el numero ".$Numero." la restriccion max es ".$Maxbet_number." y la minima es: ".$Minbet_number;

if($Dinero > $Maxbet_number)
{
        $mensaje = "Para el número: ".$Numero.", la cantidad de : ₡".$Dinero ."  ingresado supera al máximo de: ₡"
        .$Maxbet_number." Establecido en el Sorteo ".$Seleccion_raffle;
        header("Location: ../../app/views/venta-individual.php?mensaje=$mensaje");
}

elseif ($Dinero < $Minbet_number)
{
        $mensaje = "Para el número: ".$Numero.", la cantidad de : ₡".$Dinero ." ingresado no llega al mínimo de: ₡"
        .$Minbet_number." Establecido en el Sorteo ".$Seleccion_raffle;

        header("Location: ../../app/views/venta-individual.php?mensaje=$mensaje");
}

else{

//echo "La apuesta se puede realizar";


$sql="INSERT INTO `apuestas_temp`(`Name_gamer_temp`, `Id_raffle_bet_temp`, `Name_raffle_temp`,`Id_number_bet_temp`,`Number_temp`, `Money_bet_temp`,`Active_temp`) 
VALUES ('$Name_gamer','$Id_raffle','$Seleccion_raffle','$IdNumero','$Numero','$Dinero','1')";
$result = $con->query($sql);
header("Location: ../../app/views/venta-individual.php");
}

$con->close();
?>
