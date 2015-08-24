<?php
  require("Select_2.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript">

function sub(c)
{
  var str = "";

  for(var i = 0; i < <?php echo $num ?>; i ++)
  {
    boxname = "box" + i;
    if(document.getElementsByName(boxname)[0].checked == true)
    {
      hidname = "hid" + i;
      str = str + document.getElementsByName(hidname)[0].value + ';';
    }
  }
  (c == 'd') ? url = '../Delete/Delete_1.php?id=' + str : url = 'Select_5.php?id=' + str;
  location.href = url;
}

function all(num)
{
  for(i = 0; i < num; i ++)
  {
    str = "box"+i;
    document.getElementsByName(str)[0].checked = true;
  }
}

</script>
<title><?php echo "$hostname"; ?></title>
</head>

<body background="../03.gif">

<?php
  echo "<font size='+3'><center>$hostname</center></font>";
  echo "<form method='post' name ='form'>\n  ";
  echo "<table border='7' align='center' valign='center'>\n    ";
  echo "<tr>\n      ";
  echo "<td nowrap align='center'>　</TD>\n      ";
  echo "<td nowrap align='center' border='7' width='60'>姓名</td>\n      ";
  echo "<td nowrap align='center' border='7' width='100'>電話</td>\n      ";
  echo "<td nowrap align='center' border='7' width='50'>編號</td>\n      ";
  echo "<td nowrap align='center' border='7' width='100'>送洗日</td>\n      ";
  echo "<td nowrap align='center' border='7' width='100'>取件日</td>\n      ";
  echo "<td nowrap align='center' border='7' width='50'>總價</td>\n    ";
  echo "<td nowrap align='center' border='7' width='40'>已付</td>\n    ";
  echo "<td nowrap align='center' border='7' width='40'>餘額</td>\n    ";
  echo "</tr>\n    ";
  $i = 0;
  while(list($phone, $number, $takein, $takeout, $yn, $money, $id) = mysql_fetch_row($rows))
  {
    if($takeout == "0000-00-00")
    {
      $color = 'red';
      $takeout = '　';
    }
    else
      $color = 'black';
    $query = "SELECT * FROM user WHERE phone = $phone";
    $sn = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
    list($name) = mysql_fetch_row($sn);

    echo "<tr>\n      ";
    echo "<td nowrap align='center'>\n        ";
    echo "<input type='checkbox' name='box$i'>\n      ";
    echo "<input type='hidden' name='hid$i' value='$id'>\n      ";
    echo "</td>\n      ";
    echo "<td nowrap align='center'><font color='$color'>$name</font></td>\n      ";
    echo "<td nowrap align='center'><font color='$color'>$phone</font></td>\n      ";
    echo "<td nowrap align='center'>\n        ";
    echo "<a href='Select_5.php?id=$id'>$number</a>\n      ";
    echo "</td>\n      ";
    echo "<td nowrap align='center'><font color='$color'>$takein</font></td>\n      ";
    echo "<td nowrap align='center'><font color='$color'>$takeout</font></td>\n      ";
    echo "<td nowrap align='center'><font color='$color'>$money</font></td>\n    ";
    echo "<td nowrap align='center'><font color='$color'>$yn</font></td>\n    ";
    $t = $money-$yn;
    echo "<td nowrap align='center'><font color='$color'>$t</font></td>\n    ";
    echo "</tr>\n    ";
    $i ++;
  }
  echo "<tr>\n      ";
  echo "<td align='center' colspan='9'>\n        ";
  echo "<input type='button' value='全選' onclick=all('$i');>　\n        ";
  echo "<input type='button' value='刪除' onclick=sub('d');>　\n        ";
  echo "<input type='button' value='返回' onclick=location.replace('Select_1.php');>　\n";
  echo "        <input type='button' value='修改' onclick=sub('u');>\n      ";
  echo "</td>\n    ";
  echo "</tr>\n  ";
  echo "</table>\n";
  echo "</form>\n";

?>

</body>
</html>
