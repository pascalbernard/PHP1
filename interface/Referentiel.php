<?php


    require ("../php/classes/bd.php");
    require ("../php/DAO/DaoFiliere.php");
    

    $cnxBase = new bd();
    $conn = $cnxBase->connectionBase();

    
    //construction de la liste des filières
    //htmlListeDeroulanteFiliere($conn)  ;
    
    
    
    // met les filières dans une liste
    function tableauFiliere($conn)
    {
        $_filiere = new DaoFiliere();
        $tabFiliere = $_filiere->select($conn);
        return $tabFiliere;
    }

    /*-------------------------------------------
        construction de la liste des filières
        retourne la liste sous forme html
     -------------------------------------------*/
    function htmlListeDeroulanteFiliere($conn)
    {
        $liste="";
        $tab=array();
        
        $tab=tableauFiliere($conn);
        
        $chaine = "<SELECT name='nom' size='1'>";
        for ($i=0;$i<count($tab);$i++)
        {
            $chaine = $chaine.'<OPTION>'.$tab[$i];
        }
        $chaine=$chaine."</select>";
        return $chaine;
    }
    
    /*-------------------------------------------
        renvoi une connection de base de données
    -------------------------------------------*/
    function getbase()
    {
        $cnxBase = new bd();
        $conn = $cnxBase->connectionBase();
        return $conn;
        
    }
    
?>  