<?php include "header.php"?>

<div class="title-head">  
<h1>Panel de Juego</h1>    
</div> 

<div class="ventanas">
<form action="../../assets/php/panel_de_juego.php">
<label for="">Número ganador:</label>

<input type="number" min="0" max="100" required placeholder=""></input><br><br>
<label for="">Sorteo:</label>
<select name="" id="">
<option value="">A Todas</option>  
  <option value="">Tica</option>
  <option value="">Nica</option>
  <option value="">Panameña</option>
  <option value="">Hondureña</option>
</select>
<br><br>
<label for="">Lista de Ganadores:</label>
<br><br>  <br><br> 
<label for=""> Espacio para mostrar Lista de Ganadores</label> 
<br><br>  <br><br> 
<input type="submit" class="btn" value="Ganadores"></input>

</form>
</div>

<?php include "footer.php"?>