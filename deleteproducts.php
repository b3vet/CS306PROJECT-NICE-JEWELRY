<?php
include "config.php";
include "products.php";
//CANCEL ORDER
?>
<!DOCTYPE html>
<html >
<head>
    
    <title>DELETE PRODUCTS</title>
</head>
<body style = "align:center; text-align: center">

    <form action = "senddeleteproduct.php"  method = "POST">
        <h2> Select the product id of the product you want to delete </h2>
        <select name = "ids" required>
            <?php
                $sqlSt1 = "SELECT pid FROM products";
                $myresult = mysqli_query($db, $sqlSt1);
                while($row1 = mysqli_fetch_assoc($myresult))
                {
                    $id1 = $row1['pid'];
                    
                    echo "<option value = $id1> " . $id1 . "</option>";
                }       
            ?>

        </select>
        <button> DELETE </button>
        <br><br>
        


    </form>
    <button onclick = "document.location.href='productmgr.php';" > BACK TO MAIN PAGE </button>
</body>
</html>