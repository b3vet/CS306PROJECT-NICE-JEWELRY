<?php 
include "config.php";
if(isset($_POST["pid_uid"]))
{
    $index = strpos($_POST["pid_uid"], "_");
    $pid = substr($_POST["pid_uid"], 0, $index);
    $uid = substr($_POST["pid_uid"], $index+1);
    $sqlSt1 = "SELECT * FROM carts WHERE uid = $uid AND pid = $pid";
    $result1 = mysqli_query($db, $sqlSt1);
    if(mysqli_num_rows($result1)==0) {
        $sqlSt = "INSERT INTO carts(uid, pid, quantity) VALUES ($uid, $pid, 1)";
        echo "inserted new element to cart    " . $pid ;
    }
    else {
        $sqlSt = "UPDATE carts SET quantity = quantity + 1 WHERE $uid = uid AND $pid = pid";
        echo "updated element to cart    " . $pid ;
    }
    $result2 = mysqli_query($db, $sqlSt);
    header("Location: onlyproduct.php");

}
else {
    echo "There is a huge problem here.";
}


?>