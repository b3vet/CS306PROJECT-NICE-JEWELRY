<!DOCTYPE html>
<html>
<head>
    <title>INVOICES</title>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #800000;
  color: white;
}
</style>
</head>
<body style = "align:center; text-align: center">


<table id="customers">
  <tr>
    <th>iid</th>
    <th>Price</th>
    <th>uid</th>
    <th>Address</th>
    <th>Full Name</th>
    <th>Date Purchased</th>
  </tr>
  

<?php

include "config.php";
session_start();
$uid = $_SESSION["username"];
$sqlSt = "SELECT * FROM invoices WHERE uid = $uid";

$result = mysqli_query($db, $sqlSt);

while($row = mysqli_fetch_assoc($result))
{
    $address = $row['address'];
    $uid = $row['uid'];
    $price = $row["price"];
    $iid = $row['iid'];
    $date = $row['date_purchased'];
    $fname = $row['fullname'];

    echo "<tr> <td>" . $iid . "</td>" . "<td>" . $price . "</td>" . "<td>" . $uid . "</td>" . "<td>" . $address . "</td>" . "<td>" . $fname . "</td>" . "<td>" . $date . "</td> </tr>";
}



?>
</table><br>
<button onclick = "document.location.href = 'userpage.php'"> GO BACK TO USER INFO PAGE </button>
</body>
</html>