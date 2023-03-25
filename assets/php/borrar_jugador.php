<?php

    include("dbconnection.php");
    
    $ID = $_POST['id'];

    $sql = "DELETE FROM jugadores WHERE Id_gamer = '$ID'";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        HEADER("Location: ../../app/views/registrar-jugador.php");
    }
    else
    {
        print("
            <script>
                alert('No se ha podido eliminar');
                window.history.go(-1);
            </script>
        ");
    }   

?>