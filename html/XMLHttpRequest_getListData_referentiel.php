<?php


include_once "..\\php\\classes\\referentielChapitre.php";
include_once "..\\php\\classes\\referentielContenu.php";

header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";

$retour = (isset($_POST["IdEditor"])) ? htmlentities($_POST["IdEditor"]) : NULL;
$formulaireAppelant = (isset($_POST["htmlAppelant"])) ? htmlentities($_POST["htmlAppelant"]) : NULL;



if ($formulaireAppelant=="htmlReferentielChapitre")
{
	// extraction de la première valeur de la chaine transmise -> id à rechercher
	$tab=split("-",$retour);
	$idEditor=$tab[0];

	if ($idEditor) {
		$req = new ReferentielChapitre();
		$back = $req->Selectionner("idRef=".$idEditor);
		
		for ($i=0;$i<count($back);$i++)
			echo "<item id=\"" . $back[$i][0] . "\" name=\"" . $back[$i][1] ." - ".$back[$i][2]. "\" />";	
		
	}

	echo "</list>";
}

if ($formulaireAppelant=="htmlReferentielChapitreBIS")
{
	// extraction de la première valeur de la chaine transmise -> id à rechercher
	$tab=split("-",$retour);
	$idEditor=$tab[0];

	if ($idEditor) {
		$req = new ReferentielContenu();
		$back = $req->Selectionner("idRef=".$idEditor);
		
		for ($i=0;$i<count($back);$i++)
			echo "<item id=\"" . $back[$i][0] . "\" name=\"" . $back[$i][1] ." - ".$back[$i][2]. "\" />";	
		
	}

	echo "</list>";

}

?>