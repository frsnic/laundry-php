<script src="del.js"></script>
<?php

  function del($num)
  {
    require("../constant.php");

    $link = mysql_connect("localhost", $id, $passwd);
    mysql_select_db("laundry") or die("無法選擇資料庫");

    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER_SET_CLIENT=utf8");
    mysql_query("SET CHARACTER_SET_RESULTS=utf8");

    $query = "SELECT * FROM $table WHERE id = $num";

    $rows = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
    list($phone, $number, $takein, $takeout, $yn, $money, $num) = mysql_fetch_row($rows);

    $query = "SELECT * FROM user WHERE phone = $phone";
    $sn = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
    list($name) = mysql_fetch_row($sn);

    $str = "姓名　：".$name.'\n';
    $str = $str."電話　：".$phone.'\n'."編號　：".$number.'\n'."送洗日：".$takein.'\n';
    $t = $money - $yn;
    $str = $str."取件日：".$takeout.'\n'."餘額　：".$t;
    echo "<script language='javascript'>
            if(confirm('$str'))
              deljs($num);
          </script>";
  }

  $id = explode(';', $_GET['id']);
  for($i = 0; ; $i ++)
  {
    if($id[$i] != "")
      del($id[$i]);
    else
     break;
  }

?>

<script language="javascript">
  location.href="../index.php";
</script>