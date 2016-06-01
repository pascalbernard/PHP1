<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Techniques AJAX - XMLHttpRequest</title>
<script type="text/javascript" src="../javascript/oXHR.js"></script>
<script type="text/javascript">
<!-- 


// php est le script php appelé
function request(oSelect,php) {
	var value = oSelect.options[oSelect.selectedIndex].value;
	var xhr   = getXMLHttpRequest();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			readData(xhr.responseXML,"chapitreSel");
			document.getElementById("loader").style.display = "none";
		} else if (xhr.readyState < 4) {
			document.getElementById("loader").style.display = "inline";
		}
	};
	
	xhr.open("POST", php, true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("IdEditor=" + value);
}


// HtmlIdDestination est l'id de destination de la liste
function readData(oData,HtmlIdDestination) {
	var nodes   = oData.getElementsByTagName("item");
	
	var oSelect = document.getElementById(HtmlIdDestination);
	var oOption, oInner;
	
	oSelect.innerHTML = "";
	for (var i=0, c=nodes.length; i<c; i++) {
		oOption = document.createElement("option");
		oInner  = document.createTextNode(nodes[i].getAttribute("name"));
		oOption.value = nodes[i].getAttribute("id");
		
		oOption.appendChild(oInner);
		oSelect.appendChild(oOption);
	}
}
//-->
</script>
</head>

<body>
<fieldset>
	<legend>Programmes</legend>
	<div id="chapitreBox">
		<p id="chapitre">
			<select id="editorsSelect" onchange="request(this,'XMLHttpRequest_getListData.php');">
				<option value="none">Selection</option>
				<?php			
					include_once "../interface/referentiel.php";
				
					$chaine = AJAXhtmlListeDeroulanteReferentiel();
					echo $chaine;						
										
				?>			
			</select>
			<span id="loader" style="display: none;"><img src="../images/loader.gif" alt="loading" /></span>
		</p>
		<p id="softwares">
			<select id="chapitreSel"></select>
		</p>
	</div>
</fieldset>
</body>
</html>