<?php include "header.php"?>

<div class="title-head">  
<h1>Sorteo</h1>    
</div> 

<div class="ventanas">
<form action="../../assets/php/registrar_sorteo.php" method="POST"> 
<label for=""></label>
<input type="text"   name="NombreSorteo" placeholder="Nombre del Sorteo" required></input><br><br>
<input type="number" name="VecesSorteo"  placeholder="Cuantas veces paga" max="100" required></input><br><br>
<input type="number" name="MaxSorteo"  placeholder="Límite máximo de dinero" required></input><br><br>
<input type="number" name="MinSorteo"  placeholder="Límite mínimo de dinero" required></input><br><br>
<br>
<input type="submit" class="btn" value="Registrar"></input>
</form>
</div>


<!-- LLenado de la tabla-->

<table class="content-table">
        <thead>
          <tr>
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
$consulta_sorteo = 'SELECT * FROM sorteos';
$datos_consulta = $con->query($consulta_sorteo);
if ($datos_consulta->num_rows>0){
    $contador=0;
    while($fila=$datos_consulta->fetch_assoc()){
        $Nombre = $fila['Name_raffle'];
        $Veces = $fila['Times_raffle'];
        $Maxi = $fila['Max_raffle'];
        $Mini = $fila['Min_raffle'];
        ?>
         <tr>
            <td><?=$Nombre?></td>
            <td><?=$Veces?></td>
            <td><?=$Maxi?></td>
            <td><?=$Mini?></td>
            <th scope="row" >
            <button type="button" class="editar-btn" id="open-modal<?=$fila['Id_raffle']?>">Editar</button>
             </th>
            <th>
            <form method="post" action="../../assets/php/borrar_sorteo.php">
              <input type="hidden" name="id" value="<?php echo $fila['Id_raffle'];?>">
		          <input  type="submit" class="delete-btn" value="Eliminar">
              </form>    
            </th>
          </tr>

<!--Ventana Modal Editar-->


<dialog class="pop" id="modal-wind<?=$fila['Id_raffle']?>">

<div class="pop-up">

<button class="x-btn" id="cerrar-modal<?=$fila['Id_raffle']?>">x</button>

<h2>Editar</h2>

<form action="../../assets/php/editar_sorteo.php" method="POST" method="dialog"> 
<label for=""></label>
<input type="hidden" name="id" value="<?php echo $fila['Id_raffle'];?>">
<input type="text"   name="NombreSorteo" placeholder="Nombre del Sorteo"  value="<?php echo $Nombre?>" required></input><br><br>
<input type="number" name="VecesSorteo"  placeholder="Cuantas veces paga" max="100" value="<?php echo $Veces?>" required></input><br><br>
<input type="number" name="MaxSorteo"  placeholder="Límite máximo de dinero" value="<?php echo $Maxi?>" required></input><br><br>
<input type="number" name="MinSorteo"  placeholder="Límite mínimo de dinero" value="<?php echo $Mini?>" required></input><br><br>
<br>
<input type="submit" class="btn-pop" value="Editar"></input>
</form>
<br><br>

</div>
</dialog>

<!--Ventana Modal end-->

<script>
const btn_open_modal<?=$fila['Id_raffle']?> = document.querySelector("#open-modal<?=$fila['Id_raffle']?>");
const btn_close_modal<?=$fila['Id_raffle']?> = document.querySelector("#cerrar-modal<?=$fila['Id_raffle']?>")
const modal_editar_sorteo<?=$fila['Id_raffle']?> = document.querySelector("#modal-wind<?=$fila['Id_raffle']?>")
btn_open_modal<?=$fila['Id_raffle']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_raffle']?>.showModal()})
btn_close_modal<?=$fila['Id_raffle']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_raffle']?>.close()})
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