<?php

//WE WANT TO ADD, DELETE, EDIT PRODUCTS

?>

<!DOCTYPE html>
<html >
<head>
<?php


session_start();
include "config.php";
if(!isset($_SESSION["username"]))
{
    echo "HOOP HEMSERIM NEREYE <a href=\"index.php\">GO BACK TO MAIN PAGE<a>";
}
else if(isset($_SESSION["username"])) {
    $uid = $_SESSION["username"];
    $sqlSt = "SELECT * FROM users WHERE uid = $uid";
    $result = mysqli_query($db , $sqlSt);
    
    while($row = mysqli_fetch_assoc($result))
    {
        
        if($row["role"] != 2)
        {
            echo "HOOP HEMSERIM NEREYE <a href=\"index.php\">GO BACK TO MAIN PAGE<a>";
        }
        else 
        {
    ?>
    
    <title>PRODUCT MANAGER PAGE</title>
</head>
<body style = "text-align:center; align: center">
        <br><br><br><br>
        <h1> WELCOME DEAR PRODUCT MANAGER! WHAT WOULD YOU LIKE TO DO TODAY? </h1>
        <input type='button'value='ADD PRODUCTS' onclick="document.location.href='addproducts.php';"/>
        <input type='button'value='EDIT PRODUCTS' onclick="document.location.href='editproducts.php';"/>
        <input type='button'value='DELETE PRODUCTS' onclick="document.location.href='deleteproducts.php';"/>
</body>
<?php }
        }
     } ?>
</html>
