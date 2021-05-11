<?php
include "config.php";
    if(isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['passw']))
    {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $passw = $_POST['passw'];
        $role = 0;
        $adress = "null";
        
        $sqlSt = "INSERT INTO users(passw, email, name, surname, phone, adress, role) VALUES ('$passw', '$email', '$name', '$surname', '$phone', '$adress', $role)";

        $result = mysqli_query($db, $sqlSt); 

        echo "<h1 stlye = \"text-align: center\"> SIGN UP SUCCESSFULL CLICK <a href = \"index.php\"> HERE </a> TO GO BACK TO MAIN MENU AND LOGIN </h1>";
    }
    else 
    {
        echo "The form is not set";
    }
?>
