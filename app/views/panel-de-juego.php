<?php include "header.php"?>

<div class="title-head">  
<h2>Panel de Juego</h2>    
</div> 

<div>
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
<input type="submit" class="nav-link" value="Consultar Ganadores"></input>

</form>
</div>

<?php include "footer.php"?>