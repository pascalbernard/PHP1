<?php


include_once "..\\php\\classes\\referentielContenu.php";

header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";

$retour = (isset($_POST["IdEditor"])) ? htmlentities($_POST["IdEditor"]) : NULL;
$ld1 = (isset($_POST["LD1"])) ? htmlentities($_POST["LD1"]) : NULL;
$formulaireAppelant = (isset($_POST["htmlAppelant"])) ? htmlentities($_POST["htmlAppelant"]) : NULL;



if ($formulaireAppelant=="htmlReferentielContenu")
{
	// extraction de la première valeur de la chaine transmise -> id à rechercher
	$tab=split("-",$retour);
	$idEditor=$tab[0];
	$tab=split("-",$ld1);
	$idld1=$tab[0];

	if ($idEditor) {
		$req = new ReferentielContenu();
		$back = $req->Selectionner("idRef = ".$idld1." and numerotation='".$idEditor."'");
		
			echo "<data>".$back[0][0]."|".$back[0][1]."|".$back[0][2]."|".$back[0][3]."|".$back[0][4]."|".$back[0][5]."|".$back[0][6]."|".$back[0][7]."|".$back[0][8]."</data>";
             
	}


	//echo "</list>";
}




?>