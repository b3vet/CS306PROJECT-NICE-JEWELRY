<?php 
include "config.php";
session_start();
if(isset($_POST["email"]))
{
    $uid = $_SESSION['username'];
    $email = $_POST['email'];
    $sqlSt = "UPDATE users SET email = '$email' WHERE uid = $uid";
    
    $result = mysqli_query($db, $sqlSt);
    echo "email";
    
}
if(isset($_POST["password"]))
{
    $uid = $_SESSION['username'];
    $passw = $_POST['password'];
    $sqlSt = "UPDATE users SET passw = '$passw' WHERE uid = $uid";
    
    $result = mysqli_query($db, $sqlSt);
    echo "passw";
}
if(isset($_POST["name"]))
{
    $uid = $_SESSION['username'];
    $name = $_POST['name'];
    $sqlSt = "UPDATE users SET name = '$name' WHERE uid = $uid";
    
    $result = mysqli_query($db, $sqlSt);
    echo "name";
    
}
if(isset($_POST["surname"]))
{
    $uid = $_SESSION['username'];
    $surname = $_POST['surname'];
    $sqlSt = "UPDATE users SET surname = '$surname' WHERE uid = $uid";
    
    $result = mysqli_query($db, $sqlSt);
    echo "surname";
}
if(isset($_POST["phone"]))
{
    $uid = $_SESSION['username'];
    $phone = $_POST['phone'];
    $sqlSt = "UPDATE users SET phone = '$phone' WHERE uid = $uid";
    
    $result = mysqli_query($db, $sqlSt);
    echo "phone";
}
if(isset($_POST["address"]))
{
    $uid = $_SESSION['username'];
    $address = $_POST['address'];
    $sqlSt = "UPDATE users SET adress = '$address' WHERE uid = $uid";
    
    $result = mysqli_query($db, $sqlSt);
    echo "address";
}
header("Location: userpage.php");



?>