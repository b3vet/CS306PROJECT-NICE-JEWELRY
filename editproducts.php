<?php
include "config.php";
include "products.php";
//edit product
?>
<!DOCTYPE html>
<html >
<head>
    
    <title>EDIT PRODUCTS</title>
</head>
<body style = "align:center; text-align: center">

    <form action = "sendeditproduct.php"  method = "POST">
        <h2> Select the product id of the product you want to edit</h2>
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
        <h2> New Info </h2>
        
        <input type = "input" name = "name" placeholder = "Enter product name" required><br>
        <textarea name = "desc" placeholder = "Enter description" required> </textarea><br>
        <select name = "material" required>
            <option value = '14k'> 14K GOLD </option>
            <option value = '18k'> 18K GOLD </option>
            <option value = '10k'> 10K GOLD </option>
        </select><br>
        <select name = "size" required>
            <option value = '1'> 1 </option>
            <option value = '2'> 2 </option>
            <option value = '3'> 3 </option>
            <option value = '4'> 4 </option>
            <option value = '5'> 5 </option>
            <option value = '6'> 6 </option>
            <option value = '7'> 7 </option>
            <option value = '8'> 8 </option>
            <option value = '9'> 9 </option>
        </select><br>
        <select name = "color" required>
            <option value = 'yellow'> YELLOW </option>
            <option value = 'rose'> ROSE </option>
            <option value = 'silver'> SILVER </option>
        </select><br>
        <select name = "category" required>
            <option value = 'mens'> MEN'S WEDDING RINGS </option>
            <option value = 'womens'> WOMEN'S WEDDING RINGS </option>
            <option value = 'bracelet'> BRACELETS </option>
            <option value = 'necklace'> NECKLACES </option>
        </select><br>
        <input type = "input" name = "price" placeholder = "Enter product price" required><br>
        <button> UPDATE </button>
    </form>
    <br><br>
    <button onclick = "document.location.href='productmgr.php';" > BACK TO MAIN PAGE </button>
       
    
</body>
</html>