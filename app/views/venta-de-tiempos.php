<?php include "header.php"?>

<div class="title-head">  
<h1>Venta de Tiempos</h1>    
</div> 

<div class="ventanas">
<form action="../../assets/php/venta_de_tiempos.php">
<label for=""></label>
<input type="number" placeholder="ID del Jugador"></input><br><br>
<input type="number" placeholder="Número a apostar"></input><br><br>
<input type="number" placeholder="Dinero a apostar"></input><br><br>

<label for="">Sorteo: </label>
<select name="" id="">
  <option value="">Tica</option>
  <option value="">Nica</option>
  <option value="">Panameña</option>
  <option value="">Hondureña</option>
</select>
<br><br>
    
<input type="submit" class="btn" value="Registrar"></input>
<br>
<input type="submit" class="btn" value="Imprimir"></input>

</form>
</div>

<?php include "footer.php"?>