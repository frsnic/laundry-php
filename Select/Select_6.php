<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>
<?php
  require("../constant.php");
  require("../clothkind.php");
  echo $hostname;
?>
</head>

<body background="../03.gif">

<?php

$link = mysql_connect("localhost", $id, $passwd);
mysql_select_db("laundry") or die("無法選擇資料庫");

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT=utf8");
mysql_query("SET CHARACTER_SET_RESULTS=utf8");

$query = "SELECT * FROM $table WHERE phone = '$_GET[phone]'";
$rows = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
$num = mysql_num_rows($rows);

$query = "SELECT * FROM user WHERE phone = '$_GET[phone]'";
$sn = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
list($name) = mysql_fetch_row($sn);

echo "<table border='2' width='60%' align='center' valign='center'>\n";
echo "  <tr>\n";
echo "    <td nowrap colspan='3' align='center'>電話：$_GET[phone]</td>\n";
echo "    <td nowrap colspan='2'align='center'>姓名：$name</td>\n";
echo "  </tr>\n";

while(list($phone, $number, $takein, $takeout, $yn, $money, $id) = mysql_fetch_row($rows))
{
  $query = 'SELECT * FROM data WHERE id = '.$id;
  $sd = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
  list($number, $id, $d0, $d1, $d2, $d3, $d4, $d5, $d6, $d7) = mysql_fetch_row($sd);

  if($takeout == "0000-00-00")
  {
    $color = 'red';
    $takeout = '';
  }
  else
    $color = 'black';
  echo "<tr>\n";
  echo "<td align='center' nowrap><font color='$color'>\n";
  echo "<a href='Select_5.php?id=$id'>編號：$number</a></font></td>\n      ";
  echo "<td align='center' nowrap colspan='2'>\n";
  echo "<font color='$color'>送洗日：$takein</font></td>\n";
  echo "<td align='center' colspan='2'>";
  echo "<font color='$color'>取件日：$takeout</font></td>\n";
  echo "  </tr>\n";

  echo "  <tr>\n";
  echo "    <td align='center'>名稱</td>\n";
  echo "    <td align='center'>數量</td>\n";
  echo "    <td align='center'>單價</td>\n";
  echo "    <td align='center'>總價</td>\n";
  echo "    <td align='center'>備考</td>\n";
  echo "  </tr>\n";

  for($i = 0; $i < 8; $i ++)
  {
    $d = 'd'.$i;
    list($str1, $str2, $str3, $str4, $str5) = explode(';', $$d);
    if($str1 != null && $str1 != 0)
    {
      echo "  <tr>\n";
      for($j = 1; $j < 4; $j ++)
      {
        $c = 'c'.$j;
        ($str1 == $j) ? $$c = "selected" : $$c = "";
      }
      for($j = 1; $j < 5; $j ++)
      {
        $m = 'm'.$j;
        ($str5 == $j) ? $$m = "selected" : $$m = "";
      }
      echo "    <td align='center'>\n";
      $vn = "f".$id."cloth".$i;
      echo "      <select name='$vn'>\n";
      echo "        <option value='1' $c1>衣服　　</option>\n";
      echo "        <option value='2' $c2>褲子　　</option>\n";
      echo "        <option value='3' $c3>外套　　</option>\n";
      echo "        <option value='-1'>其他　　</option>\n";
      if($str1 > 3)
      {
        $clothname = "clothkind".$str1;
        $clothname = $$clothname;
        echo "        <option value='$str1' selected=\"true\">$clothname</option>\n";
      }
      echo "      </select>\n";
      echo "    </td>\n";
      echo "    <td align='center'>";
      $piece = "f".$id."piece".$i;
      echo "<input type='text' name='$piece' size='7' value='$str2'>";
      echo "</td>\n";
      echo "    <td align='center'>";
      $one = "f".$id."one".$i;
      echo "<input type='text' name='$one' size='7' value='$str3'>";
      echo "</td>\n";
      echo "    <td align='center'>";
      $all = "f".$id."all".$i;
      echo "<input type='text' name='$all' size='7' value='$str4'>";
      echo "</td>\n";
      echo "    <td align='center'>\n";
      echo "      <select name='method$i'>\n";
      echo "        <option value='1' $m1>水洗</option>\n";
      echo "        <option value='2' $m2>乾洗</option>\n";
      echo "        <option value='3' $m3>熨燙</option>\n";
      echo "        <option value='4' $m4>自助</option>\n";
      echo "      </select>\n";
      echo "    </td>\n";
      echo "  </tr>\n";
    }
  }
}
echo "</table><br />\n";
?>

  <center>
    <input type="button" value="返回" onclick=location.replace("../index.php");>　
    <input type="button" value="完帳" onclick=location.replace("../Update/Update_2.php");>
  </center>

</body>
<html>