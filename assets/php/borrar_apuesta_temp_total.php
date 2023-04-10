<?php

    include("dbconnection.php");
    
   
    $sql = "TRUNCATE TABLE apuestas_temp;";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        HEADER("Location: ../../app/views/venta-de-tiempos.php");
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

    $con->close();
?>