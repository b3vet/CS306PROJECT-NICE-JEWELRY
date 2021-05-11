<!DOCTYPE html>
<html>
<head>
<title> ADD NEW PRODUCT </title>

</head>
<body style = "align:center; text-align: center">
    <br><br>


    <form action = "sendaddproduct.php", method = "POST" enctype="multipart/form-data"> 
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
        
            Select image to upload:
        <input type="file" name="image" id="image">
        <button> ADD </button> 
    </form><br>

        <br><br><br>

            <button onclick = "document.location.href='products.php';" > WANT TO SEE ALL PRODUCTS? </button> <br>
            <button onclick = "document.location.href='productmgr.php';" > BACK TO MAIN PAGE </button>
       
    




   
</body>
</html>
