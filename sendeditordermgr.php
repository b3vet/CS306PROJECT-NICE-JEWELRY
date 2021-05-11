<?php
include "config.php";
if(isset($_POST['ids']))
    {
        if(isset($_POST['newstatus']))
        {
            $id = $_POST['ids'];
            $newstatus = $_POST['newstatus'];
            $sqlSt = "UPDATE orders SET o_status = '$newstatus' WHERE oid = $id";

            $result = mysqli_query($db, $sqlSt);
            header("Location: editorders.php");
        }
        else {
            echo "The form is not set";
        }
        
    }
    else 
    {
        echo "The form is not set";
    }


?>