<?php

  require("../constant.php");
  
  $number = $_GET['number'];

  $link = mysql_connect("localhost", $id, $passwd);
  mysql_select_db("laundry") or die("無法選擇資料庫");

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER_SET_CLIENT=utf8");
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");
  
  if($number == '')
    $number = -1;

  $sql="SELECT * FROM $table WHERE number = $number";
  $result = mysql_query($sql) or die("搜尋失敗" . mysql_error( ));

  $num = mysql_num_rows($result);

  ($num != 1) ? $row = "" : $row = mysql_fetch_array($result); 
  echo $row['phone'];

?>
