<?php include "header.php"?>
<?php
$Aleatorio = 0;
if(isset($_GET['aleatorio']))
  {
    $Aleatorio = $_GET['aleatorio'];
 }

if(isset($_GET['mensaje']))
 {
   $Mensaje = $_GET['mensaje'];
   //echo $Mensaje; 
   echo '<span class="win-msg">'.$Mensaje.'</span>';

}

?>

<div class="ventanas">

<div>
  <h3 class="random_ball"><?php echo $Aleatorio ?></h3><br>
</div>

<a href="../../assets/php/numero_aleatorio.php"><button class="btn">Generar aleatorio</button></a><br><br>

<form action="../../assets/php/realizar_sorteo.php" method="POST">
<label for="">Número ganador: </label>
<input type="number" min="0" max="100" name="numero" value="<?php echo $Aleatorio ?>"required></input><br><br>

<!--Llenado del Select end-->
<label for="">Sorteo:</label>
<select name="seleccion" id="">
  <?php
require '../../assets/php/dbconnection.php';
if($con){
  $consulta_sorteos = 'SELECT * FROM sorteos';
  $datos_consulta = $con->query($consulta_sorteos);
  if ($datos_consulta->num_rows>0){
      $contador=0;
      while($fila=$datos_consulta->fetch_assoc()){
          
          $Nombre_raffle = $fila['Name_raffle'];
?>
  <option value="<?=$Nombre_raffle?>"><?=$Nombre_raffle?></option>

<?php
      }}}
      $con->close();
?>
</select>
<!--Llenado del Select end-->
<br>
<input type="hidden"  value=""><br>
<input type="submit" class="btn" value="Jugar número"></input>
</form>
<br>
<h2>Ganadores pendiente de pago</h2> 
</div>

<?php

/*
// Realiza la comprobación de que la tabla tenga datos
require '../../assets/php/dbconnection.php';
$sql = "SELECT COUNT(*) FROM apuestas";

$resultado = $con->query($sql);

if ($resultado === false) {
    echo 'Error al ejecutar la consulta: ';
    exit;
}
$filas = mysqli_fetch_row($resultado);
$numero_registros = $filas[0];

if ($numero_registros == 0) {
    $mensaje ="Debe de realizar una venta al menos!";
    header("Location: ../../app/views/venta-individual.php?mensaje=$mensaje");

} 
// Realiza la comprobación de que la tabla temporal tenga datos end

*/
?>

<!--TABLA-->
<div class="tabla-contenedor2">

<table class="content-table"> 
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Sorteo</th>
            <th>Número</th>
            <th>Dinero</th>    
            <th>Veces</th>
            <th>Premio</th>
            <th>Pagar</th>
                   
          </tr>
        </thead>
        <tbody>
<?php
require '../../assets/php/dbconnection.php';
if($con){
$consulta_apuesta = 'SELECT * FROM apuestas';
$datos_consulta = $con->query($consulta_apuesta);
if ($datos_consulta->num_rows>0){
    $contador=0;
    while($fila=$datos_consulta->fetch_assoc()){
        $Id = $fila['Id_bet'];
        $Name_gamer = $fila['Name_gamer_bet'];
        $Name_raffle = $fila['Name_raffle_bet'];
        $Number = $fila['Number_bet'];
        $Money_bet = $fila['Money_bet'];
        $Veces = $fila['Times_raffle_bet'];
        $Active = $fila['Active'];
        $Ganador = $fila['Ganador_bet'];
        $Premio = $fila['Premio_bet'];
        // Filtra solamente los ganadores
        if($Ganador==1){ 
?>
         <tr>
            <td><?=$Name_gamer?></td>
            <td><?=$Name_raffle?></td>
            <td><?=$Number?></td>
            <td><?="₡".$Money_bet?></td>
            <td><?=$Veces?></td>
            <td><?=$Premio?></td>
            <td>
            <form method="POST" action="../../assets/php/pagar_premio.php">
              <input type="hidden" name="id" value="<?php echo $fila['Id_bet'];?>">
              <input type="hidden" name="name" value="<?php echo $fila['Name_gamer_bet'];?>">
		          <button class="sell-btn fa-solid fa-trophy" style="background-color:goldenrod"></button>
            </form>    
            </td>
            
          </tr>

<?php
     }} // aqui finaliza el while
  }
}
$con->close();
?>

</tbody>
</table>

</div>
<!-- LLenado de la tabla end-->
<!--TABLA-->



<?php include "footer.php"?>