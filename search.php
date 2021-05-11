<html>
<head>
<link type="text/css" rel="stylesheet" href="search_style.css"/>
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
<!-- 
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search_box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("sendsearch.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search_box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
-->
</head>
<body>
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
</div><br>
<br>
<button onclick = "document.location.href = 'index.php'"> GO BACK TO MAIN PAGE </button>

</div>
</body>
</html>