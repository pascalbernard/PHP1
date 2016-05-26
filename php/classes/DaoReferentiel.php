<?php


 include_once ("../php/classes/bd.php");

    
class DaoReferentiel
{
  

      // requete select de la table filiere
      function select($conn)    
      {
      	$tab=array();
        $i=0;
          
		$sql =  'SELECT * from referentiel order by idRef';
		foreach  ($conn->query($sql) as $row) {
			
			$tab[$i][0]= $row['idRef'];
			$tab[$i][1]= $row['nom'];
			$tab[$i][2]= $row['filiere'];
			$tab[$i][3]= $row['specialite'];
			$tab[$i][4]= $row['dateArrete'];
			$tab[$i][5]= $row['dateObsolette'];                                               
			$tab[$i][6]= $row['refMinisteriel']; 
			
			$i++;                      
		}
		return $tab;    
	  }
      
      
      // requete d'insertion en base de données
      function insert($conn,$valeurs)
      {
		  $cnxBase = new bd();
		  $conn = $cnxBase->connectionBase();

		  // création de la requete
      	  $chaine = "insert into referentiel (nom,filiere,specialite,dateArrete, dateObsolette,refMinisteriel) "; 
      	  $chaine = "$chaine values $valeurs";
  
	      if ($res = !$conn->query($chaine))
	      	echo "Echec de l'insertion : $chaine";
        
          //echo "$chaine";
      }
      
      // requete de modification en base de données
      function update($tabValeurs)
      {
	  	$cnxBase = new bd();
		$conn = $cnxBase->connectionBase();	 
		
		 
		 // création de la requete
      	$chaine = "update referentiel set "; 
      	
      	//for ($i=0;$i<count($tabValeurs);$i++)
      	//{
			$chaine=$chaine."nom = '".$tabValeurs["nom"]."' , ";
			$chaine=$chaine."filiere = '".$tabValeurs["filiere"]."' , ";
			$chaine=$chaine."specialite = '".$tabValeurs["specialite"]."' , ";
			$chaine=$chaine."dateArrete = '".$tabValeurs["dateArrete"]."' , ";
			$chaine=$chaine."dateObsolette = '".$tabValeurs["dateObsolette"]."' , ";
			$chaine=$chaine."refMinisteriel = '".$tabValeurs["refMinisteriel"]."' "; 
      	//}
      	$chaine=$chaine." where idRef=".$tabValeurs["idRef"];  
      	  

		if ($res = !$conn->query($chaine))
			echo "Echec de la modification : $chaine";


      }
      
  }
  

?>
