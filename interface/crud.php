<?php
  
  
  	//$cnxBase = new bd();
    //$conn = $cnxBase->connectionBase();

  
  
  include_once "..\\php\\classes\\referentiel.php";
  include_once "..\\php\\classes\\referentielChapitre.php";
  
  
  $action=$_GET["action"];
  $formulaire=$_GET["formulaire"];
  
  
  switch ($action)
  {
  	  //----------------------------------------ajouter------------------------
  	  case (("ajouter") || ("modifier") ):
  	  
		  switch ($formulaire) 
		  {
		      case ("htmlreferentiel") :
		      
		        $referentiel = new Referentiel();
		        $referentiel->setIdRef($_POST["RefId"]);
		        $referentiel->setObsolette($_POST["RefObsolette"]) ;
		        $referentiel->setFiliere($_POST["RefFiliere"]) ;
		        $referentiel->setNom($_POST["RefNom"]) ;
		        $referentiel->setRefMinisteriel($_POST["RefMinisteriel"]);
		        $referentiel->setSpecialite($_POST["RefSpecialite"]);
		        $referentiel->setArrete($_POST["RefArrete"]);

		                               
      			// ajouter
		        if ($action=="ajouter") $referentiel->Ajouter();
      			
      			// modifier
      			if ($action=="modifier") $referentiel->Modifier();
      			
      			// supprimer
      			if ($action=="supprimer") $referentiel->Supprimer();
      			
      			
		        break;
		        
		        
		      case ("htmlreferentielcontenu")  :
		      
		      	$chapitre = new ReferentielChapitre();
		      	$chapitre->setIdRef($_POST["Refid"]);
		      	$chapitre->setchapNumerotation($_POST["contNum"]);
		      	$chapitre->setchapTitre($_POST["contTitre"]);
		      	$chapitre->setchapDetail($_POST["contDetail"]);
		      
		      	if ($action=="ajouter") $chapitre->Ajouter();
		      	if ($action=="modifier") $chapitre->Modifier();
		      	if ($action=="supprimer") $chapitre->Supprimer();
		      
		      
		      
		      
		      break;
		  }
		  
  
  	  //break;
  	  
  	  
  	 
  }
  
  
?>
