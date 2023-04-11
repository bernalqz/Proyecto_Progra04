<?php include "header.php"?>

<?php
if(isset($_GET['mensaje']))
  {
    $Mensaje = $_GET['mensaje'];
    //echo $Mensaje;

           
        print"<script>
        setTimeout(mensaje,500); // medio segundo
       function mensaje(){
        window.alert('$Mensaje');
       }
       </script>";
 }
 ?>

<div class="ventanas">
 <div class="title-head">  
<h1>Venta de tiempos</h1>    
<br>
</div>
</div>

<div class="tabla-contenedor">
<table class="content-table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apodo</th>
            <th>Cedula</th>
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
        $Id_gamer = $fila['Id_gamer'];
        $Nombre = $fila['Name_gamer'];
        $Apodo = $fila['Nick_gamer'];
        $Cedula = $fila['Ced_gamer'];
        $Hora = $fila['Time_gamer'];
        ?>
         <tr>
            <td><?=$Nombre?></td>
            <td><?=$Apodo?></td>
            <td><?=$Cedula?></td>
              <td>
            <form method="post" action="../../app/views/venta-individual.php">
              <input type="hidden" name="id" value="<?php echo $Id_gamer;?>">
              <input type="hidden" name="name" value="<?php echo $Nombre;?>">
		          <button class="sell-btn fa-solid fa-dollar-sign"></button>
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





<?php include "footer.php"?>