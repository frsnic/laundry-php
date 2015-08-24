var xmlHttp;

function uptable(takein, takeout, money, yn, id)
{
  xmlHttp=GetXmlHttpObject();
  if (xmlHttp==null)
  {
    alert ("Browser does not support HTTP Request");
    return;
  }
  var url="up.php";
  url=url+"?id="+id;
  url=url+"&takein="+takein;
  url=url+"&takeout="+takeout;
  url=url+"&yn="+yn;
  url=url+"&money="+money;
  url=url+"&t=0";
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
}

function updata(id, data1, data2, data3, data4, data5, data6, data7, data8)
{
  xmlHttp=GetXmlHttpObject();
  if (xmlHttp==null)
  {
    alert ("Browser does not support HTTP Request");
    return;
  }
  var url="up.php";
  url=url+"?id="+id;
  url=url+"&data1="+data1;
  url=url+"&data2="+data2;
  url=url+"&data3="+data3;
  url=url+"&data4="+data4;
  url=url+"&data5="+data5;
  url=url+"&data6="+data6;
  url=url+"&data7="+data7;
  url=url+"&data8="+data8;
  url=url+"&t=1";
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
}

function GetXmlHttpObject()
{
  var xmlHttp=null;

  try
  {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
  }
  catch (e)
  {
    //Internet Explorer
    try
    {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e)
    {
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  return xmlHttp;
}
