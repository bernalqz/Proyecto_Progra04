<?php

    include("dbconnection.php");
    
    $ID = $_POST['id'];

    $sql = "DELETE FROM ventas WHERE Id_sales = '$ID'";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        HEADER("Location: ../../app/views/lista-de-facturas.php");
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