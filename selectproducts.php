<!DOCTYPE html>
<html >
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}

@media (min-width: 768px) {
 .grid-container {
   display: grid;
   grid-template-columns: repeat(auto-fill, minmax(250px, 1fr) ) ;
   grid-gap: 0px;
 }
}
.grid-item {
 padding: 2rem;
 text-align: center;
 border-top: 1px solid #dfdfdf;
 border-bottom: 1px solid #dfdfdf;
 cursor: pointer;
 background-color: gray;
}
.grid-item:hover {
    background-color: #d3d3d3;
}
@media (min-width: 768px) {
 .grid-item {
   border-top: 1px solid #dfdfdf;
   border-left: 1px solid #dfdfdf;
   border-bottom: 1px solid #dfdfdf;
 }
}
@media (min-width: 992px) {
  .grid-item {
    border-top: 1px solid #dfdfdf;
    border-left: 1px solid #dfdfdf;
    border-bottom: 1px solid #dfdfdf;
    &:nth-child(-n+2) {
      border-top: 1px solid #dfdfdf;
      border-bottom: 1px solid #dfdfdf;
    }
    &:nth-child(odd) {
      border-left: 1px solid #dfdfdf;
      border-bottom: 1px solid #dfdfdf;
    }
    &:nth-child(-n+3) {
      border-top: none;
      border-bottom: 1px solid #dfdfdf;
    }
    &:first-child,
    &:nth-child(3n+1) {
      border-left: none;
      border-bottom: 1px solid #dfdfdf;
    }
  }
}

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
<!--</div>-->
<?php
session_start(); 
if((isset($_SESSION["sortBy"]) && $_SESSION["sortBy"] == "dateasc")) {
  $sortby = "Date Added (Ascending)"; 
}
else if(isset($_SESSION["sortBy"]) && $_SESSION["sortBy"] == "datedesc"){
  $sortby = "Date Added (Descending)"; 
   
}
else if(isset($_SESSION["sortBy"]) && $_SESSION["sortBy"] == "nameasc"){
  $sortby = "Name (Ascending)"; 
   
}
else if(isset($_SESSION["sortBy"]) && $_SESSION["sortBy"] == "namedesc"){
  $sortby = "Name (Descending)"; 
  ; 
}
else if(isset($_SESSION["sortBy"]) && $_SESSION["sortBy"] == "priceasc"){
  $sortby = "Price (Ascending)"; 
  
}
else if(isset($_SESSION["sortBy"]) && $_SESSION["sortBy"] == "pricedesc"){
  $sortby = "Price (Descending)"; 
   
}
else {
  $sortby = "Date Added (Ascending)"; 
  
}
if((isset($_POST["sortBy"]) && $_POST["sortBy"] == "dateasc")){
  $sortby = "Date Added (Ascending)";  
  $_SESSION["sortBy"] = "dateasc"; 
}
else if((isset($_POST["sortBy"]) && $_POST["sortBy"] == "datedesc")){
  $sortby = "Date Added (Descending)"; 
  $_SESSION["sortBy"] = "datedesc"; 
}
else if((isset($_POST["sortBy"]) && $_POST["sortBy"] == "nameasc")){
  $sortby = "Name (Ascending)"; 
  $_SESSION["sortBy"] = "nameasc"; 
}
else if((isset($_POST["sortBy"]) && $_POST["sortBy"] == "namedesc")){
  $sortby = "Name (Descending)"; 
  $_SESSION["sortBy"] = "namedesc"; 
}
else if((isset($_POST["sortBy"]) && $_POST["sortBy"] == "priceasc")){
  $sortby = "Price (Ascending)"; 
  $_SESSION["sortBy"] = "priceasc"; 
}
else if((isset($_POST["sortBy"]) && $_POST["sortBy"] == "pricedesc")){
  $sortby = "Price (Descending)"; 
  $_SESSION["sortBy"] = "pricedesc"; 
}
else {
  $sortby = "Date Added (Ascending)"; 
  $_SESSION["sortBy"] = "dateasc";
}
?>
<div class="w3-main" style="margin-left:275px">  <!-- products HERE -->
<header class="w3-container w3-xlarge">
    
    <p class="w3-right">
    <?php if((isset($_SESSION["login"]) && $_SESSION["login"] == "nonuser") || !isset($_SESSION["login"])) { ?>
        <a href = "http://localhost/project/index.php">sign in <i class="fa fa-sign-in  w3-margin-right"></i></a> <?php } else { ?>
        <a href = "http://localhost/project/signout.php">sign out <i class="fa fa-sign-out  w3-margin-right"></i></a> <?php } ?>
        <a href = "http://localhost/project/userpage.php">my account <i class="fa fa-user  w3-margin-right"></i></a>
      <a href = "http://localhost/project/cart.php">cart <i class="fa fa-shopping-cart  w3-margin-right"></i></a>
      <a href = "http://localhost/project/search.php">search <i class="fa fa-search  w3-margin-right"></i></a> 
    </p>
  </header>
 <div style = "display:inline"> 
