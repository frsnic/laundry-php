<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<script src="select.js"></script>
<script language="javascript">

function local()
{
  var str = document.getElementsByName("phone")[0].value;
  if(str == '')
    alert("單人搜尋只能使用電話或姓名搜尋");
  else
  {
    url = "Select_6.php?phone=" + str;
    location.href = url;
  }
}

</script>
<title>
<?php
  require("../constant.php");
  echo $hostname;
?>
</title>
</head>

<body background="../01.gif">
  <p align="center">
    <font size="+4">
      <?php echo $hostname;?>
    </font>
  </p><br />

  <form action="Select_3.php" method="post">
    <table border=0 width="60%" align="center" valign="center">
      <tr>
        <td nowrap>姓名：<input type="text" name="name" onblur="showUser(this.value);"></td>
        <td nowrap>　電話：<input type="text" name="phone" id="phone"></td>
     </tr>
      <tr>
        <td nowrap>編號：<input type="text" name="number"></td>
       <td nowrap>送洗日：<input type="text" name="takein"></td>
      </tr>
      <tr>
        <td>　</td>
      </tr>
      <tr>
        <td align="center" colspan="2">
          <input type="button" value="單人搜尋" onclick=local();>　
          <input type="reset" value="重置">　
          <input type="button" value="返回" onclick=location.replace("../index.php");>　
          <input type="submit" value="傳送">
        </td>
      </tr>
    </table>
  </form>

  </body>
<html>