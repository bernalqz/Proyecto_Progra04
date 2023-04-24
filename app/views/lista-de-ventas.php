<?php include "header.php"?>

<div class="ventanas">
<div class="title-head">  
<h1>Ventas realizadas</h1>    
</div> 
</div>

<!--TABLA-->
<div class="tabla-contenedor">

<h2>Apuestas:</h2>

<?php
require '../../assets/php/dbconnection.php';

    $consulta_apuesta = 'SELECT * FROM apuestas';
    $datos_consulta = $con->query($consulta_apuesta);

      $total = 0;
    
        while($fila = $datos_consulta->fetch_assoc()){
          
          $total = $total + $fila['Money_bet'];

        }

        echo "<br><br>";
        echo "<h3>Ventas totales: ₡" .$total. "</h3>";
        echo "<br><br>";

    $con->close();
?>

<table class="content-table">
  
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Sorteo</th>
            <th>Número</th>
            <th>Dinero</th>    
            <th>Jugado</th>       
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
        $Active = $fila['Active'];
        if($Active==1){$Jugado="NO";}
        else{$Jugado="SI";}

        ?>
         <tr>
            <td><?=$Name_gamer?></td>
            <td><?=$Name_raffle?></td>
            <td><?=$Number?></td>
            <td><?="₡".$Money_bet?></td>
            <td><?=$Jugado?></td>
            
          </tr>

<?php
     } // aqui finaliza el while
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