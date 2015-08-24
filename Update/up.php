<?php

  require("../constant.php");
  
  $num = $_GET['id'];

  $link = mysql_connect("localhost", $id, $passwd);
  mysql_select_db("laundry") or die("無法選擇資料庫");

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER_SET_CLIENT=utf8");
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");

  if($_GET['t'] == 0)
  {
    $takein=$_GET['takein'];
    $takeout=$_GET['takeout'];
    $yn=$_GET['yn'];
    $money=$_GET['money'];
    $query = "UPDATE $table SET takein = '$takein', takeout = '$takeout', ";
    $query = $query."yn = '$yn', money = '$money' WHERE id = '$num'";
    $rows = mysql_query($query) or die("更新失敗1" . mysql_error( ));
  }
  else
  {
    $data1=$_GET['data1'];
    $data2=$_GET['data2'];
    $data3=$_GET['data3'];
    $data4=$_GET['data4'];
    $data5=$_GET['data5'];
    $data6=$_GET['data6'];
    $data7=$_GET['data7'];
    $data8=$_GET['data8'];
    $query = "UPDATE data SET data1 = '$data1', data2 = '$data2', data3 = '$data3', ";
    $query = $query."data4 = '$data4', data5 = '$data5', data6 = '$data6', ";
    $query = $query."data7 = '$data7', data8 = '$data8' WHERE id = '$num'";
    echo $query;
    $rows = mysql_query($query) or die("更新失敗2" . mysql_error( ));
  }

?>
