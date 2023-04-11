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
            <th>Apuestas</th>
            <th>Id's</th>
            <th>Eliminar</th>    
            <th>Imprimir</th>       
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

        ?>
         <tr>
            <td><?=$Id?></td>
            <td><?=$Id_gamer?></td>
            <td><?="sin data"?></td>
            <td><?=$Id_bet_sales?></td>
            <td>
            <form method="post" action="../../assets/php/borrar_venta.php">
              <input type="hidden" name="id" value="<?php echo $fila['Id_sales'];?>">
		          <button class="delete-btn fa-solid fa-trash"></button>
            </form>    
            </td>
            <td>
            <form method="post" action="../../fpdf/ticket.php" target="_blank">
              <input type="hidden" name="id" value="<?php echo $fila['Id_sales'];?>">
              <button class="print-btn fa-solid fa-print"></button>
            </form>    
            </td>
          </tr>

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
