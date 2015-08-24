<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>
<?php
  require("../constant.php");
  echo $hostname;
?>
</title>
</head>
<script src="select.js"></script>
<script language="javascript">

function checkdate(date)
{
  var i , n = 0;

  for(i = 0; i < date.length; i ++)
  {
    if(date.charAt(i) == '/')
      n ++;
  }
  if(n != 2 && n != 1)
    alert("格式錯誤\n\n範例 2008/5/5 or 5/5");
}

</script>
<body background="./../04.gif">

<center>
  <font size=+4><?php echo $hostname; ?></font>
</center>

<form action="Update_2.php" method="post">

<?php

  echo "<table border='0' align='center' valign='center' name='b'>\n    ";
  echo "<tr>\n      ";
  echo "<td nowrap align='Center'>編號</td>\n      ";
  echo "<td nowrap align='Center'>電話</td>\n      ";
  echo "<td nowrap align='Center'>取件日</td>\n    ";
  echo "</tr>\n    ";

  for($i = 0; $i < 10; $i ++)
  {
    echo "<tr>\n      ";
    echo "<td nowrap align='Center'>\n        ";
    echo "<input type='text' name='number$i' size='10' onblur='showphone(this.value, $i);'>\n      ";
    echo "</td>\n      ";
    echo "<td nowrap align='Center'>\n        ";
    echo "<input type='text' name='phone$i' size='10'>\n      ";
    echo "</td>\n      ";
    echo "<td nowrap align='center'>\n        ";
    echo "<input type='text' name='takeout$i' size='10' onblur='checkdate(this.value);'>\n      ";
    echo "</td>\n    ";
    echo "</tr>\n    ";
  }
  echo "<tr>\n      ";
  echo "<td align='center' colspan='3'>\n        ";
  echo "<input type='button' value='返回' onclick=location.replace('../index.php');>　";
  echo "<input type='reset' value='重置'>\n      　";
  echo "<input type='submit' value='傳送'>\n        ";
  echo "</td>\n    ";
  echo "</tr>\n  ";
  echo "</table>\n";
  echo "</form>\n";

?>

</body>
</html>
