<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<script src="select.js"></script>
<script language="javascript">

function subcoco(id, i)
{
  var piece = "f"+id+"piece"+i;
  var one = "f"+id+"one"+i;
  piece = document.getElementsByName(piece)[0].value;
  one = document.getElementsByName(one)[0].value;
  var all = "f"+id+"all"+i;
  document.getElementsByName(all)[0].value = piece * one;
  var money = "f"+id+"money";
  var tmp = document.getElementsByName(money)[0].value;
  tmp = parseInt(tmp, 10) + piece * one;
  document.getElementsByName(money)[0].value = tmp;
  var list = "f"+id+"list";
  var yn = "f"+id+"yn";
  tmp2 = document.getElementsByName(yn)[0].value;
  document.getElementsByName(list)[0].value = tmp - tmp2;
}

function ynf(id)
{
  var money = "f"+id+"money";
  money = document.getElementsByName(money)[0].value;
  var yn = "f"+id+"yn";
  yn = document.getElementsByName(yn)[0].value;
  var list = "f"+id+"list";
  document.getElementsByName(list)[0].value = money - yn;
}

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
    var url = "../cloth.php?t=" + selectname;
    winID = window.open(url, 'child', 'height=300, width=500');
  }
}

</script>
<title>
<?php
  require("../constant.php");
  echo $hostname;
?>
</head>

<body background="../02.gif">

<?php

  require("Select_4.php");
  if($_GET['id'] != "")
  {
    $id = explode(';', $_GET['id']);
    for($i = 0; $i < 8; $i ++)
      select($id[$i]);
  }
  else
    select($_GET['id']);

?>

</body>
<html>
