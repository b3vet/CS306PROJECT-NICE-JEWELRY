<?php
include "config.php";
session_start();
if(isset($_POST["comment"]) && isset($_SESSION["product"]))
{
    $comment = $_POST["comment"];
    $uid = $_SESSION["username"];
    $pid = $_SESSION["product"];
    $sqlSt = "INSERT INTO comments(comment, uid, pid) VALUES ('$comment', $uid, $pid)";
    $result = mysqli_query($db, $sqlSt);
    header("Location: onlyproduct.php");
}
else {
    echo "THERE is a huge problem.";
}