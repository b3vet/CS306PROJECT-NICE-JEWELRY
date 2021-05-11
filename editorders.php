<?php
include "config.php";
include "orders.php";
//CANCEL ORDER
?>
<!DOCTYPE html>
<html >
<head>
    
    <title>EDIT ORDERS</title>
</head>
<body style = "align:center; text-align: center">

    <form action = "sendeditordermgr.php"  method = "POST">
        <h2> Select the order id of the order you want to update the status of </h2>
        <select name = "ids" required>
            <?php
                $sqlSt1 = "SELECT oid FROM orders";
                $myresult = mysqli_query($db, $sqlSt1);
                while($row1 = mysqli_fetch_assoc($myresult))
                {
                    $id1 = $row1['oid'];
                    
                    echo "<option value = $id1> " . $id1 . "</option>";
                }       
            ?>

        </select>
        <h2> New Status </h2>
        <select name = "newstatus" required>
        
            <option value = 'preparing'> PREPARING </option>
            <option value = 'in delivery'> IN DELIVERY </option>
            <option value = 'delivered'> DELIVERED </option>
            <option value = 'canceled'> CANCELED </option>
        </select>
        <button> UPDATE </button>
    </form><br><br>
    <button onclick = "document.location.href='salesmgr.php';" > BACK TO MAIN PAGE </button>
    
</body>
</html>