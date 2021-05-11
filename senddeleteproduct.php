<?php
include "config.php";
if(isset($_POST['ids']))
    {
        $id = $_POST['ids'];
        $sqlSt = "DELETE FROM products WHERE pid = $id";

        

        $sqlSt2 = "SELECT * FROM products WHERE pid = $id";

        $result2 = mysqli_query($db, $sqlSt2);
        $row = mysqli_fetch_assoc($result2);
        $file_pointer = $row['imagename'];  
        echo $file_pointer;
        $result = mysqli_query($db, $sqlSt);
        // Use unlink() function to delete a file  
        if (!unlink($file_pointer)) {  
            echo ("$file_pointer cannot be deleted due to an error");  
        }  
        else {  
            echo ("$file_pointer has been deleted");  
        }
        header("Location: deleteproducts.php");
    }
    else 
    {
        echo "The form is not set";
    }


?>