<?php


include_once "..\\php\\classes\\referentielChapitre.php";

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
		/*mysql_connect("127.0.0.1", "root", "");
		mysql_select_db("scool");
		*/
		$req = new ReferentielChapitre();
		$back = $req->Selectionner();
		
		
		
		/*$req="SELECT * FROM chapitreref WHERE idRef=" . mysql_real_escape_string($idEditor);
		$query = mysql_query($req );
		while ($back = mysql_fetch_assoc($query)) {
			echo "<item id=\"" . $back["idRef"] . "\" name=\"" . $back["titre"] . "\" />";
		}*/
		
		for ($i=0;$i<count($back);$i++)
			echo "<item id=\"" . $back[$i][0] . "\" name=\"" . $back[$i][1] ." - ".$back[$i][2]. "\" />";	
		
	}

	echo "</list>";
}
?>