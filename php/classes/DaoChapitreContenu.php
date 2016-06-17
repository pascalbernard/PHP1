<?php


/*
     _                 _____  _                    _  _                _____               _                      
    | |               / ____|| |                  (_)| |              / ____|             | |                     
  __| |  __ _   ___  | |     | |__    __ _  _ __   _ | |_  _ __  ___ | |      ___   _ __  | |_  ___  _ __   _   _ 
 / _` | / _` | / _ \ | |     | '_ \  / _` || '_ \ | || __|| '__|/ _ \| |     / _ \ | '_ \ | __|/ _ \| '_ \ | | | |
| (_| || (_| || (_) || |____ | | | || (_| || |_) || || |_ | |  |  __/| |____| (_) || | | || |_|  __/| | | || |_| |
 \__,_| \__,_| \___/  \_____||_| |_| \__,_|| .__/ |_| \__||_|   \___| \_____|\___/ |_| |_| \__|\___||_| |_| \__,_|
                                        | |                                                                    
*/



  
include_once ("../php/classes/bd.php");
 
   
class daoChapitreContenu
{
	/*
	  ______  ______  ______  ______  ______  ______  ______  ______  ______  ______  ______  ______  ______ 
	 |______||______||______||______||______||______||______||______||______||______||______||______||______|
	                                                                                                   

	*/
	
	public function selectChapitre($clauseWhere){
	
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();

		$tab=array();
        $i=0;
          
        $s_clauseWhere="";
        if ($clauseWhere!="")
        	$s_clauseWhere= " where ".$clauseWhere." ";  
          
          
		$sql =  'SELECT * from chapitreref '.$s_clauseWhere.' order by idRef,numerotation';
		foreach  ($conn->query($sql) as $row) {
			
			$tab[$i][0]= $row['idRef'];
			$tab[$i][1]= $row['numerotation'];
			$tab[$i][2]= $row['titre'];
			$tab[$i][3]= $row['detail'];
			
			$i++;                      
		}
		return $tab; 
		
		
	}
	
	
	
	public function insertChapitre($valeurs){
		
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();
		
		// transformation des caractères spéciaux pour le sql
		//$valeurs=str_replace("'","\'",$valeurs);

		// création de la requete
		$chaine = "insert into chapitreref (idref,numerotation,titre,detail) "; 
		$chaine = "$chaine values $valeurs";
		
		
		
		if ($res = !$conn->query($chaine))
			echo "Echec de l'insertion : $chaine";
				
		
		
	}

	
	public function updateChapitre($tabValeurs){
		
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();
		
		 // création de la requete
      	$chaine = "update chapitreref set "; 
      	
      		$tabValeurs["titre"]=str_replace("'","\'",$tabValeurs["titre"]);
      		
			$chaine=$chaine.'titre = "'.$tabValeurs["titre"].'" , ';
			$chaine=$chaine.'detail = "'.$tabValeurs["detail"].'"';

      	$chaine=$chaine." where idRef=".$tabValeurs["idRef"]." and numerotation='".$tabValeurs["numerotation"]."'";  

		if ($res = !$conn->query($chaine))
			echo "Echec de la modification : $chaine";

		
	}



	
	public function deleteChapitre($tabValeurs){
		
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();
		
		$chaine="delete from chapitreref where idRef=".$tabValeurs["idRef"]." and numerotation='".$tabValeurs["numerotation"]."'";
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();	
		if ($res = !$conn->query($chaine))
			echo "Echec de la suppression : $chaine";


	}
	
