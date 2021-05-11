<?php
include "config.php";
if(isset($_POST['search']))
{
    $search_val=$_POST['search'];
    
    $sqlSt = "SELECT * FROM products WHERE name LIKE '%$search_val%' OR desription LIKE '%$search_val%'";
    $get_result = mysqli_query($db, $sqlSt);
    if(mysqli_num_rows($get_result) == 0) { echo "<h1> NO RESULT IS FOUND. CLICK <a href = \"search.php\">HERE</a> TO GO BACK TO SEARCH</h1>"; exit; }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH RESULT</title>
    <style>     
body
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:100%;
 font-family: "Myriad Pro","Helvetica Neue",Helvetica,Arial,Sans-Serif;
 background-color:#F2F2F2;
}
#wrapper
{
 margin:0 auto;
 padding:0px;
 text-align:center;
 width:995px;
}
#wrapper h1
{
 margin-top:50px;
 font-size:45px;
 color:#585858;
}
#wrapper h1 p
{
 font-size:18px;
}
#search_box input[type="text"]
{
 width:450px;
 height:45px;
 padding-left:10px;
 font-size:18px; 
 margin-bottom:15px;
 color:#000;
 border:none;
}
#search_box input[type="submit"]
{
 width:100px;
 height:45px;
 background-color:#000;
 color:white;
 border:none;
}
#result_div
{
 width:555px; 
 margin-left:220px;
}
#result_div li
{ 
 margin-bottom:20px;
 list-style-type:none;
}
#result_div li a
{
 text-decoration:none;
 display:block;
 text-align:left;
}
#result_div li a .title
{
 font-weight:bold;
 font-size:18px;
 color:#5882FA;
}
#result_div li a .desc
{
 color:#6E6E6E;
}
</style>
</head>
<body style = "text-align: center">
<script>
    function formSubmit(p)
    {
      document.forms['pid'].pid.value = p;
      document.forms['pid'].submit();
    }
</script>
<div id="wrapper">

<div id="search_box">
 <form action = "sendsearch.php" method = "POST">
  <input type="text" autocomplete="off" name ="search">
  <button type = "submit"> SEARCH </button>
  <!-- <div id="livesearch"></div> -->
 </form>
</div>
<div id ="result_div">
<?php
    echo "<form action = \"onlyproduct.php\" method = \"POST\" name = pid> <input type = \"hidden\" name = \"pid\" value = \"-1\">";
    
    while($row=mysqli_fetch_assoc($get_result))
    {
        $pid = $row["pid"];
        $desc = $row["desription"];
        echo "<li><a href = \"javascript:formSubmit(" . $pid . ");\"><span class='title'>".$row['name']."</span><br><span class='desc'>" . $desc . "</span></a></li>";
    }
    echo "</form>";
    
}
?>

</div><br>
<button onclick = "document.location.href = 'index.php'"> GO BACK TO MAIN PAGE </button>



</div>


</body>
</html>