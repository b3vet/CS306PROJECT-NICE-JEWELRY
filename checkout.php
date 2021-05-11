<?php
    include "config.php";
    session_start();
    if(isset($_POST["uid_totalprice"]) || (!isset($_POST["uid_totalprice"]) && isset($_SESSION["uid_totalprice"]))) {
        $uid = 0;
        $totalprice = 0;
        if(!isset($_POST["uid_totalprice"]) && isset($_SESSION["uid_totalprice"]))
        {
            $index = strpos($_SESSION["uid_totalprice"], "_");
            $uid = substr($_SESSION["uid_totalprice"], 0, $index);
            $totalprice = substr($_SESSION["uid_totalprice"], $index+1);
        }
        else {
            $index = strpos($_POST["uid_totalprice"], "_");
            $uid = substr($_POST["uid_totalprice"], 0, $index);
            $totalprice = substr($_POST["uid_totalprice"], $index+1);
            $_SESSION["uid_totalprice"] = $_POST["uid_totalprice"];
        }
        
        //$sqlSt1 = "DELETE FROM carts WHERE uid = $uid";
        //$result1 = mysqli_query($db, $sqlSt1);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHECKOUT</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
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
<!--<div class="w3-row-padding">
 <div class="w3-col l2"> -->
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
<div class="w3-main" style="margin-left:275px">  <!-- products HERE -->
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
  <form action = "sendcheckout.php" method = "POST">
    <?php if($_SESSION["login"] == "nonuser") { ?>
    <h2> CONTACT INFO </h2>
    <input type = "text" name = "emailtocontact" placeholder = "Please enter your email"> <br>
    <?php } ?>
    <h2> Invoice Information </h2><br>
    
        <p>Full name: </p><input type = "text" name = "fullname" required><br>
        <p>Address: </p><textarea name = "address" required></textarea><br>
        <h2> Payment Information </h2><br>
        <p>Card Number: </p><input type = "text" name = "cardno" required><br>
        <p>Expiration Date (MM/YY): </p><input type = "text" name = "expdate" required><br>
        <p>Security Code: </p><input type = "text" name = "securitycode" required><br>
        <p>Name on Card: </p><input type = "text" name = "nameoncard" required><br>
        <input type = "hidden" name = "price" value = "<?php echo $totalprice; ?>">
        <button type = "submit">PURCHASE</button>
    </form>
    <?php
    }
    else {
        echo "There is a huge problem here.";
    }


?>
</div>
<footer class="w3-lightgrey w3-center w3-small" id="footer" style = "padding-left: 38%; padding-right: 38%;margin-top: 30px; position:absolute; background-color: #D3D3D3; z-index: 999999">
      
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
