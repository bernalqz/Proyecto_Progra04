<?php include "header.php"?>

<?php
session_start();
session_destroy();
header("Location:../../app/views/login.php")

?>

<?php include "footer.php"?>