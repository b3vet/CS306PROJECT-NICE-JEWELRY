<?php
include "config.php";
session_start();
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
if(isset($_POST['pid']) || isset($_SESSION["product"]))
{
  if(isset($_SESSION["product"]))
  {
    $pid = $_SESSION["product"];
    $_SESSION["product"] = NULL;
  }
  if(isset($_POST["pid"]))
  {
    $pid = $_POST['pid'];
  }
  
  $sqlSt = "SELECT * FROM products WHERE pid = $pid";
  $result = mysqli_query($db, $sqlSt);
  
  while($row = mysqli_fetch_assoc($result))
  {
    $pid = $row['pid'];
    $size = $row['size'];
    $color = $row['color'];
    $color = strtoupper($color);
    $material = $row['material'];
    $material = strtoupper($material);
    $description = $row['desription'];
    $name = $row['name'];
    $category = $row['category'];
    $price = $row['price'];
    $imagename = $row['imagename'];
  }
}
else 
{
  echo "There is a problem with the product";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title><?php echo $name; ?></title>
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
<?php if((isset($_SESSION["login"]) && $_SESSION["login"] == "nonuser")  || !isset($_SESSION["login"])) { ?>
  <a href = "http://localhost/project/index.php">sign in <i class="fa fa-sign-in  w3-margin-right"></i></a> <?php } else { ?>
    <a href = "http://localhost/project/signout.php">sign out <i class="fa fa-sign-out  w3-margin-right"></i></a> <?php } ?>
    <a href = "http://localhost/project/userpage.php">my account <i class="fa fa-user  w3-margin-right"></i></a>
    <a href = "http://localhost/project/cart.php">cart <i class="fa fa-shopping-cart  w3-margin-right"></i></a>
    <a href = "http://localhost/project/search.php">search <i class="fa fa-search  w3-margin-right"></i></a> 
    </p>
    </header>
    <div class = "w3-row-padding">
    <div class = "w3-col l6"> 
    <!-- PRODUCT IMAGE AND STUFF --> 
    <img src = "<?php echo $imagename; ?>" alt = "<?php echo $name; ?>" height = "500" width = "500" style = "padding-left: 40px">
    <div id="a" style ="padding-left: 40px">
    <div>
    <img src="icons/timeBl.png" alt="" title="" height="40" style="vertical-align:middle;margin:100px 100px/"> 
    
    <span style="margin-left: 10px;">
    <b>1-week Shipping </b>
    </span>
    <br>
    <br>
    </div>
    
    <div>
    <img src="icons/delivery-truckBl.png" alt="" title="" height="40" style="vertical-align:middle;margin:100px 100px/"> 
    
    <span style="margin-left: 10px;">
    <b>Free Insured Shipping and Returns </b>
    </span>
    <br>
    <br>
    </div>
    
    
    <div>
    <img src="icons/wedding-ringBl.png" alt="" title="" height="40" style="vertical-align:middle;margin:100px 100px/"> 
    
    <span style="margin-left: 10px;">
    <b>Lifetime Warranty and Free Resizing </b>
    </span>
    <br>
    <br>
    </div>
    
    
    <div>
    <img src="icons/leaf.png" alt="" title="" height="40" style="vertical-align:middle;margin:100px 100px/"> 
    
    <span style="margin-left: 10px;">
    <b>Ethically Sourced </b>
    </span>
    <br>
    <br>
    </div>
    
    <div>
    <img src="icons/handshakeBl.png" alt="" title="" height="35" style="vertical-align:middle;margin:100px 100px/"> 
    
    <span style="margin-left: 10px;">
    <b>30-day Free Returns</b>
    </span>
    <br>
    <br>
    </div>
    
    <div>
    <img src="icons/diamondNewBl.png" alt="" title="" height="35" style="vertical-align:middle;margin:100px 100px/"> 
    
    <span style="margin-left: 10px;">
    <b>Top Quality In-house Manufacturing</b>
    </span>
    <br>
    <br>
    </div>
    
    </div>
    
    </div>
    
    
    <div class = "w3-col l6" style="text-align: center">  
    <!-- PRODUCT price size material AND STUFF --> 
    <h1><?php echo $name; ?></h1><br>
    <p><?php echo "$ " . $price; ?> <del> <?php echo "   $ " . 1.1*$price; ?> </del> </p> <br>
    <p> Color: <?php echo $color; ?> </p><br>
    <?php if($category == 'mens' || $category == 'womens') { //if the category is womens or mens we will display size necklaces and bracelets do not have size
      echo "<p> Size: " . $size . "<br>"; } ?>
      <p> Material: <?php echo $material . " GOLD"; ?> </p> <br>
      <form action = "addtocart.php" method = "POST">
      <?php $_SESSION["product"] = $pid; ?>
      <input type="hidden" name="pid_uid" value="<?php echo $pid . "_" . $_SESSION["username"]; ?>">
      <button> ADD TO CART </button>
      </form>
      <br> <br>
      
      <div style="text-align: center"> 
      <img src="icons/delivery-truckBl.png?" alt="" title="" height="35" width="35" style=" padding-right: 0.3em;">
      <p style="display:inline;">Ships by: </p> <b> <p style="display:inline; font-size: 110%; color:#23395B" id="shipsBy"> </p> </b> <p style="display:inline;"> if you order today.</p> 
      <div style="text-align: center; width: 65%; margin:auto; padding: 20px"><span>Questions? Speak with a Diamond Expert at </span> <b> <a style="color: #23395B" href="tel:555555" aria-describedby="a11y-external-message">(555)-555-5555 </a></b> <span> or </span> <b> <a href="" aria-describedby="a11y-external-message">send a message</a> </b> 
      </div>
      
      </div> <br> <br>
      
      <p> <?php echo $description; ?> </p><br><br>
      <a href = "index.php"> GO BACK TO MAIN PAGE </a>
      <script type="text/javascript"> //FUNCTION FOR GETTING NEXT WEEKS DATE
      function nextweek(){
        let date = new Date();
        date.setDate(date.getDate() + 7);
        const options = { weekday: 'long', month: 'long', day: 'numeric' };
        return date.toLocaleDateString('en-En', options);
      }	
      document.getElementById("shipsBy").innerHTML = nextweek();
      </script>
      
      
      </div>
      
      
      
      </div> <br> <br> <br>
      </div>
      <div class="w3-main" style="margin-left:275px;text-align: center"> <!-- comment div -->
      <h1> COMMENTS SECTION: </h1> <br> <br>
      <?php
      $sqlSt1 = "SELECT * FROM comments WHERE pid = $pid";
      $result1 = mysqli_query($db, $sqlSt1);
      while($row1 = mysqli_fetch_assoc($result1))
      {
        $username = "";
        $uid = $row1["uid"];
        $sqlSt2 = "SELECT * FROM users WHERE uid = $uid";
        $result2 = mysqli_query($db, $sqlSt2);
        $row3 = mysqli_fetch_assoc($result2);
        
        $username = $row3["name"] . " " . $row3["surname"];
        
        echo "<h3>" . $username . " commented: " . "</h3> <p>" . $row1["comment"] . "</p><br>"; 
      }
      ?>
      <form action = "addcomment.php" method = "POST">
      <textarea name = "comment" placeholder = "Enter comment here..." required></textarea><br>
      <?php $_SESSION["product"] = $pid; ?>
      <button type = "submit">COMMENT</button>
      </form>
      
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