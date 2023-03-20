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
<br><br>

<input type="submit" class="nav-link" value="Registrar"></input>

</form>
</div>




<?php include "footer.php"?>