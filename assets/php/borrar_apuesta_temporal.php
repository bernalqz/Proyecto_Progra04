<?php

    include("dbconnection.php");
    
    $ID = $_POST['id'];
    


    $sql = "DELETE FROM apuestas_temp WHERE Id_temp = '$ID'";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        HEADER("Location: ../../app/views/venta-individual.php");
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