<p> Sort by: <?php echo $sortby; ?> </p>
<form action = "selectproducts.php" method = "POST">
<select name = "sortBy">
    <option value = "dateasc" >Date Ascending</option>
    <option value = "datedesc">Date Descending</option>
    <option value = "priceasc">Price Ascending</option>
    <option value = "pricedesc">Price Descending</option>
    <option value = "nameasc">Name Ascending</option>
    <option value = "namedesc">Name Descending</option> </select>
    <button> SORT </button>
</form> <!-- <br>
<form action = "selectproducts.php" method = "POST">
  <p>Price Range: </p> <input type = text name = "minprice" placeholder ="Min">-<input type = text name = "maxprice" placeholder ="Max">
  <button> FILTER </button>
</form> -->


</div> 
<form action = "onlyproduct.php" method = "POST" name = pid>
<input type="hidden" name="pid" value="-1">
<div class = "grid-container">
<?php 
include "config.php";

if(isset($_POST['category']) || isset($_SESSION["category"]))
{
    //mens, womens, necklace, bracelet
    if(isset($_SESSION["category"])) {
      $cat = $_SESSION['category'];
    }
    if(isset($_POST['category'])) {
      $cat = $_POST['category'];
      $_SESSION["category"] = $_POST["category"];
    }
    /*
    if(isset($_SESSION["maxprice"]))
    {
      $maxprice = $_SESSION["maxprice"];
    }
    if(isset($_POST["maxprice"]))
    {
      $maxprice = $_POST["maxprice"];
      $_SESSION["maxprice"] = $_POST["maxprice"];
    }
    if(isset($_SESSION["minprice"]))
    {
      $minprice = $_SESSION["minprice"];
    }
    if(isset($_POST["minprice"]))
    {
      $minprice = $_POST["minprice"];
      $_SESSION["minprice"] = $_POST["minprice"];
    }
    if(!isset($_POST["maxprice"]) && !isset($_SESSION["maxprice"])) { $maxprice = 999999 ;}
    if(!isset($_POST["minprice"]) && !isset($_SESSION["minprice"])) { $minprice = 0 ;} */
    //ADD SORT BY LOGIC HERE
    if($_SESSION["sortBy"] == "dateasc") {
      
      $sqlquery = "SELECT * FROM products WHERE category = '$cat'";
      
    }
    else if($_SESSION["sortBy"] == "datedesc") {
      
      $sqlquery = "SELECT * FROM products WHERE category = '$cat' ORDER BY pid DESC";
    }
    else if($_SESSION["sortBy"] == "nameasc") {
      
      $sqlquery = "SELECT * FROM products WHERE category = '$cat' ORDER BY name ASC";
    }
    else if($_SESSION["sortBy"] == "namedesc") {
      
      $sqlquery = "SELECT * FROM products WHERE category = '$cat' ORDER BY name DESC";
    }
    else if($_SESSION["sortBy"] == "priceasc") {
      
      $sqlquery = "SELECT * FROM products WHERE category = '$cat' ORDER BY price ASC";
    }
    else if($_SESSION["sortBy"] == "pricedesc") {
      
      $sqlquery = "SELECT * FROM products WHERE category = '$cat' ORDER BY price DESC";
    }
    else {
      $sqlquery = "SELECT * FROM products WHERE category = '$cat'";
    }
    //echo $maxprice . "  " . $minprice;
    $result = mysqli_query($db, $sqlquery);
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
        $imagename = $row['imagename'];
        
    ?>
    
    <a style = "text-decoration: none;" href = "<?php echo "javascript:formSubmit1($pid);"; ?>" class = "grid-item"> 
        <img src="<?php echo $imagename; ?> " alt="<?php echo $name; ?> " height = "100" width = "100"><br><br>
        <?php echo $name . "<br> $" . $price ?> 
    </a> 
    
    <?php } //while closing ?>
    </form>
    </div> <!-- grid closing -->
    
    
    </div> <!-- w3 main content closing -->
    
    
    
    
    
    
    
    
    <?php
    }//isset if closing
?>

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