<?php

  require("../constant.php");

  for($j = 0; $j < 10; $j ++)
  {
    $n = 0;
    $takeout = $_POST["takeout$j"];
    for($i = 0; $i < strlen($takeout); $i ++)
    {
      if($takeout[$i] == '/')
        $n ++;
    }
    ($n != 2) ? $dateout[$j] = date(Y)."/".$takeout : $dateout[$j] = $takeout;
  }

  $link = mysql_connect("localhost", $id, $passwd);
  mysql_select_db("laundry") or die("無法選擇資料庫");

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER_SET_CLIENT=utf8");
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");

  for($i = 0; $i < 10; $i ++)
  { 
    $number = $_POST["number$i"];
    $takeout = $dateout["$i"];
    $phone = $_POST["phone$i"];

    if($phone != '' && $number != '')
    {
      $query = "UPDATE $table SET takeout = '$takeout' WHERE ";
      $query = $query."number = '$number' And phone = '$phone'";
      $rows = mysql_query($query) or die("更新失敗1" . mysql_error( ));
      echo $query;
    }
  }

?>

<script language="javascript">
  location.href="../index.php";
</script>
