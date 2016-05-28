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
<title>Contenu du référentiel</title>
<link rel="stylesheet" type="text/css" href="my.css">
</head>
<body>
  
    <?php
    	include "../interface/referentiel.php";
      
    	$Refid="";
    	$contNum="";
    	$contTitre="";
    	$contDetail="";
    
	      // détermine l'action à réaliser
	    if(empty($_GET["crud"]))  $crud=""; else $crud= $_GET["crud"];
	    

	    // action : gérer des informations en base de données
	    //------------------------------------------------------    
	    if ($crud=="ajouter")
	        echo "<form method='POST' action='..\\interface\\crud.php?action=ajouter&formulaire=htmlreferentielcontenu'>";

	    if ($crud=="modifier")
	        echo "<form method='POST' action='..\\interface\\crud.php?action=modifier&formulaire=htmlreferentielcontenu'>";
	        
	    if ($crud=="supprimer")
    		echo "<form method='POST' action='..\\interface\\crud.php?action=supprimer&formulaire=htmlreferentielcontenu'>"; 
  
    
      	afficheChamps ($Refid,$contNum,$contTitre,$contDetail);

      	echo "<br>";				
		echo "<input type='submit' value='OK'>";        
		echo "</form>";
	
	
      	
      	
      	
	// fonction qui affiche les champs du formulaire et les données en cas de modification
	//------------------------------------------------------------------------------------
	function afficheChamps($Refid,$contNum,$contTitre,$contDetail)
	{
		
			// name et id :  ListeReferentiel
			$chaine=htmlListeDeroulanteReferentiel();
			echo $chaine."<br>";
		
			// liste des référentiels
		    echo "Numérotation : <input type='text'  id='contNum' name='contNum'>$contNum<br>\n";
			echo "Titre : <input type='text' id='$contTitre' name='$contTitre' value='$contTitre'><br>\n";
			echo "Détail :<br> <textarea rows='7' cols='80' id='$contDetail' name='$contDetail' value='$contDetail'></textarea>";
             
  
		
	}  
    ?>
  
  
  
</body>
</html>
