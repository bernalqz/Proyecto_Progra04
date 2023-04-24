<?php include "header.php"?>

<div class="ventanas">
<div class="title-head">  
<h1>Facturas realizadas</h1>    
</div> 
</div> 

<!--TABLA-->
<div class="tabla-contenedor3">

<table class="content-table">
  
        <thead>
          <tr>
            <th># Factura</th>
            <th>Cliente</th>
            <th>Cantidad</th>
            <th>Id Cliente</th>
            <th>Imprimir</th>    
            <th>Eliminar</th>       
          </tr>
        </thead>
        <tbody>
<?php
require '../../assets/php/dbconnection.php';
if($con){
$consulta_apuesta = 'SELECT * FROM ventas';
$datos_consulta = $con->query($consulta_apuesta);
if ($datos_consulta->num_rows>0){
    $contador=0;
    while($fila=$datos_consulta->fetch_assoc()){
        $Id = $fila['Id_sales'];
        $Id_gamer = $fila['Id_gamer_sales'];
        $Id_bet_sales = $fila['Id_bet_sales'];

// Consulta el nobre del cliente por medio del ID
$sql ="SELECT `Name_gamer` FROM `jugadores` WHERE `Id_gamer` = '$Id_gamer';";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$Name_gamer = $row['Name_gamer'];
//------ end

// Consulta la cantidad de apuestas en BD
$sql = "SELECT COUNT(*) FROM apuestas WHERE Id_sales_bet = $Id " ;
$resultado = $con->query($sql);
if ($resultado === false) {
  echo 'Error al ejecutar la consulta: ';
  exit;
}
$filas = mysqli_fetch_row($resultado);
$numero_registros = $filas[0];

//

        ?>
         <tr>
            <td><?=$Id?></td>
            <td><?=$Name_gamer?></td>
            <td><?=$numero_registros?></td>
            <td><?=$Id_gamer?></td>
            <td>
            <form method="post" action="../../fpdf/ticket.php" target="_blank">
              <input type="hidden" name="id" value="<?php echo $fila['Id_sales'];?>">
              <button class="print-btn fa-regular fa-file-pdf"></button>
            </form>    
            </td>
            <td>
		          <button class="delete-btn fa-solid fa-trash" id="open-modal2<?=$fila['Id_sales']?>"></button>
            </td>
          </tr>

<dialog class="pop-up-alert" id="modal-wind2<?=$fila['Id_sales']?>">

<form action="../../assets/php/borrar_venta.php" method="POST" method="dialog">

<h2>Desea eliminar la factura?</h2>

<input type="hidden" name="id" value="<?php echo $fila['Id_sales'];?>">
<button type="submit" class="btn-pop">Eliminar</button>

</form>

<button class="btn-pop" id="cerrar-modal2<?=$fila['Id_sales']?>">Cancelar</button>

</dialog>  

<script>
const btn_open_modal2<?=$fila['Id_sales']?> = document.querySelector("#open-modal2<?=$fila['Id_sales']?>");
const btn_close_modal2<?=$fila['Id_sales']?> = document.querySelector("#cerrar-modal2<?=$fila['Id_sales']?>")
const modal_eliminar_factura<?=$fila['Id_sales']?> = document.querySelector("#modal-wind2<?=$fila['Id_sales']?>")
btn_open_modal2<?=$fila['Id_sales']?>.addEventListener("click",()=>{modal_eliminar_factura<?=$fila['Id_sales']?>.showModal()})
btn_close_modal2<?=$fila['Id_sales']?>.addEventListener("click",()=>{modal_eliminar_factura<?=$fila['Id_sales']?>.close()})
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
