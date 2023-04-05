
<?php include "header.php"?>


<div class="title-head">  
<h1>Registrar jugador</h1>  
<br>  
</div> 

<div class="ventanas">
<form action="../../assets/php/registrar_jugador.php" method="POST">
<label>Nombre:</label>
<input type="text" name="Nombre" required></input><br><br>
<label>Apodo:</label>
<input type="text" name="Apodo" required></input><br><br>
<label>Cedula:</label>
<input type="text" name="Cedula" required></input><br><br>

<input type="submit" class="btn" value="Registrar"></input>
</form>
</div>

<!--Tabla-->

<div class="tabla-contenedor2">
<table class="content-table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apodo</th>
            <th>Cedula</th>
            <th>Fecha/Hora</th>
            <th>Editar</th>
            <th>Eliminar</th>           
          </tr>
        </thead>
        <tbody>
<?php
require '../../assets/php/dbconnection.php';
if($con){
$consulta_jugador = 'SELECT * FROM jugadores';
$datos_consulta = $con->query($consulta_jugador);
if ($datos_consulta->num_rows>0){
    $contador=0;
    while($fila=$datos_consulta->fetch_assoc()){
        $Nombre = $fila['Name_gamer'];
        $Apodo = $fila['Nick_gamer'];
        $Cedula = $fila['Ced_gamer'];
        $Hora = $fila['Time_gamer'];
        ?>
         <tr>
            <td><?=$Nombre?></td>
            <td><?=$Apodo?></td>
            <td><?=$Cedula?></td>
            <td><?=$Hora?></td>
            <th scope="row" >
            <button type="button" class="editar-btn fa-solid fa-pen-to-square" id="open-modal<?=$fila['Id_gamer']?>"></button>
             </th>
            <th>
              <input type="hidden" name="id" value="<?php echo $fila['Id_gamer'];?>">
		          <button class="delete-btn fa-solid fa-trash" id="open-modal2<?=$fila['Id_gamer']?>"></button>   
            </th>
          </tr>

<!--Ventana Modal editar-->

<dialog class="pop-up" id="modal-wind<?=$fila['Id_gamer']?>">

<button class="x-btn" id="cerrar-modal<?=$fila['Id_gamer']?>">x</button>

<h2>Editar</h2>

<form action="../../assets/php/editar_jugador.php" method="POST" method="dialog"> 
<label for=""></label>
<input type="hidden" name="id" value="<?php echo $fila['Id_gamer'];?>">
<label>Nombre:</label>
<input type="text" name="Nombre" value="<?php echo $Nombre?>" required></input><br><br>
<label>Apodo:</label>
<input type="text" name="Apodo" max="100" value="<?php echo $Apodo?>" required></input><br><br>
<label>Cedula:</label>
<input type="number" name="Cedula" value="<?php echo $Cedula?>" required></input><br><br>
<input type="submit" class="btn-pop" value="Editar"></input>
</form>

</dialog>

<!--Ventana Modal editar end-->

<!--Ventana Modal eliminar-->

<dialog class="pop-up-alert" id="modal-wind2<?=$fila['Id_gamer']?>">

<form action="../../assets/php/borrar_jugador.php" method="POST" method="dialog">

<h2>Desea eliminar este jugador?</h2>
 
<input type="hidden" name="id" value="<?php echo $fila['Id_gamer'];?>"><br>
<button type="submit" class="btn-pop">Eliminar</button>
</form>
<button class="btn-pop" id="cerrar-modal2<?=$fila['Id_gamer']?>">Cancelar</button>

</dialog>

<!--Ventana Modal eliminar end-->

<script>
const btn_open_modal<?=$fila['Id_gamer']?> = document.querySelector("#open-modal<?=$fila['Id_gamer']?>");
const btn_close_modal<?=$fila['Id_gamer']?> = document.querySelector("#cerrar-modal<?=$fila['Id_gamer']?>")
const modal_editar_sorteo<?=$fila['Id_gamer']?> = document.querySelector("#modal-wind<?=$fila['Id_gamer']?>")
btn_open_modal<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_gamer']?>.showModal()})
btn_close_modal<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_gamer']?>.close()})

const btn_open_modal2<?=$fila['Id_gamer']?> = document.querySelector("#open-modal2<?=$fila['Id_gamer']?>");
const btn_close_modal2<?=$fila['Id_gamer']?> = document.querySelector("#cerrar-modal2<?=$fila['Id_gamer']?>")
const modal_eliminar_sorteo<?=$fila['Id_gamer']?> = document.querySelector("#modal-wind2<?=$fila['Id_gamer']?>")
btn_open_modal2<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_eliminar_sorteo<?=$fila['Id_gamer']?>.showModal()})
btn_close_modal2<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_eliminar_sorteo<?=$fila['Id_gamer']?>.close()})
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