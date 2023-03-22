<?php

    include("dbconnection.php");
    
    $ID = $_POST['id'];

    $sql = "DELETE FROM sorteos WHERE Id_raffle = '$ID'";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        HEADER("Location: ../../app/views/registrar-sorteo.php");
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