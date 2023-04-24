<?php

if (isset($_POST)){
$Id_gamer = $_POST['id'];
$Name_gamer = $_POST['name'];
$Id_usser = 1;
}

require 'dbconnection.php'; 

// Realiza la comprobación de que la tabla temporal tenga datos
$sql = "SELECT COUNT(*) FROM apuestas_temp";

$resultado = $con->query($sql);

if ($resultado === false) {
    echo 'Error al ejecutar la consulta: ';
    exit;
}
$filas = mysqli_fetch_row($resultado);
$numero_registros = $filas[0];

if ($numero_registros == 0) {
    $mensaje ="Debe de realizar una venta al menos";
    header("Location: ../../app/views/venta-individual.php?mensaje=$mensaje");

} 
// Realiza la comprobación de que la tabla temporal tenga datos end
else {
   

//  Se crea la venta (Factura completa)
$sql ="INSERT INTO `ventas`(`Id_gamer_sales`, `Id_usser_sales`) VALUES ('$Id_gamer','$Id_usser');";

if ($con->query($sql)===true) 
{
// Para obtener el ID del dato recientemente ingresado
    $last_id_sales = $con->insert_id; 
}
else
{
    die("Error al editar datos: ".$con->error);
}

// Se transfiere los datos de la tabla apuestas temporal a la normal
$sql="INSERT INTO apuestas (Id_sales_bet,Id_raffle_bet,Times_raffle_bet,Id_number_bet,Name_gamer_bet,Name_raffle_bet,Number_bet,Money_bet,Active)
SELECT $last_id_sales,Id_raffle_bet_temp,Times_raffle_temp,Id_number_bet_temp,Name_gamer_temp,Name_raffle_temp,Number_temp, Money_bet_temp, Active_temp FROM apuestas_temp;";
if ($con->query($sql)===true) 
{
// Para obtener el ID del dato recientemente ingresado
    $last_id_bet = $con->insert_id; 
}
else
{
    die("Error al editar datos: ".$con->error);
}


// Para borrar la BD temporal de apuestas


$sql = "TRUNCATE TABLE apuestas_temp;";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        $mensaje="Venta a ".$Name_gamer." registrada correctamente";
        HEADER("Location: ../../app/views/venta-de-tiempos.php?mensaje=$mensaje");
    }
    else
    {
        print("
            <script>
                alert('No se ha podido eliminar');
                window.history.go(-1);
            </script>
        ");
    } 

 

}

$con->close();
?>