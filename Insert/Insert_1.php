<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
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

function changecloth(kind, selectname)
{
  if(kind == -1)
  {
    url = "../cloth.php?t=" + selectname;
    winID = window.open(url, 'child', 'height = 300, width = 500');
  }
}

function subcoco(i)
{
  var piece = "piece"+i;
  var one = "one"+i;
  piece = document.getElementsByName(piece)[0].value;
  one = document.getElementsByName(one)[0].value;
  var all = "all"+i;
  document.getElementsByName(all)[0].value = piece * one;
  var tmp = document.getElementsByName("money")[0].value;
  document.getElementsByName("money")[0].value = parseInt(tmp, 10) + piece * one;
}

</script>
<title>
<?php
  require("../constant.php");
  echo $hostname;
?>
</title>
</head>

<body background="../05.gif">
<form action="Insert_2.php" method="post" name="mother">
<table border="2" width="60%" align="center" valign="center">
  <tr>
    <td colspan="3" align="center"><b><?php echo $hostname; ?></b></td>
    <td align="center">　編號：</td>
    <td align="center">
      <input type="text" name="number" size="6">
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center">
    　電話：<input type="text" name="phone" size="8" onblur="showUser(this.value);">
    </td>
    <td nowrap align="center">　姓名：</td>
    <td nowrap align="center">
      <input type="text" name="name" id="name" size="6">
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center">
      送洗日：<input type="text" name="takein" size="8" onblur='checkdate(this.value);'>
    </td>
    <td align="center">取件日：</td>
    <td align="center">
      <input type="text" name="takeout" size="6">
    </td>
  </tr>
  <tr>
    <td align="center" size="15">名稱</td>
    <td align="center">數量</td>
    <td align="center">單價</td>
    <td align="center">總價</td>
    <td align="center">備考</td>
  </tr>

<?php

for($i = 0; $i < 8; $i ++)
{
  echo "  <tr>\n";
  echo "    <td align='center'>\n";
  echo "      <select name='cloth$i' onchange='changecloth(this.value, this.name)'>\n";
  echo "        <option value='1'>衣服 　　</option>\n";
  echo "        <option value='2'>褲子　　</option>\n";
  echo "        <option value='3'>外套　　</option>\n";
  echo "        <option value='-1'>其他　　</option>\n";
  echo "      </select>\n";
  echo "    </td>\n";
  echo "    <td align='center'><input type='text' name='piece$i' size='7' onblur='subcoco($i);'></td>\n";
  echo "    <td align='center'><input type='text' name='one$i' size='7' onblur='subcoco($i);'></td>\n";
  echo "    <td align='center'><input type='text' name='all$i' size='7' onblur='subcoco($i);'></td>\n";
  echo "    <td align='center'>\n";
  echo "      <select name='method$i'>\n";
  echo "        <option value='1'>水洗</option>\n";
  echo "        <option value='2'>乾洗</option>\n";
  echo "        <option value='3'>熨燙</option>\n";
  echo "        <option value='4'>自助</option>\n";
  echo "      </select>\n";
  echo "    </td>\n";
  echo "  </tr>\n";
}

?>

    <td align="center" colspan="2" nowrap>
      總價：<input type="text" name="money" size="4" value="0">
      　已付：<input type="text" name="yn" size="4" value="0">
    </td>
    <td align="center" colspan="3" nowrap>
      <input type="button" value="返回" onclick="location.replace('../index.php');">　
      <input type="reset" value="重置">　
      <input type="submit" value="傳送">
    </td>
  </tr>
</table>
</form>

</body>
<html>
