var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject()

{

var xmlHttp;
		if(window.ActiveObject)
		{
			try
			{
			}
			catch(e)
			{
			xmlHttp = false;
			}
			
		}
		else
		{
			try
			{
			xmlHttp = new XMLHttpRequest();
			}
			
			catch(e)
			{
			xmlHttp = false;
			}
			
		
		}
		
		if(!xmlHttp) alert("Error of making XMLHttp");
		else return xmlHttp;
		
}



function process()

{
	if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
		{
		name = encodeURIComponent(document.getElementById("myName").value);
		xmlHttp.open("GET", "../start.php?name=" + name, true);
		xmlHttp.onreadystatechange = handleServerResponse;
		xmlHttp.send(null);
		}
		else setTimeout(1000);
		
}


function handleServerResponse()
{
		if(xmlHttp.readyState == 4)
		{
				if (xmlHttp.status == 200)
				{
				xmlResponse = xmlHttp.responseXML;
				xmlDocumentElement = xmlResponse.documentElement;
				helloMessage = xmlDocumentElement.firstChild.data;
				document.getElementById("Message").innerHTML = '<i>' + helloMessage + '</i>';
				setTimeout('process()', 1000);
				}
				
				else
				{
				alert("You can only read the problem:" + xmlHttp.statusText);
				}
		
		}

}



