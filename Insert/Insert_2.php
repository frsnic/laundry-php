<?php

  require("../constant.php");

  $link = mysql_connect("localhost", $id, $passwd);
  mysql_select_db("laundry") or die("無法選擇資料庫");

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER_SET_CLIENT=utf8");
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");

  for($i = 0; $i < strlen($_POST['takein']); $i ++)
  {
    if($_POST['takein'][$i] == '/')
      $n ++;
  }
  ($n != 2) ? $datein = date(Y)."/".$_POST['takein'] : $datein = $_POST['takein'];
  $n = 0;
  for($i = 0; $i < strlen($_POST['takeout']); $i ++)
  {
    if($_POST['takeout'][$i] == '/')
      $n ++;
  }
  if($n == 1)
    $dateout = date(Y)."/".$_POST['takeout'];
  else if($n == 2)
    $dateout = $_POST['takeout'];

  $query = "INSERT INTO $table(phone,number,takein,takeout,yn,money) ";
  $value = "VALUES('$_POST[phone]', '$_POST[number]', '$datein' ,";
  $value = $value."'$dateout', '$_POST[yn]', '$_POST[money]')";
  $query = $query.$value;
  echo $query."<br />";

  mysql_query($query) or die("新增失敗" . mysql_error( ));

  $sql="SELECT * FROM user WHERE phone = '$_POST[phone]'";
  $result = mysql_query($sql);
  $num = mysql_num_rows($result);
  
  if($num == 0)
  {
    $query = "INSERT INTO user(name, phone) ";
    $value = "VALUES('$_POST[name]', '$_POST[phone]')";
    $query = $query.$value;
    echo $query."<br />";
    mysql_query($query) or die("新增失敗" . mysql_error( ));
  }

  for($i = 0; $i < 8; $i ++)
  {
    if($_POST["piece$i"] == NULL)
      $data[i] = NULL;
    else
    {
      $data[$i] = $_POST["cloth$i"].";".$_POST["piece$i"].";".$_POST["one$i"].";";
      $data[$i] = $data[$i].$_POST["all$i"].";".$_POST["method$i"];
    }
  }

  $query = "SELECT id FROM $table WHERE number = '$_POST[number]'";
  $result = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
  list($id) = mysql_fetch_row($result);

  $query = "INSERT INTO data(number, id, data1, data2, ";
  $query = $query."data3, data4, data5, data6, data7, data8) ";
  $value = "VALUES('$_POST[number]', '$id', '$data[0]', '$data[1]', '$data[2]', ";
  $value = $value."'$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]')";
  $query = $query.$value;
  echo $query."<br />";
  mysql_query($query) or die("新增失敗" . mysql_error( ));

?>

<script language="javascript">
  location.href="../index.php";
</script>