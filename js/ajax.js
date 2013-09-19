// JavaScript Document
function getXmlHttpObject(){
	var xmlhttp;
	try	{
		xmlhttp=new ActiveXObject("Msxm12.XMLHTTP");
	}catch(e){
		try{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			try{
				xmlhttp=new XMLHttpRequest();
			}catch(e){
				xmlhttp=false;
				alert('error');
			}
		}	
	}	
	return xmlhttp;
}
var http;
var idControl;
function ajax(posi,codigo,archivo){
	idControl = document.getElementById(posi);
	http=getXmlHttpObject();
	http.open("POST",archivo);
	http.onreadystatechange=function() {
		if (http.readyState==4) {
			idControl.innerHTML = http.responseText
			idControl.style.display="block";
		}
	}
	http.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	http.send("cod="+codigo)
}