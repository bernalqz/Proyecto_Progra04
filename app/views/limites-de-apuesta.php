
<?php include "header.php"?>


<div class="title-head">  
<<<<<<< HEAD
<h1>Límites de Dinero</h1>    
</div> 

<div class="ventanas">
<form action="../../assets/php/limite_de_apuesta.php">
=======
<h2>Restricciones en apuestas de Números</h2>    
</div> 
<!--Formulario-->
<div>
<form action="../../assets/php/limite_de_apuesta.php" method="POST">
>>>>>>> 8884fd123c4469d40316afec9489fc08765dc3ef
<label for=""></label>


<label for="">Sorteos: </label>
<select name="seleccion" id="">
  
<!--Llenado del Select-->
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

?>
<!--Llenado del Select end-->


</select>
<br><br>
<<<<<<< HEAD
<input type="number" min="0" max="100" required placeholder="Min/Max"></input><br><br>
<input type="number" placeholder="Máximo de apuesta"></input><br><br>
<input type="number" placeholder="Mínimo de apuesta"></input><br><br>
=======
<input type="number" name="numero" min="0" max="100" required placeholder="Número a limitar"></input><br><br>
<input type="number" name="MaxSorteo"  placeholder="Límite máximo de dinero" required></input><br><br>
<input type="number" name="MinSorteo"  placeholder="Límite mínimo de dinero" required></input><br><br>
>>>>>>> 8884fd123c4469d40316afec9489fc08765dc3ef
    
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
            <form method="post" action="../../assets/php/borrar_jugador.php">
              <input type="hidden" name="id" value="<?php echo $fila['Id_number'];?>">
		          <input  type="submit" class="delete-btn" value="Eliminar">
              </form>    
            </th>
          </tr>

 <!--Ventana Modal -->         
<dialog id="modal-wind<?=$fila['Id_number']?>">

<div class="pop-up">

<h2>Editar</h2>



<form action="../../assets/php/editar_limites_de_apuesta.php" method="POST" method="dialog"> 
<label for=""></label>
<input type="hidden" name="id" value="<?php echo $fila['Id_number'];?>">
<input class="dato" type="text"   name="Nombre" placeholder="Nombre del jugador"  value="<?php echo $Nombre?>" required></input><br><br>
<input class="dato" type="text" name="Apodo"  placeholder="Apodo del jugador" max="100" value="<?php echo $Apodo?>" required></input><br><br>
<input class="dato" type="number" name="Cedula"  placeholder="Cedula" value="<?php echo $Cedula?>" required></input><br><br>
<br>
<input type="submit" class="btn" value="Editar"></input>
</form>



<br><br>
<button class="x-btn" id="cerrar-modal<?=$fila['Id_number']?>">x</button>
</div>

</dialog>

<!--Ventana Modal end-->

<script>
const btn_open_modal<?=$fila['Id_number']?> = document.querySelector("#open-modal<?=$fila['Id_number']?>");
const btn_close_modal<?=$fila['Id_number']?> = document.querySelector("#cerrar-modal<?=$fila['Id_number']?>")
const modal_editar_sorteo<?=$fila['Id_number']?> = document.querySelector("#modal-wind<?=$fila['Id_number']?>")
btn_open_modal<?=$fila['Id_number']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_number']?>.showModal()})
btn_close_modal<?=$fila['Id_number']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_number']?>.close()})
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