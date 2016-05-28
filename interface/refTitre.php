<?php
  
   include "..\\php\\classes\\referentiel.php";
 
  
  	function getbase()
    {
        $cnxBase = new bd();
        $conn = $cnxBase->connectionBase();
        return $conn;
        
    }
    
    
    
  
  
?>
