<?php

  require("../constant.php");
  
  $phone = $_GET['phone'];

  $link = mysql_connect("localhost", $id, $passwd);
  mysql_select_db("laundry") or die("無法選擇資料庫");

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER_SET_CLIENT=utf8");
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");
  
  $sql="SELECT * FROM user WHERE phone = $phone";
  $result = mysql_query($sql);
  
  ($result == Null) ? $row = "" : $row = mysql_fetch_array($result); 
  echo $row['name'];

?>
