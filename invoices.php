<!DOCTYPE html>
<html>
<head>
    <title>ORDERS</title>
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
  text-align: center;
  background-color: #800000;
  color: white;
}

</style>
</head>
<body style = "align:center; text-align: center">


<table id="customers">
  <tr>
    <th>iid</th>
    <th>price</th>
    <th>uid</th>
    <th>address</th>
    <th>fullname</th>
    <th>datepurchased</th>

  </tr>
  

<?php

include "config.php";

$sqlSt = "SELECT * FROM invoices";

$result = mysqli_query($db, $sqlSt);

while($row = mysqli_fetch_assoc($result))
{
    $address = $row['address'];
    $uid = $row['uid'];
    $price = $row['price'];
    $iid = $row['iid'];
    $date = $row['date_purchased'];
    $fullname = $row['fullname'];
    echo "<tr> <td>" . $iid . "</td>" . "<td>" . $price . "</td>" . "<td>" . $uid . "</td>" . "<td>" . $address . "</td>" . "<td>" . $fullname . "</td>" . "<td>" . $date . "</td> </tr>";
}



?>
</table>
<br><br>
    <button onclick = "document.location.href='salesmgr.php';" > BACK TO MAIN PAGE </button>
</body>
</html>