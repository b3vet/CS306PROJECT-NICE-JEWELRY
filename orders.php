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
  text-align: left;
  background-color: #800000;
  color: white;
}
</style>
</head>
<body style = "align:center; text-align: center">


<table id="customers">
  <tr>
    <th>oid</th>
    <th>uid</th>
    <th>pid</th>
    <th>iid</th>
    <th>o_status</th>
  </tr>
  

<?php

include "config.php";

$sqlSt = "SELECT * FROM orders";

$result = mysqli_query($db, $sqlSt);

while($row = mysqli_fetch_assoc($result))
{
    $oid = $row['oid'];
    $uid = $row['uid'];
    $pid = $row['pid'];
    $iid = $row['iid'];
    $o_status = $row['o_status'];

    echo "<tr> <td>" . $oid . "</td>" . "<td>" . $uid . "</td>" . "<td>" . $pid . "</td>" . "<td>" . $iid . "</td>" . "<td>" . $o_status . "</td> </tr>";
}



?>
</table>
</body>
</html>