<?php include "header.php"?>

<?php

if (isset($_POST['id']) && isset($_POST['name'])){
$Id_gamer = $_POST['id'];
$Name_gamer = $_POST['name'];
// Se guardan las varibles en Kookies de 2 minutos:
setcookie("KIDgamer", $Id_gamer, time() + 600);
setcookie("KGamerName", $Name_gamer, time() + 600);
 }
elseif(isset($_COOKIE["KIDgamer"]) && isset($_COOKIE["KGamerName"])){
// Se toman las variables por si acaso se recarla la pagina 
  $Id_gamer= $_COOKIE["KIDgamer"];
  $Name_gamer= $_COOKIE["KGamerName"];

  if(isset($_GET['mensaje']))
  {
    $Mensaje = $_GET['mensaje'];
    //echo $Mensaje;

           
        print"<script>
        setTimeout(mensaje,500); // medio segundo
       function mensaje(){
        window.alert('$Mensaje');
       }
       </script>";
 }
}


 

?>
<div class="ventanas">
<div class="title-head">  
<h1>Venta de Números</h1><br>
<br>    
</div>     

<form action="../../assets/php/venta_individual.php" method="POST">
<Label>Nombre:</Label>
<input type="text"value="<?php echo $Name_gamer;?>" readonly></input><br><br>
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
<Label >Dinero a apostar:</Label>
<input name="amount" required type="number"></input><label> ₡</label><br><br>

<input type="submit" class="btn" value="Agregar apuesta"></input>
<a href="venta-de-tiempos.php" type="submit" class="btn">Atras</a>
</form> 
</div>




<?php include "footer.php"?>