	 /*
	  ______  ______  ______  ______  ______  ______  ______  ______  ______  ______  ______  ______  ______ 
	 |______||______||______||______||______||______||______||______||______||______||______||______||______|
                                                                                                        
 
	 Contenu 	
			$tab[$i][0]= $row['idRef'];
			$tab[$i][1]= $row['numerotation'];
			$tab[$i][2]= $row['idCont'];
			$tab[$i][3]= $row['donnees'];
			$tab[$i][4]= $row['savoirs'];
			$tab[$i][5]= $row['limites'];
			$tab[$i][6]= $row['resultatsAttendus'];
			$tab[$i][7]= $row['CapComp'];
		
	*/
	public function insertContenu($valeurs)
	{
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();
		
		// transformation des caractères spéciaux pour le sql
		//$valeurs=str_replace("'","\'",$valeurs);

		// création de la requete
		//$valeurs = $conn->real_escape_string($valeurs);
		$chaine = "insert into contenuref (idref,numerotation,idCont,donnees,savoirs,limites,resultatsAttendus,CapComp,observations) "; 
		$chaine = "$chaine values $valeurs";
		
				
		if ($res = !$conn->query($chaine))
			echo "Echec de l'insertion : $chaine";
				
		}
	
	
	
	public function deleteContenu($tabValeurs)
	{

		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();
		
		$chaine="delete from contenuref where idRef=".$tabValeurs["idRef"]." and numerotation='".$tabValeurs["numerotation"]."' and idCont='".$tabValeurs["contId"]."' "; 
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();	
		if ($res = !$conn->query($chaine))
			echo "Echec de la suppression : $chaine";
		
		
	}
	
	public function updateContenu($tabValeurs)
	{

		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();
		
		 // création de la requete
      	$chaine = "update contenuref set "; 


      	/*$tabValeurs["donnees"]=str_replace("'","\'",$tabValeurs["donnees"]);
    	$tabValeurs["savoirs"]=str_replace("'","\'",$tabValeurs["savoirs"]);
      	$tabValeurs["limites"]=str_replace("'","\'",$tabValeurs["limites"]);
      	$tabValeurs["resultatsAttendus"]=str_replace("'","\'",$tabValeurs["resultatsAttendus"]);    
      	$tabValeurs["capComp"]=str_replace("'","\'",$tabValeurs["capComp"]);  
      	*/
      	

		$chaine=$chaine.'donnees = "'.$tabValeurs["donnees"].'" , ';
		$chaine=$chaine.'savoirs = "'.$tabValeurs["savoirs"].'" , ';
		$chaine=$chaine.'limites = "'.$tabValeurs["limites"].'" , ';
		$chaine=$chaine.'resultatsAttendus = "'.$tabValeurs["resultatsAttendus"].'" , ';
		$chaine=$chaine.'CapComp = "'.$tabValeurs["capComp"].'", ';
		$chaine=$chaine.'observations="'.$tabValeurs["observations"].'" ' ;
		
      	$chaine=$chaine." where idRef=".$tabValeurs["idRef"]." and numerotation='".$tabValeurs["numerotation"]."' and idCont='".$tabValeurs["contId"]."' ";  
     	$chaine = $conn->real_escape_string($chaine);
     	
		if ($res = !$conn->query($chaine))
			echo "Echec de la modification : $chaine";

		
		
	}
	
	
	
	public function selectContenu($clauseWhere)
	{
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();

		$tab=array();
        $i=0;
          
        $s_clauseWhere="";
        if ($clauseWhere!="")
        	$s_clauseWhere= " where ".$clauseWhere." ";  
          
          
		$sql =  'SELECT * from contenuref '.$s_clauseWhere.' order by idRef,numerotation,idCont ';
		
		foreach  ($conn->query($sql) as $row) {
			
			$tab[$i][0]= $row['idRef'];
			$tab[$i][1]= $row['numerotation'];
			$tab[$i][2]= $row['idCont'];
			$tab[$i][3]= $row['donnees'];
			$tab[$i][4]= $row['savoirs'];
			$tab[$i][5]= $row['limites'];
			$tab[$i][6]= $row['resultatsAttendus'];
			$tab[$i][7]= $row['CapComp'];
			$tab[$i][8]= $row['observations'];
						
			$i++;                      
		}
		return $tab; 
	}
	
}



?>
