<?php



 include_once ("../php/classes/DaoFiliere.php");
 include_once ("../php/classes/Referentiel.php");
    

    $cnxBase = new bd();
    $conn = $cnxBase->connectionBase();

     
    
    /*-------------------------------------------
        renvoi une connection de base de données
    -------------------------------------------*/
    function getbase()
    {
        $cnxBase = new bd();
        $conn = $cnxBase->connectionBase();
        return $conn;
        
    }

    
    // met les filières dans un tableau  []
    function tableauFiliere($conn)
    {
        $_filiere = new DaoFiliere();
        $tabFiliere = $_filiere->select($conn);
        return $tabFiliere;
    }
    
    // met les referentiel dans un tableau [][]
    function tableauReferentiel($conn)
    {
		$_refentiel=new DaoReferentiel();
		$tabReferentiel = $_refentiel->select($conn);
		return $tabReferentiel;
		
    }

    /*-------------------------------------------
        construction de la liste des filières
        retourne la liste sous forme html
     -------------------------------------------*/
    function htmlListeDeroulanteFiliere()
    {
        
        $tab=array();
        
        
        $conn=getbase();
        
        $tab=tableauFiliere($conn);
        
        $chaine = "<SELECT name='RefFiliere' id='RefFiliere' size='1'>";
        for ($i=0;$i<count($tab);$i++)
        {
            $chaine = $chaine.'<OPTION>'.$tab[$i];
        }
        $chaine=$chaine."</select>";
        return $chaine;
    }
    
    // affiche le tableau des éléments du référentiel
    //-----------------------------------------------
    function htmlListeReferentiel($champTri,$ascDesc)
    {
		$tab=array();		
		$conn=getbase();
		
		$tab=tableauReferentiel($conn);
		                                      
		$chaine="<table id='tableau'>"  ;
		$chaine=$chaine."<tr><td>Id</td><td>Nom</td><td>Filière</td><td>Spécialité</td><td>Date arrêté</td><td>Date arrêt</td><td>Lien ministériel</td></tr>\n" ;
		for ($i=0;$i<count($tab);$i++)
		{
			$chaine=$chaine."<tr id='".$tab[$i][0]."'>";
			for ($j=0;$j<count($tab[0]);$j++)
				$chaine=$chaine."<td onclick='afficheLigne(this.parentNode.rowIndex);'>".$tab[$i][$j]."</td>";
			
			$chaine=$chaine."</tr>\n";
			
		}
		$chaine=$chaine."</table>\n";
		return $chaine;
    }
    
?>  