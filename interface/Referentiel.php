<?php


    require ("../php/classes/bd.php");
    require ("../php/DAO/DaoFiliere.php");
    

    $cnxBase = new bd();
    $conn = $cnxBase->connectionBase();

    
    
    
    // met les filières dans une liste
    function tableauFiliere()
    {
        $_filiere = new DaoFiliere();
        $tabFiliere = $_filiere->select($conn);
        return $tabFiliere;
    }

    
    
?>  