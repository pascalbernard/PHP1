<?php
  
include_once ("../php/classes/bd.php");
 
   
class daoChapitreContenu
{
	
	
	
	public function selectChapitre(){
	
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();

		$tab=array();
        $i=0;
          
		$sql =  'SELECT * from chapitreref order by idRef';
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
      	
      	//for ($i=0;$i<count($tabValeurs);$i++)
      	//{

			$chaine=$chaine."titre = '".$tabValeurs["titre"]."' , ";
			$chaine=$chaine."numerotation = '".$tabValeurs["numerotation"]."' , ";
			$chaine=$chaine."detail = '".$tabValeurs["detail"]."' , ";

      	//}
      	$chaine=$chaine." where idRef=".$tabValeurs["idRef"];  
      	  

		if ($res = !$conn->query($chaine))
			echo "Echec de la modification : $chaine";

		
	}



	
	public function deleteChapitre($idRef){
		
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();
		
		$chaine="delete from chapitreref where idRef=".$idRef ;
		$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();	
		if ($res = !$conn->query($chaine))
			echo "Echec de la suppression : $chaine";


	}
	
	
	
	
}



?>
