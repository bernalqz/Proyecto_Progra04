<?php include "header.php"?>

<div class="title-head">  
<h1>Número ganador</h1>    
</div> 

<div class="ventanas">

<div>
  <h3 class="random_ball" id=ball>0</h3><br>
</div>

<button class="btn" id="button-run">Sortear</button><br><br>


<form action="../../assets/php/panel_de_juego.php">
<label for="">Número ganador:</label>
<input type="number" min="0" max="100" required></input><br><br>
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
<br><br> 
<input type="submit" class="btn" value="Ganadores"></input>
</form>
</div>

<script>

  const my_ball = document.getElementById("ball");

  const button_run = document.getElementById("button-run");

  const random_num_generator = () => {
     
    const random_num = Math.floor(Math.random() * 100 + 1);
    ball.textContent = random_num;

  };

  button_run.addEventListener('click', random_num_generator);
  random_num_generator();

</script>

<?php include "footer.php"?>