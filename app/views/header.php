<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    <script src="https://kit.fontawesome.com/76ceaa8f89.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css?ver=1.6">

    <title>Tiempos</title>
</head>
<body>
<div class="logo">
<img src="../../assets/lotto.png">
<header type="text" name="hora" id="time">Sorteo.com</header>

<script>
const time = document.getElementById('time');

const interval = setInterval(() => {

    const local = new Date();
    
    time.innerHTML = local.toLocaleTimeString('en-US');

}, 1000);
</script>

</div>
<div class="dinero">
<img src="../../assets/dinero.png">
</div>
<div class="ganador">
<img src="../../assets/ganador.png">
</div>
<div class="dos-tarjetas">
<img src="../../assets/dos-tarjetas.png">
</div>
<div class="tarjetas">
<img src="../../assets/tarjetas.png">
</div>

<div class="container">

 <div class="container-game">

    <nav class="navbar">
        
        <a href="index.php" class="nav-link">Home</a>
        <a href="venta-de-tiempos.php" class="nav-link">Venta de Tiempos</a>
        <a href="registrar-jugador.php" class="nav-link">Registrar Jugador</a>
        <a href="registrar-sorteo.php" class="nav-link">Registro de Sorteos</a>
        <a href="limites-de-apuesta.php" class="nav-link">Límites de Apuesta</a>
        <a href="lista-de-ventas.php" class="nav-link">Lista de Apuestas</a>
        <a href="lista-de-facturas.php" class="nav-link">Lista de Facturas</a>
        <a href="panel-de-juego.php" class="nav-link">Número Ganador</a>
        <a href="log-out.php" class="nav-link">Log Out</a>
        
    </nav>
    <div class="game">
    <div class="game-frame">
