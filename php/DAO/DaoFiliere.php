<?php


 include ("../php/classes/bd.php");

    
  class DaoFiliere 
  {
  
      
      
      // requete select de la table filiere
      function select($conn)    
      {
          $tab=array();
          $i=0;
          
          $sql =  'SELECT * from filiere';
          foreach  ($conn->query($sql) as $row) {;
            $tab[$i++]= $row['filiereNom'];
          }
          return $tab;
      }
      
      
      // requete d'insertion en base de données
      function insert($conn,$tabValeur)
      {
		  $cnxBase = new bd();
		  $conn = $cnxBase->connectionBase();

		  for ($i=0;$i<count($tabValeur);$i++)    
		  {


		  }
        
          
      }
  }
  

?>
