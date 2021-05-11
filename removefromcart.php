<?php 
include "config.php";
if(isset($_POST["pid_uid"]))
{
    $index = strpos($_POST["pid_uid"], "_");
    $pid = substr($_POST["pid_uid"], 0, $index);
    $uid = substr($_POST["pid_uid"], $index+1);
    $sqlSt1 = "DELETE FROM carts WHERE uid = $uid AND pid = $pid";
    $result1 = mysqli_query($db, $sqlSt1);
    if($result1 == 1) {
        header("Location: cart.php");
    }
    else {
        echo "THERE is a huge problem here.";
    }
}
else {
    echo "There is a huge problem here.";
}


?>