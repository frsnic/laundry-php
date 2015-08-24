<?php

  require("../constant.php");
  
  $num=$_GET['id'];

  $link = mysql_connect("localhost", $id, $passwd);
  mysql_select_db("laundry") or die("無法選擇資料庫");

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER_SET_CLIENT=utf8");
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");

  $deltable = "Delete FROM $table WHERE id = $num";
  $deldata = "Delete FROM data WHERE id = $num";

  mysql_query($deltable) or die("刪除失敗" . mysql_error( ));
  mysql_query($deldata) or die("刪除失敗" . mysql_error( ));

?>
