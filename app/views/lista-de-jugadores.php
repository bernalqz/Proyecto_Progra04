<?php include "header.php"?>

<div class="title-head">  
<h1>Lista de jugadores</h1>    
</div> 

<table class="content-table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apodo</th>
            <th>Cedula</th>
            <th>Fecha/Hora</th>
            <th>Editar</th>
            <th>Eliminar</th>   
            <th>Vender</th>        
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
            <th>
            <button type="button" class="editar-btn fa-solid fa-pen-to-square" id="open-modal<?=$fila['Id_gamer']?>"></button>
            </th>
            <th>
            <form method="post" action="../../assets/php/borrar_jugador.php">
              <input type="hidden" name="id" value="<?php echo $fila['Id_gamer'];?>">
		          <button class="delete-btn fa-solid fa-trash"></button>
            </form>    
            </th>
            <th>
            <button type="button" class="sell-btn fa-solid fa-dollar-sign" id="open-modal2<?=$fila['Id_gamer']?>"></button>
            </th>
          </tr>

<dialog class="pop" id="modal-wind<?=$fila['Id_gamer']?>">

<div class="pop-up">

<button class="x-btn" id="cerrar-modal<?=$fila['Id_gamer']?>">x</button>

<h2>Editar</h2>

<form action="../../assets/php/editar_jugador.php" method="POST" method="dialog"> 
<label for=""></label>
<input type="hidden" name="id" value="<?php echo $fila['Id_gamer'];?>">
<input class="dato" type="text"   name="Nombre" placeholder="Nombre del jugador"  value="<?php echo $Nombre?>" required></input><br><br>
<input class="dato" type="text" name="Apodo"  placeholder="Apodo del jugador" max="100" value="<?php echo $Apodo?>" required></input><br><br>
<input class="dato" type="number" name="Cedula"  placeholder="Cedula" value="<?php echo $Cedula?>" required></input><br><br>
<br>
<input type="submit" class="btn-pop" value="Editar"></input>
</form>
<br><br>

</div>

</dialog>

<!-- ----------------------------------------------------------- -->

<dialog class="pop" id="modal-wind2<?=$fila['Id_gamer']?>">

<div class="pop-up">

<button class="x-btn" id="cerrar-modal2<?=$fila['Id_gamer']?>">x</button>

<h2>Venta de tiempos</h2>

<form action="../../assets/php/editar_jugador.php" method="POST" method="dialog"> 
<label for=""></label>
<input type="hidden" name="id" value="<?php echo $fila['Id_gamer'];?>">
<input class="dato" type="text"   name="Nombre" placeholder="Nombre del jugador"  value="<?php echo $Nombre?>" required></input><br><br>
<input class="dato" type="text" name="Apodo"  placeholder="Apodo del jugador" max="100" value="<?php echo $Apodo?>" required></input><br><br>
<input class="dato" type="number" name="Cedula"  placeholder="Cedula" value="<?php echo $Cedula?>" required></input><br><br>
<br>
<input type="submit" class="btn-pop" value="Vender"></input>
</form>
<br><br>

</div>

</dialog>

<!--Ventana Modal end-->

<script>
const btn_open_modal<?=$fila['Id_gamer']?> = document.querySelector("#open-modal<?=$fila['Id_gamer']?>");
const btn_close_modal<?=$fila['Id_gamer']?> = document.querySelector("#cerrar-modal<?=$fila['Id_gamer']?>")
const modal_editar_sorteo<?=$fila['Id_gamer']?> = document.querySelector("#modal-wind<?=$fila['Id_gamer']?>")
btn_open_modal<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_gamer']?>.showModal()})
btn_close_modal<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_gamer']?>.close()})

const btn_open_modal2<?=$fila['Id_gamer']?> = document.querySelector("#open-modal2<?=$fila['Id_gamer']?>");
const btn_close_modal2<?=$fila['Id_gamer']?> = document.querySelector("#cerrar-modal2<?=$fila['Id_gamer']?>")
const modal_vender_sorteo<?=$fila['Id_gamer']?> = document.querySelector("#modal-wind2<?=$fila['Id_gamer']?>")
btn_open_modal2<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_vender_sorteo<?=$fila['Id_gamer']?>.showModal()})
btn_close_modal2<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_vender_sorteo<?=$fila['Id_gamer']?>.close()})
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