<script src="up.js"> </script>
<?php

  require("../constant.php");

  $link = mysql_connect("localhost", $id, $passwd);
  mysql_select_db("laundry") or die("無法選擇資料庫");

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER_SET_CLIENT=utf8");
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");

  $query = "SELECT * FROM $table WHERE id = '$_POST[hidid]'";
  $rows = mysql_query($query) or die("搜尋失敗1" . mysql_error( ));
  list($phone, $number, $takein, $takeout, $yn, $money, $num) = mysql_fetch_row($rows);

  $query = "SELECT * FROM user WHERE phone = '$phone'";
  $rows = mysql_query($query) or die("搜尋失敗2" . mysql_error( ));
  list($name) = mysql_fetch_row($rows);

  $str = "姓名　：$name".'\n';
  $str = $str."電話　：$phone".'\n'."編號　：$number".'\n';

  if($takein != $_POST['takein'])
    $str = $str."送洗日：".$takein."→".$_POST['takein'].'\n';
  else
    $str = $str."送洗日：$takein".'\n';
  if($takeout != $_POST['takeout'])
    $str = $str."取件日：".$takeout."→".$_POST['takeout'].'\n';
  else
    $str = $str."取件日：$takeout".'\n';

  $query = 'SELECT * FROM data WHERE id = '.$_POST['hidid'];
  $sd = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
  list($number, $id, $d0, $d1, $d2, $d3, $d4, $d5, $d6, $d7) = mysql_fetch_row($sd);

  for($i = 0; $i < 8; $i ++)
  {
    $d = "d".$i;
    $num = $i + 1;
    $t = "f".$id."cloth".$i;
    $cloth = $_POST["$t"];
    $piece = "f".$id."piece".$i;
    $one = "f".$id."one".$i;
    $all = "f".$id."all".$i;
    $data[$i] = $cloth.";".$_POST["$piece"].";".$_POST["$one"].";";
    $data[$i] = $data[$i].$_POST["$all"].";".$_POST["method$i"];
    if($$d != $data[$i])
    {
      if($_POST["$piece"] == NULL || $_POST["$piece"] == 0)
      {
        $data[$i] = NULL;
        $str = $str."資料$num  ：".$$d.'\n';
      }
      else
        $str = $str."資料$num  ：".$$d."→".$data[$i].'\n';
    }
    else
      $str = $str."資料$num  ：".$$d."→".$data[$i].'\n';
  }

  $tmoney = "f".$_POST['hidid']."money";
  $tmoney = $_POST["$tmoney"];
  if($money != $tmoney)
    $str = $str."總價　：".$money."→".$tmoney.'\n';
  else
    $str = $str."總價　：".$money.'\n';

  $tyn = "f".$_POST['hidid']."yn";
  $tyn = $_POST["$tyn"];
  if($yn != $tyn)
    $str = $str."已付　：".$yn."→".$tyn.'\n';
  else
    $str = $str."已付　：".$yn.'\n';

  $t = $_POST['money'] - $_POST['yn'];
  $str = $str."餘額　：".$t;
  echo "<script language='javascript'>
          if(confirm('$str'))
          {
            uptable('$_POST[takein]', '$_POST[takeout]', $tmoney, $tyn, '$_POST[hidid]');
            updata('$_POST[hidid]', '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]');
          }
        </script>";

?>

<script language="javascript">
  location.href="../index.php";
</script>