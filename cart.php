<?php 
session_start(); 
include "config.php";

    if(!isset($_SESSION["login"])) {
        $_SESSION["login"] = "nonuser";
    }

    if(isset($_SESSION["login"]) && $_SESSION["login"] == "nonuser") {
        if(!isset($_COOKIE["uid"]))
        {
            //THIS IS THE FIRST TIME THIS USER COMES HERE
            $querysentence = "INSERT INTO users(name) VALUES ('nonuser')";
            $tempres = mysqli_query($db, $querysentence);
            $querysentence = "SELECT MAX(uid) AS mx FROM users";
            $resulthere = mysqli_query($db, $querysentence);
            $row = mysqli_fetch_assoc($resulthere);
            $uidstr = strval($row['mx']);
            setcookie("uid", $uidstr, time()+3600*24*30);
            $_SESSION["username"] = $row['mx'];
        }
        else
        {
            //the user was here before
            $_SESSION["username"] = $_COOKIE["uid"];
        }
        //$_SESSION["login"] = "OK";
    }
    else if(!isset($_SESSION["login"])) {
        echo "THERE is a huge problem here";
        exit;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART PAGE</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style> .w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;} </style>
</head>
<body class="w3-content" style="max-width:1300px">
<script>
    function formSubmit1(p)
    {
      document.forms['pid'].pid.value = p;
      document.forms['pid'].submit();
    }
    function formSubmit2(category)
    {
      document.forms['category'].category.value = category;
      document.forms['category'].submit();
    }
    
  </script>
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;position:absolute" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide" onclick = "document.location.href='index.php';"><b>NICE JEWELRY</b></h3>
  </div>
  <form action="selectproducts.php" method="POST" name=category>
    <input type="hidden" name="category" value="-1">
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="javascript:formSubmit2('necklace');" class="w3-bar-item w3-button">Necklace</a>
    <a href="javascript:formSubmit2('bracelet');" class="w3-bar-item w3-button">Bracelet</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Wedding Ring <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="javascript:formSubmit2('mens');" class="w3-bar-item w3-button">Men's Wedding Ring</a>
      <a href="javascript:formSubmit2('womens');" class="w3-bar-item w3-button">Women's Wedding Ring</a>

    </div>
  </form>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  
</nav>
<script>
  var sth = document.getElementById('mySidebar');
  sth.style.cursor ='pointer';
</script>

<div class="w3-main" style="margin-left:275px">  
<header class="w3-container w3-xlarge">
    
    <p class="w3-right">
    <?php if(isset($_SESSION["login"]) && $_SESSION["login"] == "nonuser") { ?>
        <a href = "http://localhost/project/index.php">sign in <i class="fa fa-sign-in  w3-margin-right"></i></a> <?php } else { ?>
        <a href = "http://localhost/project/signout.php">sign out <i class="fa fa-sign-out  w3-margin-right"></i></a> <?php } ?>
        <a href = "http://localhost/project/userpage.php">my account <i class="fa fa-user  w3-margin-right"></i></a>
      <a href = "http://localhost/project/cart.php">cart <i class="fa fa-shopping-cart  w3-margin-right"></i></a>
      <a href = "http://localhost/project/search.php">search <i class="fa fa-search  w3-margin-right"></i></a> 
    </p>
  </header>
<div id="shopping-cart" style = "text-align: center;margin-top:40px">
<div class="txt-heading">Shopping Cart</div>


<?php
    $userid = $_SESSION['username'];
    $sqlSt = "SELECT * FROM carts WHERE $userid = uid";
    
    $result = mysqli_query($db, $sqlSt);
    
    if(mysqli_num_rows($result) != 0) {
        $total_quantity = 0;
        $total_price = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tr>
    <th>product</th>
    <!-- <th>pid</th> -->
    <th>quantity</th>
    <th>unit price</th>
    <th>total price</th>
    <th>REMOVE</th>
  </tr>
<?php		
    while($row = mysqli_fetch_assoc($result))
    {
        $pidtouse = $row['pid'];
        $sqlSt2 = "SELECT * FROM products WHERE $pidtouse = pid"; //this will always return 1 row
        $result2 = mysqli_query($db, $sqlSt2);
        $price = 0;
        $item_price = 0;
        $imagename = "";
        $pname = "";
        while($row2 = mysqli_fetch_assoc($result2))
        { //this will iterate only once
            $price = $row2['price'];
            $item_price = $row["quantity"]*$price;
            $imagename = $row2["imagename"];
            $pname = $row2["name"];
        }
        
        
		?>
				<tr>
				<td style="text-align:center;"><img src="<?php echo $imagename; ?>" height = "50" width = "50"> <br> <p><?php echo $pname; ?></p></td>
				<!-- <td><p><?php //echo $pidtouse; ?></p></td> -->
				<td style="text-align:right;"><?php echo $row["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". $price; ?></td>
                <td  style="text-align:right;"><?php echo "$ ". $item_price; ?></td>
                <form action = "removefromcart.php" name = pid_uid method = "POST">
                <input type = "hidden" name = "pid_uid" value = "-1">
                <td style="text-align:center;"><a href="javascript:formSubmit('<?php echo $pidtouse . "_" . $userid; ?>');"><i class = "fa fa-trash"></i></a></td>
                </form>
				</tr>
				<?php
				$total_quantity += $row["quantity"];
				$total_price += ($item_price);
		}
        ?>
        <script>
        function formSubmit(val)
        {  
            document.forms['pid_uid'].pid_uid.value = val;
            document.forms['pid_uid'].submit();
        }

        </script>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?> items</td>
<td align="right" colspan="2"><strong><?php echo "$ ".$total_price, 2; ?></strong></td>
<td></td>
</tr>

</table>
<form action = "checkout.php" method = "POST">
    <input type = "hidden" name = "uid_totalprice" value = "<?php echo $userid . "_" . $total_price; ?>">
    <button> CHECKOUT </button>
</form>		
  <?php
} else {
?>
<a href = "index.php">Your Cart is Empty Click to Go Back To Main Page</a>
<?php 
}
/*
if(isset($_COOKIE["uid"]) && strval($_SESSION["username"]) == $_COOKIE["uid"]) {
    session_destroy();
}
*/
?>
</div>
</div> <!-- MAIN CONTENT DIV CLOSING HERE -->
<footer class="w3-lightgrey w3-center w3-small" id="footer" style = "padding-left: 38%; padding-right: 38%;margin-top: 400px; position:absolute; background-color: #D3D3D3; z-index: 999999">
      
      <div class="w3-row-padding">
        <div class="w3-col l12">
          <h4>Store</h4>
          <p><i class="fa fa-fw fa-map-marker"></i> 3WET JEWELRY</p>
          <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
          <p><i class="fa fa-fw fa-envelope"></i> konumyokdardayim@gmail.com</p>
          <h4>We accept</h4>
          <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
          <br>
          <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
          <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
          <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
          <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
          <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
          <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
        </div>
      </div>
  </footer>
<script>
// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>
</body>
</html>