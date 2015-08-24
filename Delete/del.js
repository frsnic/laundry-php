var xmlHttp;

function deljs(str)
{
  xmlHttp=GetXmlHttpObject();
  if (xmlHttp==null)
  {
    alert ("Browser does not support HTTP Request");
    return;
  }
  var url="del.php";
  url=url+"?id="+str;
  url=url+"&sid="+Math.random();
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
