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

//<!--Validación de restricciones de apuesta consulta restricciones:

$sql ="SELECT * FROM `numeros` WHERE `Id_raffle_number` = '$Id_raffle' AND `Number_number` = '$Numero';";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$Maxbet_number = $row['Maxbet_number'];
$Minbet_number = $row['Minbet_number'];

//echo "Para el numero ".$Numero." la restriccion max es ".$Maxbet_number." y la minima es: ".$Minbet_number;

if($Dinero > $Maxbet_number)
{
        $mensaje = "La cantidad de : ₡".$Dinero ."  ingresado supera al máximo de: ₡".$Maxbet_number.
        " Establecido en el Sorteo ".$Seleccion_raffle;
        header("Location: ../../app/views/venta-individual.php?mensaje=$mensaje");
}

elseif ($Dinero < $Minbet_number)
{
        $mensaje = "La cantidad de : ₡".$Dinero ." ingresado no llega al mínimo de: ₡".$Minbet_number.
        " Establecido en el Sorteo ".$Seleccion_raffle;

        header("Location: ../../app/views/venta-individual.php?mensaje=$mensaje");
}

else{

echo "La apuesta se puede realizar";


}

$con->close();
?>
<?php
/*
// Crea la Venta global (factura) y obtiene el id Generado

        $sql = "INSERT INTO ventas (Id_gamer_sales, Id_usser_sales)
                VALUES ('$Id_gamer', '$Id_usser')";

        if ($con->query($sql)===true) 
        {
            $last_id = $con->insert_id;
        }
        else
        {
            die("Error al ingresar datos: ".$con->error);
        }   


// Crea la venta Individual en la BD con la ID de la Factura

require 'dbconnection.php';

        $sql = "INSERT INTO apuestas (Name_gamer, Nick_gamer, Ced_gamer)
                VALUES ('$Nombre', '$Apodo', '$Cedula')";

        if ($con->query($sql)===true) 
        {
           HEADER("Location: ../../app/views/registrar-jugador.php");
        }
        else
        {
            die("Error al ingresar datos: ".$conexion->error);
        }   


*/





//$con->close();

 ?>