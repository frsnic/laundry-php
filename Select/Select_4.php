<?php

function select($data)
{
  require("../constant.php");
  require("../clothkind.php");

  $link = mysql_connect("localhost", $id, $passwd);
  mysql_select_db("laundry") or die("無法選擇資料庫");

  mysql_query("SET NAMES 'utf8'");
  mysql_query("SET CHARACTER_SET_CLIENT=utf8");
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");

  $query = "SELECT * FROM $table WHERE id = '$data'";
  $rows = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
  $num = mysql_num_rows($rows);
  $n = 1;
  while(list($phone, $number, $takein, $takeout, $yn, $money, $id) = mysql_fetch_row($rows))
  {
    $query = "SELECT * FROM user WHERE phone = $phone";
    $sn = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
    list($name) = mysql_fetch_row($sn);

    echo "<form method='post' action='../Update/Update_3.php' name='form$id'>\n";
    echo "<table border='2' width='60%' align='center' valign='center'>\n";
    echo "  <tr>\n";
    echo "    <td colspan='3' align='center'><b>第 $n 筆，共 $num 筆</b></td>\n";
    echo "    <td align='center'>　編號：</td>\n";
    echo "    <td align='center'>$number</td>\n";
    echo "  </tr>\n";
    echo "  <tr>\n";
    echo "    <td colspan='3' align='center'>電話：$phone</td>\n";
    echo "    <td nowrap align='center'>　姓名：</td>\n";
    echo "    <td nowrap align='center'>$name</td>\n";
    echo "  </tr>\n";
    echo "  <tr>\n";
    echo "    <td colspan='3' align='center'>\n";
    echo "      送洗日：<input type='text' name='takein' size='8' value='$takein'>\n";
    echo "    </td>\n";
    echo "    <td align='center'>取件日：</td>\n";
    echo "    <td align='center'>\n";
    echo "      <input type='text' name='takeout' size='8' value='$takeout'>\n";
    echo "    </td>\n";
    echo "  </tr>\n";
    echo "  <tr>\n";
    echo "    <td align='center'>名稱</td>\n";
    echo "    <td align='center'>數量</td>\n";
    echo "    <td align='center'>單價</td>\n";
    echo "    <td align='center'>總價</td>\n";
    echo "    <td align='center'>備考</td>\n";
    echo "  </tr>\n";

    $query = 'SELECT * FROM data WHERE id = '.$id;
    $sd = mysql_query($query) or die("搜尋失敗" . mysql_error( ));
    list($number, $id, $d0, $d1, $d2, $d3, $d4, $d5, $d6, $d7) = mysql_fetch_row($sd);
    for($i = 0; $i < 8; $i ++)
    {
      $d = 'd'.$i;
      list($str1, $str2, $str3, $str4, $str5) = explode(';', $$d);
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
      echo "  <tr>\n";
      echo "    <td align='center'>\n";
      $vn = "f".$id."cloth".$i;
      echo "      <select name='$vn' onchange='changecloth(this.value, this.name)'>\n";
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
      echo "<input type='text' name='$piece' size='7' value='$str2' onblur='subcoco($id, $i);'>";
      echo "</td>\n";
      echo "    <td align='center'>";
      $one = "f".$id."one".$i;
      echo "<input type='text' name='$one' size='7' value='$str3' onblur='subcoco($id, $i);'>";
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

    echo "    <td align='center' colspan='4'>\n";
    $moneyn = "f".$id."money";
    echo "      總價：<input type='text' name='$moneyn' size='4' value='$money' onblur='ynf($id)';>\n";
    $ynn = "f".$id."yn";
    echo "      　已付：<input type='text' name='$ynn' value='$yn' size='4' onblur='ynf($id);'>\n";
    $t = $money - $yn;
    $list = "f".$id."list";
    echo "      　未繳：<input type='text' name='$list' value='$t' size='4'>";
    echo "    </td>\n";
    echo "    <td align='center' colspan='2'>\n      ";
    echo "     <input type='reset' value='重置'>　\n";
    echo "     <input type='submit' value='修改'>\n";
    echo "    </td>\n";
    echo "  </tr>\n";
    echo "</table>\n";
    echo "<input type='hidden' name='hidid' value='$id'>\n";
    echo "</form>";
    echo "<hr />\n";
    $n ++;
  }
}

?>
