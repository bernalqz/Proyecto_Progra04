<?php include "header.php"?>

<?php

if (isset($_POST['id']) && isset($_POST['name'])){
$Id_gamer = $_POST['id'];
$Name_gamer = $_POST['name'];
// Se guardan las varibles en Kookies de 2 minutos:
setcookie("KIDgamer", $Id_gamer, time() + 1200);
setcookie("KGamerName", $Name_gamer, time() + 1200);
 }
elseif(isset($_COOKIE["KIDgamer"]) && isset($_COOKIE["KGamerName"])){
// Se toman las variables por si acaso se recarla la pagina 
  $Id_gamer= $_COOKIE["KIDgamer"];
  $Name_gamer= $_COOKIE["KGamerName"];

if(isset($_GET['mensaje']))
  {
    $Mensaje = $_GET['mensaje'];
    //echo $Mensaje;
    echo '<span class="error-msg">'.$Mensaje.'</span>';
 }
}

// Para el borrado de la tabla temporal: apuestas_temp en caso de recarga de la pagina con otro cliente o jugador:  

require '../../assets/php/dbconnection.php';
$Name_gamerBD = $Name_gamer;
$sql = "SELECT Name_gamer_temp FROM apuestas_temp WHERE Name_gamer_temp != '$Name_gamer'";
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();
if($row){
$Name_gamerBD = $row['Name_gamer_temp'];
}
if($Name_gamerBD!=$Name_gamer){
  HEADER("Location: ../../assets/php/borrar_apuesta_temp_total2.php");
}
$con->close();
// Fin del borrado


// Formulario
?>
<div class="ventanas">

<div class="title-head">  
<h1>Venta de números</h1><br>
<br>    
</div>     

<form action="../../assets/php/venta_individual.php" method="POST">
<Label>Nombre:</Label>
<input type="text" value="<?php echo $Name_gamer;?>" readonly></input><br><br>
<Label>Seleccione el sorteo:</Label>

<!--Llenado del Select-->
<select name="raffle" id="">
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
  <option  value="<?=$Nombre_raffle?>"><?=$Nombre_raffle?></option>
<?php
      }}}
      $con->close();
      ?>
</select>
<!--Llenado del Select end-->

<br><br>
<Label >Número a apostar:</Label>
<input type="hidden" name="id" value="<?php echo $Id_gamer;?>">
<input type="hidden" name="name" value="<?php echo $Name_gamer;?>">
<input type="number"  name="number" max="100" required></input>
<br><br>
<Label>Dinero a apostar:</Label>
<input name="amount" required type="number"></input><label> ₡</label><br><br>
<input type="submit" class="btn" value="Agregar número"></input>
</form> 

<form method="post" action="../../assets/php/realizar_venta.php">
<input type="hidden" name="id" value="<?php echo $Id_gamer;?>">
<input type="hidden" name="name" value="<?php echo $Name_gamer;?>">
<input type="submit" class="btn" value="Realizar Venta"></input>
</form>
</div>

<!--TABLA-->



<div class="tabla-contenedor">

<table class="content-table">
  
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Sorteo</th>
            <th>Número</th>
            <th>Dinero</th>    
            <th>Eliminar</th>       
          </tr>
        </thead>
        <tbody>
<?php
require '../../assets/php/dbconnection.php';
if($con){
$consulta_apuesta = 'SELECT * FROM apuestas_temp';
$datos_consulta = $con->query($consulta_apuesta);
if ($datos_consulta->num_rows>0){
    $contador=0;
    while($fila=$datos_consulta->fetch_assoc()){
        $Id_temp = $fila['Id_temp'];
        $Name_gamer_temp = $fila['Name_gamer_temp'];
        $Name_raffle_temp = $fila['Name_raffle_temp'];
        $Number_temp = $fila['Number_temp'];
        $Money_bet_temp = $fila['Money_bet_temp'];
        ?>
          <tr>
            <td><?=$Name_gamer_temp?></td>
            <td><?=$Name_raffle_temp?></td>
            <td><?=$Number_temp?></td>
            <td><?=$Money_bet_temp?></td>
            <td>
              <input type="hidden" name="id" value="<?php echo $fila['Id_temp'];?>">
		          <button class="delete-btn fa-solid fa-trash" id="open-modal2<?=$fila['Id_temp']?>"></button>
            </form>    
            </td>
          </tr>

<dialog class="pop-up-alert" id="modal-wind2<?=$fila['Id_temp']?>">

<form method="post" action="../../assets/php/borrar_apuesta_temporal.php">

<h2>Desea eliminar esta venta?</h2>
 
<input type="hidden" name="id" value="<?php echo $fila['Id_temp'];?>"><br>
<button type="submit" class="btn-pop">Eliminar</button>
</form>
<button class="btn-pop" id="cerrar-modal2<?=$fila['Id_temp']?>">Cancelar</button>

</dialog>

<script>
const btn_open_modal2<?=$fila['Id_temp']?> = document.querySelector("#open-modal2<?=$fila['Id_temp']?>");
const btn_close_modal2<?=$fila['Id_temp']?> = document.querySelector("#cerrar-modal2<?=$fila['Id_temp']?>")
const modal_eliminar_sorteo<?=$fila['Id_temp']?> = document.querySelector("#modal-wind2<?=$fila['Id_temp']?>")
btn_open_modal2<?=$fila['Id_temp']?>.addEventListener("click",()=>{modal_eliminar_sorteo<?=$fila['Id_temp']?>.showModal()})
btn_close_modal2<?=$fila['Id_temp']?>.addEventListener("click",()=>{modal_eliminar_sorteo<?=$fila['Id_temp']?>.close()})
</script>

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