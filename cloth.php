<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<script language="javascript">

// 新增選項
function addOption(newName, newValue, t)
{
  // 取得欄位名
  var objSelect = window.opener.document.getElementsByName(t)[0];
  // 建立Option物件
  var objOption = new Option(newName, newValue, true);
  objSelect.options[objSelect.options.length] = objOption;
  window.close();
}

</script>
<title>
<?php
  require("constant.php");
  echo $hostname;
?>
</title>
</head>

<body background="../04.gif">
<center>
<font Size="+3"><?php echo $hostname ?></font>

<br /><br />
<form>
<?php

  require("clothkind.php");

  $t = $_GET['t'];
  echo "<table border='2'>\n";
  echo "<tr>\n";
  for($i = 4; $i <= $num ; $i ++)
  {
    $radioname = "clothkind".$i;
    $radioname = $$radioname;
    echo "<td nowrap>\n";
    echo "<input type='radio' value='$i' name='cv' onclick='addOption(\"$radioname\", $i, \"$t\")';>\n";
    echo $radioname."</td>\n";
    if(($i - 3) % 5 == 0)
      echo "</tr><tr>";
  }
  echo "</table>";

?>
</form>
</center>

</body>
</html>