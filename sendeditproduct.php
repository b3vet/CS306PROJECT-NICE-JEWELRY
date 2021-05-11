<?php
include "config.php";
if(isset($_POST['ids']))
    {
        if(isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['material']) && isset($_POST['size']) && isset($_POST['size']) && isset($_POST['color']) && isset($_POST['category']) && isset($_POST['price']))
        {
            $id = $_POST['ids'];
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $material = $_POST['material'];
            $size = $_POST['size'];
            $color = $_POST['color'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $floatP = (float)$price;
            $sqlSt = "UPDATE products SET name = '$name', desription = '$desc', material = '$material', size = $size, color = '$color', category = '$category', price = $floatP WHERE pid = $id";

            $result = mysqli_query($db, $sqlSt);
            echo "result is " . $result;
            header("Location: editproducts.php");
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