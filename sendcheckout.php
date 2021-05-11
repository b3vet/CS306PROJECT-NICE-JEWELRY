<?php 
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYMENT</title>
</head>
<body>
<?php 
if(isset($_POST["fullname"]) && isset($_POST["address"]) && isset($_POST["price"]))
{
    $price = $_POST["price"];
    $uid = $_SESSION["username"];
    $address = $_POST["address"];
    $fullname = $_POST["fullname"];
    $date = date("Y-m-d");
    //echo "there is price: " . $price . "<br>";
    $sqlSt2 = "INSERT INTO invoices(uid, address, fullname, date_purchased, price) VALUES ($uid, '$address', '$fullname','$date', $price)";
    $result2 = mysqli_query($db, $sqlSt2);
    //echo "insert invoice errorlu " . $result2 . "<br>";
    $sqlStt = "SELECT MAX(iid) AS mx FROM invoices";
    $resultt = mysqli_query($db, $sqlStt);
    $sqlSt4 = "SELECT * FROM carts WHERE uid = $uid";
    $result4 = mysqli_query($db, $sqlSt4);
    while($row = mysqli_fetch_assoc($resultt))
    {
        //echo "im in max iid loop\n";
        $iid = $row["mx"];
        
        //echo "result is " . mysqli_num_rows($result4);
        while($row2 = mysqli_fetch_assoc($result4))
        {
            //echo "this must be seen twice <br>";
            //echo "im in products from cart loop\n";
            $pid = $row2['pid'];
            //echo $address . "\n";
            $count = 0;
            while($count != $row2['quantity']) {
                $sqlSt3 = "INSERT INTO orders(uid, pid, iid, o_status, invoice_address, delivery_address) VALUES ($uid, $pid, $iid, 'preparing', '$address', '$address')";
                $result3 = mysqli_query($db, $sqlSt3);
                $count = $count + 1;
            }
            
            //echo "result is " . $result3 . "\n";
        }
    }
    $sqlSt1 = "DELETE FROM carts WHERE $uid = uid";
    $result1 = mysqli_query($db, $sqlSt1);
    
    ?>
<h1> PAYMENT WAS SUCCESFULL. CLICK <a href = "index.php">HERE</a> TO GO BACK TO MAIN PAGE </h1>
<?php 
} else {
    echo "<h1> PAYMENT WAS UNSUCCESFULL. CLICK <a href = \"checkout.php\">HERE</a> TO GO BACK TO CHECKOUT PAGE </h1>";
} ?>
</body>
</html>