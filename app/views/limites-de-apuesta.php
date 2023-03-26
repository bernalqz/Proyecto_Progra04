<?php include "header.php"?>


<div class="title-head">  
<h1>Límites de Dinero</h1>    
</div> 

<div class="ventanas">
<form action="../../assets/php/limite_de_apuesta.php">
<label for=""></label>


<label for="">Sorteo: </label>
<select name="" id="">
<option value="">A Todas</option>  
  <option value="">Tica</option>
  <option value="">Nica</option>
  <option value="">Panameña</option>
  <option value="">Hondureña</option>
</select>
<br><br>
<input type="number" min="0" max="100" required placeholder="Min/Max"></input><br><br>
<input type="number" placeholder="Máximo de apuesta"></input><br><br>
<input type="number" placeholder="Mínimo de apuesta"></input><br><br>
    
<input type="submit" class="btn" value="Registrar"></input>

</form>
</div>

<?php include "footer.php"?>