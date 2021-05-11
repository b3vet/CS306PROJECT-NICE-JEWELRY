<!DOCTYPE html>
<html>
<head>
    <title>PRODUCTS</title>
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
    <th>pid</th>
    <th>size</th>
    <th>color</th>
    <th>material</th>
    <th>description</th>
    <th>name</th>
    <th>category</th>
    <th>price</th>
  </tr>
  

<?php

include "config.php";

$sqlSt = "SELECT * FROM products";

$result = mysqli_query($db, $sqlSt);

while($row = mysqli_fetch_assoc($result))
{
    $pid = $row['pid'];
    $size = $row['size'];
    $color = $row['color'];
    $material = $row['material'];
    $description = $row['desription'];
    $name = $row['name'];
    $category = $row['category'];
    $price = $row['price'];

    echo "<tr> <td>" . $pid . "</td>" . "<td>" . $size . "</td>" . "<td>" . $color . "</td>" . "<td>" . $material . "</td>" . "<td>" . $description . "</td>" . "<td>" . $name . "</td>" . "<td>" . $category . "</td>" . "<td>" . $price . "</td> </tr>";
}



?>
</table>
</body>
</html>