
<?php include "header.php"?>


 <div>
<form action="public/php/registGamer.php">
<label for=""></label>
<input type="text" placeholder="Nombre"></input><br><br>
<input type="text" placeholder="Apellido"></input><br><br>
<input type="number" placeholder="Numéro a apostar" max="100"></input><br><br>
<input type="number" placeholder="Dinero a apostar" max="100"></input><br><br>
<label >Tiempos:  </label>
    <select >
        <option >Ticos</option>
        <option >Nica</option>
        <option >Panameños</option>
    </select><br><br><br>

<input type="submit" value="Registrar"></input>

</form>
    </div>
    <?php include "footer.php"?>