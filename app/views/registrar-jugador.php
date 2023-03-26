
<?php include "header.php"?>


<div class="title-head">  
<h1>Jugador</h1>    
</div> 

<div class="ventanas">
<form action="../../assets/php/registrar_jugador.php" method="POST">
<label for=""></label>
<input type="text" name="Nombre" placeholder="Nombre" required></input><br><br>
<input type="text" name="Apodo" placeholder="Apodo" required></input><br><br>
<input type="text" name="Cedula" placeholder="Cédula" required></input><br><br>

</select>

<input type="submit" class="btn" value="Registrar"></input>

</form>
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
            <button type="button" class="editar-btn" id="open-modal<?=$fila['Id_gamer']?>">Editar</button>
             </th>
            <th>
            <form method="post" action="../../assets/php/borrar_jugador.php">
              <input type="hidden" name="id" value="<?php echo $fila['Id_gamer'];?>">
		          <input  type="submit" class="delete-btn" value="Eliminar">
              </form>    
            </th>
          </tr>

<dialog class="pop" id="modal-wind<?=$fila['Id_gamer']?>">

<div class="pop-up">

<button class="x-btn" id="cerrar-modal<?=$fila['Id_gamer']?>">x</button>

<h2>Editar</h2>

<form action="../../assets/php/editar_jugador.php" method="POST" method="dialog"> 
<label for=""></label>
<input type="hidden" name="id" value="<?php echo $fila['Id_gamer'];?>">
<input type="text"   name="Nombre" placeholder="Nombre del jugador"  value="<?php echo $Nombre?>" required></input><br><br>
<input type="text" name="Apodo"  placeholder="Apodo del jugador" max="100" value="<?php echo $Apodo?>" required></input><br><br>
<input type="number" name="Cedula"  placeholder="Cedula" value="<?php echo $Cedula?>" required></input><br><br>
<br>
<input type="submit" class="btn-pop" value="Editar"></input>
</form>

</div>

</dialog>

<!--Ventana Modal end-->

<script>
const btn_open_modal<?=$fila['Id_gamer']?> = document.querySelector("#open-modal<?=$fila['Id_gamer']?>");
const btn_close_modal<?=$fila['Id_gamer']?> = document.querySelector("#cerrar-modal<?=$fila['Id_gamer']?>")
const modal_editar_sorteo<?=$fila['Id_gamer']?> = document.querySelector("#modal-wind<?=$fila['Id_gamer']?>")
btn_open_modal<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_gamer']?>.showModal()})
btn_close_modal<?=$fila['Id_gamer']?>.addEventListener("click",()=>{modal_editar_sorteo<?=$fila['Id_gamer']?>.close()})
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