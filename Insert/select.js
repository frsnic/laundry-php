var xmlHttp;

function showUser(str)
{
  xmlHttp=GetXmlHttpObject();
  if (xmlHttp==null)
  {
    alert ("Browser does not support HTTP Request");
    return;
  }
  var url="getuser.php";
  url=url+"?phone="+str;
  xmlHttp.onreadystatechange=stateChanged;
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
}
  
function stateChanged() 
{
  if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
  { 
    document.getElementById("name").value="xmlHttp.responseText" ;
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
