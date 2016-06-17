<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chapitres</title>
<script type="text/javascript" src="../javascript/oXHR.js"></script>
<script src="../extra/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="../extra/tinymce/js/tinymce/jquery.tinymce.min.js"></script>

<script type="text/javascript">
	
	// code dans plugin pour ajouter la vue code de tinymce
	
	tinymce.init({
	    selector: 'textarea#contDetail',
	    theme: 'modern',
		width: 800,
		height: 300,
		plugins: [
		  'advlist autolink link image lists charmap   hr anchor pagebreak  ',
		  'searchreplace wordcount visualblocks visualchars  fullscreen insertdatetime  ',
		  ' table contextmenu directionality emoticons template paste textcolor'
		],
		
		toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  | print preview media fullpage | forecolor backcolor emoticons'
  });
  </script>


<script type="text/javascript">
<!-- 		

// php est le script php appelé
// formulaire est le formulaire qui appelle le script
// destination est la zone du formulaire qui sera modifiée
// typeAffichage est la fonction d'affichage AJAX appelée : 

function request(oSelect,php,formulaire,destination,typeAffichage) {

	var value ; 
	var xhr   ;
	
	try {
		//on cache le cadre
		cadre=document.getElementById("cadreDesc");
		cadre.style.visibility="visible";
		
		value = oSelect.options[oSelect.selectedIndex].value;
		xhr = getXMLHttpRequest();
		
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				
				// affichage sous forme de liste
				if(typeAffichage=="Liste")
				{
					readDataListe(xhr.responseXML,destination,value);
					request(document.getElementById("chapitreSel"),'XMLHttpRequest_getListData_referentielChapitre.php','htmlReferentielChapitre','detail','Champ');
				}
				
				// affichage sous forme de liste
				if(typeAffichage=="Champ")
				{
					readDataChamp(xhr.responseText,destination,value);
					//request(document.getElementById("chapitreSel"),'XMLHttpRequest_getListData_referentielChapitre.php','htmlReferentielChapitre','detail','Champ');
					//traiteErreur();
				}
				
				
				document.getElementById("loader").style.display = "none";
			} else if (xhr.readyState < 4) {
				document.getElementById("loader").style.display = "inline";
			}
		
		}
		
		var ld1=document.getElementById("editorsSelect").value;
		xhr.open("POST", php, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("IdEditor=" + value+"&LD1="+ld1+"&htmlAppelant="+formulaire);
	}
	catch(e) {traiteErreur();}
}



// HtmlIdDestination est l'id de destination de la liste
function readDataListe(oData,HtmlIdDestination,choixListe) {

	var nodes   = oData.getElementsByTagName("item");
	var oSelect = document.getElementById(HtmlIdDestination);
	var oOption, oInner;
	
	// on affiche le cadre si pas d'erreur
	cadre=document.getElementById("cadreDesc");
	cadre.style.visibility="visible";
	// réactive le boutton
	var button=document.getElementById("bouton");
	button.disabled=false;
	
	
	oSelect.innerHTML = "";
	for (var i=0, c=nodes.length; i<c; i++) {
		oOption = document.createElement("option");
		oInner  = document.createTextNode(nodes[i].getAttribute("name"));
		oOption.value = nodes[i].getAttribute("name");

		oOption.appendChild(oInner);
		oSelect.appendChild(oOption);
	}
	
	if (document.getElementById("bouton").value=="AJOUTER")
	{
		var contnum 	= document.getElementById("contNum");
		contnum.readOnly=false;
	}
}

// HtmlIdDestination est l'id de destination de la liste
function readDataChamp(oData,HtmlIdDestination,choixListe) {
	
	// récupère la chaine des données;
	var placeChaine,sousChaine;
	var tableau;
	
	// choix liste
	tchoix=choixListe.split("-");
		
	// traite la chaine en retour
	placeChaine=oData.indexOf("<data>");
	sousChaine=oData.substring(placeChaine+6);
	placeChaine=sousChaine.indexOf("<data>")
	sousChaine=sousChaine.substring(0,sousChaine.length-7);
	
	tableau=sousChaine.split("|");
	
	//alert(sousChaine);

	var contRef		= document.getElementById("contRef");
	var contnum 	= document.getElementById("contNum");
	var contTitre 	= document.getElementById("contTitre");
	                   
	//récupération des valeurs de la listes
	contRef.value = tchoix[0];
	contnum.value = tchoix[1];
	
	contTitre.value = tableau[2];
	contDetail = tableau[3];
	tinyMCE.activeEditor.setContent(contDetail);
	

}


