<?php
include "config.php";
    if(isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['material']) && isset($_POST['size']) && isset($_POST['size']) && isset($_POST['color']) && isset($_POST['category']) && isset($_POST['price']))
    {
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $material = $_POST['material'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $floatP = (float)$price;

        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Check if image file is a actual image or fake image
        if(isset($_POST["image"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
            //echo "File is not an image.";
            $uploadOk = 0;
            }
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        } 
        
        echo $desc . "<br>" . $name . "<br>" . $size . "<br>" . $floatP . "<br>" . $material . "<br>" . $target_file . "<br>" . $color . "<br>" . $category . "<br>";
        $sqlSt = "INSERT INTO products(size, color, material, desription, name, category, price, imagename) VALUES ($size, '$color', '$material', '$desc', '$name', '$category', $floatP, '$target_file')";

        $result = mysqli_query($db, $sqlSt);
        echo $result . " is result";
        header("Location: addproducts.php");
        
    }
    else 
    {
        echo "The form is not set";
    }
    
    
    
?>