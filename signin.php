<?php
session_start();

include "config.php";
if(isset($_POST["email"]) && isset($_POST["password"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE email = '$email' and passw = '$password'";
    $result = mysqli_query($db, $sql);
    while($resultarr = mysqli_fetch_assoc($result))
    {
        $sqlSt1 = "SELECT * FROM users WHERE email = $email";
        $myresult = mysqli_query($db, $sqlSt1);
        $uid = $resultarr["uid"];
        $_SESSION["login"] = "OK";
        $_SESSION["username"] = $uid;
        $redirect = "index.php";
        if($resultarr["role"] == 1) {
            $redirect = "salesmgr.php";
        }
        else if($resultarr["role"] == 2) {
            $redirect = "productmgr.php";
        }
        
        
        header("Location: $redirect");
    }
    
    echo '<a href="index.php">Error: WRONG PASSWORD OR USERNAME TRY AGAIN.</a>';
}

?>