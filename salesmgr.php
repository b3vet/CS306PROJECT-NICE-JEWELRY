<!DOCTYPE html>
    <html>
    <head>
<?php

//WE WANT TO SEE INVOICES,
//CHANGE ORDER STATUS 
//CANCEL ORDER
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
        
        if($row["role"] != 1)
        {
            echo "HOOP HEMSERIM NEREYE <a href=\"index.php\">GO BACK TO MAIN PAGE<a>";
        }
        else 
        {
    ?>
    
    
    
    <title>SALES MANAGER PAGE</title>
    </head>

    <body style = "text-align:center; align: center">
    <br><br><br><br>
    <h1> WELCOME DEAR SALES MANAGER! WHAT WOULD YOU LIKE TO DO TODAY? </h1>
    <input type='button'value='SEE INVOICES' onclick="document.location.href='invoices.php';"/>
    <input type='button'value='EDIT ORDER STATUS' onclick="document.location.href='editorders.php';"/>
    <input type='button'value='CANCEL ORDERS' onclick="document.location.href='cancelorders.php';"/>
    </body>
    <?php }
        }
     } ?>
    </html>
