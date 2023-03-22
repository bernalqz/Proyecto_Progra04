<?php include "header.php"?>



<div class="title-head">  
<h2>Crear Un Sorteo</h2>    
</div> 

<div>
<form action="../../assets/php/registrar_sorteo.php" method="POST"> 
<label for=""></label>
<input type="text"   name="NombreSorteo" placeholder="Nombre del Sorteo" required></input><br><br>
<input type="number" name="VecesSorteo"  placeholder="Cuantas veces paga" max="100" required></input><br><br>
<input type="number" name="MaxSorteo"  placeholder="Límite máximo de dinero" required></input><br><br>
<input type="number" name="MinSorteo"  placeholder="Límite mínimo de dinero" required></input><br><br>
<br>
<input type="submit" class="nav-link" value="Registrar"></input>
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
            <td><?=$Veces ?></td>
            <td><?=$Maxi?></td>
            <td><?=$Mini?></td>
            <th scope="row" >
            <button type="button" id="open-modal">Editar</button>
             </th>
            <th>
            <form method="post" action="../../assets/php/borrar_sorteo.php">
              <input type="hidden" name="id" value="<?php echo $fila['Id_raffle'];?>">
		          <input  type="submit"  value="Eliminar">
              </form>    
            </th>
          </tr>
<?php

     }
  }
}
$con->close();
?>
</tbody>
</table>
<!-- LLenado de la tabla end-->

<!--Ventana Modal-->
<dialog id="modal-wind">
<h2>Editar</h2>
<form action="../../assets/php/registrar_sorteo.php" method="POST" method="dialog"> 
<label for=""></label>
<input type="text"   name="NombreSorteo" placeholder="Nombre del Sorteo" required></input><br><br>
<input type="number" name="VecesSorteo"  placeholder="Cuantas veces paga" max="100" required></input><br><br>
<input type="number" name="MaxSorteo"  placeholder="Límite máximo de dinero" required></input><br><br>
<input type="number" name="MinSorteo"  placeholder="Límite mínimo de dinero" required></input><br><br>
<br>
<input type="submit" class="nav-link" value="Registrar"></input>
</form>
<button id="cerrar-modal">Cerrar</button>
</dialog>
<!--Ventana Modal end-->



<?php include "footer.php"?>


<script>
const btn_open_modal = document.querySelector("#open-modal");
const btn_close_modal = document.querySelector("#cerrar-modal")
const modal_editar_sorteo = document.querySelector("#modal-wind")
btn_open_modal.addEventListener("click",()=>{modal_editar_sorteo.showModal()})
btn_close_modal.addEventListener("click",()=>{modal_editar_sorteo.close()})
</script>