// raz des champs en cas d'absence de la sélection dans la base ou une erreur quelconque
function traiteErreur()
{
	
	if (document.getElementById("bouton").value=="AJOUTER")
	{
		var editor		= document.getElementById("editorsSelect");
		var contRef		= document.getElementById("contRef");
		var contnum 	= document.getElementById("contNum");
		var contTitre 	= document.getElementById("contTitre");
		
		
		treferentiel=editor.value.split("-");
		contRef.value=treferentiel[0];
		contnum.readOnly=false;
		contnum.value="";
		contTitre.value="";
		tinyMCE.activeEditor.setContent("");
		
	}
	if (document.getElementById("bouton").value=="MODIFIER")
	{
	
		var contRef		= document.getElementById("contRef");
		var contnum 	= document.getElementById("contNum");
		var contTitre 	= document.getElementById("contTitre");
		
		contnum.value="";
		contTitre.value="";
		tinyMCE.activeEditor.setContent("");
		
		// on affiche le cadre si pas d'erreur
		var cadre=document.getElementById("cadreDesc");
		cadre.style.visibility="hidden";
		var button=document.getElementById("bouton");
		button.disabled=true;
		
	}
}

// fonction d'initialisation
function init()
{
	if (document.getElementById("bouton".value!="AJOUTER"))
	{
		// on affiche le cadre si pas d'erreur
		var cadre=document.getElementById("cadreDesc");
		cadre.style.visibility="hidden";
		// grise le bouton
		var button=document.getElementById("bouton");
		button.disabled=true;
		


	}
	
}

//-->
</script>
</head>

<body onload="init()">

<fieldset>
	<legend>Reférentiel</legend>
	<div id="chapitreBox">
		<p id="chapitre">
			<select id="editorsSelect"  onchange="request(this,'XMLHttpRequest_getListData_referentiel.php','htmlReferentielChapitre','chapitreSel','Liste');">
				<option value="none">Selection</option>
				<?php			
					include_once "../interface/referentiel.php";
					$chaine = AJAXhtmlListeDeroulanteReferentiel();
					echo $chaine;						
										
				?>			
			</select>
			<span id="loader" style="display: none;"><img src="../images/loader.gif" alt="loading" /></span>
		</p>
		<p id="entChapitre">
			<select id="chapitreSel" onchange="request(this,'XMLHttpRequest_getListData_referentielChapitre.php','htmlReferentielChapitre','detail','Champ');">
			<option value="none">Selection</option>
			</select>
		</p>
	</div>
</fieldset>

<?php
	include_once "../interface/referentiel.php";

		
    // détermine l'action à réaliser
    if(empty($_GET["crud"]))  $crud=""; else $crud= $_GET["crud"];
    
	
 	if ($crud=="ajouter"){
        echo "<form method='POST' action='..\\interface\\crud.php?action=ajouter&formulaire=htmlreferentielContenu'>";

	}
    if ($crud=="modifier"){
        echo "<form method='POST' action='..\\interface\\crud.php?action=modifier&formulaire=htmlreferentielContenu'>";

	}        
    if ($crud=="supprimer"){
    	echo "<form method='POST' action='..\\interface\\crud.php?action=supprimer&formulaire=htmlreferentielContenu'>"; 

	}
 ?>
<div id="cadreDesc">
<fieldset>
	<legend>Description</legend>
	<div id="descriptionBox">
		<p id="description">	
			<span id="loader" style="display: none;"><img src="../images/loader.gif" alt="loading" /></span>
		</p>
	<div id="detChapitre">
		<p id="detail">
		Référentiel : <input type='text' id='contRef' name='contRef' readonly='true' value='' /><br />
		Numérotation : <input type="text"  id='contNum' name='contNum' readonly='true' value=''/><br>
		Titre : <input type='text' id='contTitre' name='contTitre' value=''/><br>
		Détail :<br> <textarea rows='7' cols='80' id='contDetail' name='contDetail' value=''></textarea>
		</p>
	</div>
	
</fieldset>
</div> 
<?php
	
	
		echo "<input type='submit' id='bouton' value='".strtoupper($crud)."'>";        
		echo "</form>";

	
	
	
?>

</body>
</html>