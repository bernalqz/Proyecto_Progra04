<?php include "header.php"?>

<div class="ventanas">

<div class="title-head">  
<h1>Registro de sorteos</h1> 
<br>   
</div> 

<form action="../../assets/php/registrar_sorteo.php" method="POST"> 
<label>Nombre del sorteo:</label>
<input type="text"   name="NombreSorteo"></input><br><br>
<label>Veces que paga:</label>
<input type="number" name="VecesSorteo" max="100" required></input><br><br>
<label>Límite máximo de dinero:</label>
<input type="number" name="MaxSorteo" required></input><br><br>
<label>Límite mínimo de dinero:</label>
<input type="number" name="MinSorteo" required></input><br><br>
<br>
<input type="submit" class="btn" value="Registrar"></input>
</form>
</div>

<!-- LLenado de la tabla-->

<div class="tabla-contenedor3">
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
            <button type="button" class="editar-btn fa-solid fa-pen-to-square" id="open-modal<?=$fila['Id_raffle']?>"></button>
             </th>
            <th>
              <input type="hidden" name="id" value="<?php echo $fila['Id_raffle'];?>">
		          <button class="delete-btn fa-solid fa-trash" id="open-modal2<?=$fila['Id_raffle']?>"></button>
            </th>
          </tr>

<!--Ventana Modal Editar-->

<dialog class="pop-up" id="modal-wind<?=$fila['Id_raffle']?>">

<button class="x-btn" id="cerrar-modal<?=$fila['Id_raffle']?>">x</button>

<h2>Editar</h2>

<form action="../../assets/php/editar_sorteo.php" method="POST" method="dialog"> 
<label for=""></label>
<input type="hidden" name="id" value="<?php echo $fila['Id_raffle'];?>">
<label>Nombre del sorteo:</label>
<input type="text" name="NombreSorteo" value="<?php echo $Nombre?>" required></input><br><br>
<label>Veces que paga:</label>
<input type="number" name="VecesSorteo" max="100" value="<?php echo $Veces?>" required></input><br><br>
<label>Límite máximo de dinero:</label>
<input type="number" name="MaxSorteo" value="<?php echo $Maxi?>" required></input><br><br>
<label>Límite mínimo de dinero:</label>
<input type="number" name="MinSorteo" value="<?php echo $Mini?>" required></input><br><br>
<input type="submit" class="btn-pop" value="Editar"></input>
</form>

</dialog>

<!--Ventana Modal editar end-->

<!--Ventana Modal eliminar-->

<dialog class="pop-up-alert" id="modal-wind2<?=$fila['Id_raffle']?>">

<form action="../../assets/php/borrar_sorteo.php" method="POST" method="dialog">

<h2>Desea eliminar este sorteo?</h2>
 
<input type="hidden" name="id" value="<?php echo $fila['Id_raffle'];?>"><br>
<button type="submit" class="btn-pop">Eliminar</button>
</form>
<button class="btn-pop" id="cerrar-modal2<?=$fila['Id_raffle']?>">Cancelar</button>

</dialog>

<!--Ventana Modal eliminar end-->

<script>
const btn_open_modal<?=$fila['Id_raffle']?> = document.querySelector("#open-modal<?=$fila['Id_raffle']?>");
const btn_close_modal<?=$fila['Id_raffle']?> = document.querySelector("#cerrar-modal<?=$fila['Id_raffle']?>")
const modal_editar_sorteo<?=$fila['Id_raffle']?> = document.querySelector("#modal-wind<?=$fila['Id_raffle']?>")
btn_open_modal<?=$fila['Id_raffle']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_raffle']?>.showModal()})
btn_close_modal<?=$fila['Id_raffle']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_raffle']?>.close()})

const btn_open_modal2<?=$fila['Id_raffle']?> = document.querySelector("#open-modal2<?=$fila['Id_raffle']?>");
const btn_close_modal2<?=$fila['Id_raffle']?> = document.querySelector("#cerrar-modal2<?=$fila['Id_raffle']?>")
const modal_eliminar_sorteo<?=$fila['Id_raffle']?> = document.querySelector("#modal-wind2<?=$fila['Id_raffle']?>")
btn_open_modal2<?=$fila['Id_raffle']?>.addEventListener("click",()=>{modal_eliminar_sorteo<?=$fila['Id_raffle']?>.showModal()})
btn_close_modal2<?=$fila['Id_raffle']?>.addEventListener("click",()=>{modal_eliminar_sorteo<?=$fila['Id_raffle']?>.close()})
</script>

<?php
     } // aqui finaliza el while
  }
}
$con->close();
?>

</table>
</div>
</tbody>

<!-- LLenado de la tabla end-->


<?php include "footer.php"?>