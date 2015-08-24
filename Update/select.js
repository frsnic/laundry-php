var xmlHttp;
var aid;

function showphone(str, id)
{
  xmlHttp=GetXmlHttpObject();
  if (xmlHttp==null)
  {
    alert ("Browser does not support HTTP Request");
    return;
  }
  aid = id;
  var url="getuser.php";
  url=url+"?number="+str;
  xmlHttp.onreadystatechange=stateChanged;
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
}
  
function stateChanged() 
{
  if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
  {
    aid = "phone" + aid;
    document.getElementsByName(aid)[0].value=xmlHttp.responseText ;
  } 
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
