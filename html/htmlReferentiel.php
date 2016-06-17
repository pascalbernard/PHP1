<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Lang" content="en">
<meta name="author" content="">
<meta http-equiv="Reply-to" content="@.com">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="creation-date" content="09/06/2012">
<meta name="revisit-after" content="15 days">
<title>Référentiel</title>
<link rel="stylesheet" type="text/css" href="my.css">

<script>
	function afficheLigne(source)
	{
		//var ligne = document.getElementById("tableau").rows[source];//on copie la ligne	
		var arrayLignes = document.getElementById("tableau").rows[source];
		var cellules = arrayLignes.cells;
		document.getElementById("RefId").value=cellules[0].innerHTML;
		document.getElementById("RefNom").value=cellules[1].innerHTML;
		document.getElementById("RefFiliere").value=cellules[2].innerHTML;
		document.getElementById("RefSpecialite").value=cellules[3].innerHTML;
		document.getElementById("RefArrete").value=cellules[4].innerHTML;
		document.getElementById("RefObsolette").value=cellules[5].innerHTML;
		document.getElementById("RefMinisteriel").value=cellules[6].innerHTML;
	}

</script>

</head>


<body>

<?php


	include "../interface/referentiel.php";
	
	//raz données
	$RefId="";
	$RefNom="";
	$RefSpecialite="";
	$RefArrete="";
	$RefObsolette="";
	$RefMinisteriel="";
	
	
	
    // détermine l'action à réaliser
    if(empty($_GET["crud"]))  $crud=""; else $crud= $_GET["crud"];
    

    // action : gérer des informations en base de données
    //------------------------------------------------------    
    if ($crud=="ajouter")
        echo "<form method='POST' action='..\\interface\\crud.php?action=ajouter&formulaire=htmlreferentiel'>";

    if ($crud=="modifier")
        echo "<form method='POST' action='..\\interface\\crud.php?action=modifier&formulaire=htmlreferentiel'>";
        
    if ($crud=="supprimer")
    	echo "<form method='POST' action='..\\interface\\crud.php?action=supprimer&formulaire=htmlreferentiel'>"; 
  
  
  
  	// affichage de la liste des données avant la saisie
  	if (($crud=="modifier") || ($crud=="supprimer"))
	{
		$chaine=htmlListeReferentiel("idRef","ASC");
		echo $chaine;
			
	}
	?>
	<br>
	<br>
	<?php
    // affichage de l'action
    echo (strtoUpper($crud)."<br>");
    
    // affichage des champs
    afficheChamps($RefId,$RefNom,$RefSpecialite,$RefArrete,$RefObsolette="",$RefMinisteriel);
  
    // affichage du bouton de validation
	//if (($crud=="ajouter") || ($crud=="modifier") || ($crud=="supprimer"))
	{				
		echo "<input type='submit' value='".strtoupper($crud)."'>";        
		echo "</form>";
	}
	
	
	
	// fonction qui affiche les champs du formulaire et les données en cas de modification
	//------------------------------------------------------------------------------------
	function afficheChamps($RefId,$RefNom,$RefSpecialite,$RefArrete,$RefObsolette="",$RefMinisteriel)
	{
		    echo "<input type='text' hidden  id='RefId' name='RefId'>$RefId<br>\n";
			echo "Nom : <input type='text' id='RefNom' name='RefNom' value='$RefNom'><br>
  		  	Filiere : "; 
                 
			//$conn=getbase();
			// id=RefFiliere name=RefFiliere
			$chaine=htmlListeDeroulanteFiliere();
			
			echo $chaine;
			
			echo 
			"
			<br>

			Spécialité : <input type='text' id='RefSpecialite' name='RefSpecialite' value='$RefSpecialite'><br>
			Date de l'arrêté : <input type='date' id='RefArrete' name='RefArrete' value='$RefArrete'><br>
			Date de l'arrêt du référentiel : <input type='date' id='RefObsolette' name='RefObsolette' value='$RefObsolette'><br>
			Page internet du référentiel : <input type='url' id='RefMinisteriel' name='RefMinisteriel' value='$RefMinisteriel'><br>  
			";	
		
		
	}
	
	
  ?>
  
  
</body>
</html>
