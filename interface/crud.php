<?php
  
  
  	//$cnxBase = new bd();
    //$conn = $cnxBase->connectionBase();

  
  
  include_once "..\\php\\classes\\referentiel.php";
  include_once "..\\php\\classes\\referentielChapitre.php";
  include_once "..\\php\\classes\\ReferentielContenu.php";
  
  
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
		        
		        
		      case ("htmlreferentielChapitre")  :
		      
		      	$chapitre = new ReferentielChapitre();
		      	$chapitre->setIdRef($_POST["contRef"]);
		      	$chapitre->setchapNumerotation($_POST["contNum"]);
		      	$chapitre->setchapTitre($_POST["contTitre"]);
		      	$chapitre->setchapDetail($_POST["contDetail"]);
		      	
		      
		      	if ($action=="ajouter") $chapitre->Ajouter();
		      	if ($action=="modifier") $chapitre->Modifier();
		      	if ($action=="supprimer") $chapitre->Supprimer();
		      

		      break;
		      
		      case ("htmlreferentielContenu")  :
		      
		      	$contenu = new ReferentielContenu();
				$contenu->setIdRef($_POST["contRef"]);
				$contenu->setchapNumerotation($_POST["contNum"]);
				$contenu->setcontNumerotation($_POST["idCont"]);
				$contenu->setDonnees($_POST["donnees"]);
				$contenu->setsavoirs($_POST["savoirs"]);
				$contenu->setlimites($_POST["limites"]);
				$contenu->setResultatsAttendus($_POST["resultatsAttendus"]);
				$contenu->setCapComp($_POST["CapComp"]);
				$contenu->setObservations($_POST["observations"]);
		      	
		      
		      	if ($action=="ajouter") $contenu->ajouter();
		      	if ($action=="modifier") $contenu->modifier();
		      	if ($action=="supprimer") $contenu->supprimer();
		      	
		      	
		      break;
		      
			
			
		  }
		  
  
  	  //break;
  	  
  	  
  	 
  }
  
  
?>
