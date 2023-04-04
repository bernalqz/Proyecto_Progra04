<?php include "header.php"?>


<div class="title-head">  
<h1>Limite de apuestas</h1>    
<br>
</div> 
<!--Formulario-->
<div>
<form  class="ventanas" action="../../assets/php/limite_de_apuesta.php" method="POST">
<label for=""></label>


<label for="">Sorteo: </label>
<!--Llenado del Select-->
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
<!--Llenado del Select end-->

</select>

<!--Llenado del Select end-->
<br><br>

<input type="number" name="numero" min="0" max="100" required placeholder="Número a limitar"></input><br><br>
<input type="number" name="MaxSorteo"  placeholder="Límite máximo de dinero" required></input><br><br>
<input type="number" name="MinSorteo"  placeholder="Límite mínimo de dinero" required></input><br><br>
    
<input type="submit" class="btn" value="Registrar"></input>

</form>
</div>





<!--Llenado de la tabla-->

<table class="content-table">
        <thead>
          <tr>
            
            <th>Número</th>
            <th>Sorteo</th>
            <th>Veces</th>
            <th>Máximo</th>
            <th>Mínimo</th>
            <th>Editar</th>
            <th>Eliminar</th>           
          </tr>
        </thead>
        <tbody>
<?php
require '../../assets/php/dbconnection.php';


if($con){



$consulta_numeros = "SELECT * FROM `numeros` WHERE Limited_number = 1";
$datos_consulta = $con->query($consulta_numeros);
if ($datos_consulta->num_rows>0){
    $contador=0;
    while($fila=$datos_consulta->fetch_assoc()){
        $NumeroId = $fila['Id_number'];
        $SorteoId = $fila['Id_raffle_number'];
        $Numero = $fila['Number_number'];
        $Max = $fila['Maxbet_number'];
        $Min = $fila['Minbet_number'];
 
        // Consulta nombre de sorteo y veces
  $sql ="SELECT * FROM `sorteos` WHERE `Id_raffle` = '$SorteoId';";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  $Name_raffle = $row['Name_raffle'];
  $veces = $row['Times_raffle'];
  //echo $Id_raffle;
  // Consulta sorteo y veces end
         ?>
         <tr>
            
            <td><?=$Numero?></td>
            <td><?=$Name_raffle?></td>
            <td><?=$veces?></td>
            <td><?=$Max?></td>
            <td><?=$Min?></td>
            <th scope="row" >
            <button type="button" class="editar-btn" id="open-modal<?=$fila['Id_number']?>">Editar</button>
             </th>
            <th>
            <form method="POST" action="../../assets/php/borrar_limite.php">
              <input type="hidden" name="idNumber" value="<?php echo $fila['Id_number'];?>">
              <input type="hidden" name="id-raffle" value="<?php echo $fila['Id_raffle_number'];?>">
		          <input  type="submit" class="delete-btn" value="Eliminar">
              </form>    
            </th>
          </tr>

 <!--Ventana Modal -->         
<dialog class="pop"  id="modal-wind<?=$fila['Id_number']?>">

<div class="pop-up">
<button class="x-btn" id="cerrar-modal<?=$fila['Id_number']?>">x</button>
<h2>Editar</h2>

<!--Form del modal -->
<form action="../../assets/php/editar_limites.php" method="POST" method="dialog"> 
<label for=""></label>


<label for="">Sorteo: </label>
<select name="seleccion" id="">
  <option value="<?php echo $Name_raffle?>"><?php echo $Name_raffle?></option>
</select>
<br><br>
<input type="hidden" name="id" value="<?php echo $fila['Id_number'];?>">
<label >Número: </label>
<input type="number" name="numero"  value="<?php echo $Numero?>" min="0" max="100" required placeholder="Número a limitar" readonly ></input><br><br>
<label >Máximo de apostar: </label>
<input type="number" name="MaxSorteo"  value="<?php echo $Max?>"placeholder="Límite máximo de dinero" required></input><br>
<label >Mínimo de apostar: </label>
<input type="number" name="MinSorteo"  value="<?php echo $Min?>"placeholder="Límite mínimo de dinero" required></input><br><br>

<!--Form del modal ends-->



<br>

<input type="submit" class="btn" value="Editar"></input>
<br><br>

</form>
<br><br>

</div>

</dialog>

<!--Ventana Modal end-->

<script>
const btn_open_modal<?=$fila['Id_number']?> = document.querySelector("#open-modal<?=$fila['Id_number']?>");
const btn_close_modal<?=$fila['Id_number']?> = document.querySelector("#cerrar-modal<?=$fila['Id_number']?>")
const modal_editar_apuesta<?=$fila['Id_number']?> = document.querySelector("#modal-wind<?=$fila['Id_number']?>")
btn_open_modal<?=$fila['Id_number']?>.addEventListener("click",()=>{modal_editar_apuesta<?=$fila['Id_number']?>.showModal()})
btn_close_modal<?=$fila['Id_number']?>.addEventListener("click",()=>{modal_editar_apuesta<?=$fila['Id_number']?>.close()})
</script>

<?php
     } // aqui finaliza el while
  }
}
$con->close();
?>

</tbody>
</table>
<!-- LLenado de la tabla end-->


    <?php include "footer.php"?>