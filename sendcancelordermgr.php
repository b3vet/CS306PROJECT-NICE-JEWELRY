<?php
include "config.php";
if(isset($_POST['ids']))
    {
        $id = $_POST['ids'];
        $sqlSt = "DELETE FROM orders WHERE oid = $id";

        $result = mysqli_query($db, $sqlSt);
        header("Location: cancelorders.php");
    }
    else 
    {
        echo "The form is not set";
    }


?>