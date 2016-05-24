<?php
  
  
  	//$cnxBase = new bd();
    //$conn = $cnxBase->connectionBase();

  
  
  include "..\\php\\classes\\referentiel.php";
  
  
  $action=$_GET["action"];
  $formulaire=$_GET["formulaire"];
  
  switch ($formulaire) 
  {
      case ("htmlreferentiel") :
      
        $referentiel = new Referentiel();
        $referentiel->setObsolette($_POST["RefObsolette"]) ;
        $referentiel->setFiliere($_POST["RefFiliere"]) ;
        $referentiel->setNom($_POST["RefNom"]) ;
        $referentiel->setRefMinisteriel($_POST["RefMinisteriel"]);
        $referentiel->setSpecialite($_POST["RefSpecialite"]);
        $referentiel->setArrete($_POST["RefArrete"]);

        break;                        
      	
      	// sauvegarde
        $referentiel->Ajouter();
      	
      
  }
  
  
  
  
?>
