<?php
  
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
  }
  

?>
