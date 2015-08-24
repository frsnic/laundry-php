<?php

  require("../constant.php");

  $link = mysql_connect("localhost", $id, $passwd);
  mysql_select_db("laundry") or die("無法選擇資料庫");

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER_SET_CLIENT=utf8");
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");

  $query = "SELECT * FROM $table WHERE ";

  if(strlen($_POST['phone']) == 0)
    $_POST['phone'] = '1 = 1';
  else
    $_POST['phone'] = "phone = '".$_POST['phone']."'";
  if(strlen($_POST['number']) == 0)
    $_POST['number'] = '1 = 1';
  else
    $_POST['number'] = "number = '".$_POST['number']."'";
  if(strlen($_POST['takein']) == 0)
    $_POST['takein'] = '1 = 1';
  else
    $_POST['takein'] = "takein = '".$_POST['takein']."'";

  $query = $query.$_POST['phone']." && ".$_POST['number']." && ".$_POST['takein'];

  $rows = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
  $num = mysql_num_rows($rows);

?>
