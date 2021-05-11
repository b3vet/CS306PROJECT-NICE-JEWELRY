<?php
  session_start();
  //if(!isset($_SESSION['sessionid'])) {
    //$_SESSION['sessionid'] = 0;
  //}
  //else {
    //$_SESSION['sessionid']++;
  //}

  if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: indexnologged.html");
  }
  else {
      header("Location: logindex.html");
  }

?>