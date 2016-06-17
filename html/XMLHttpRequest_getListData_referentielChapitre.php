<?php


include_once "..\\php\\classes\\referentielChapitre.php";

header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";

$retour = (isset($_POST["IdEditor"])) ? htmlentities($_POST["IdEditor"]) : NULL;
$ld1=(isset($_POST["LD1"])) ? htmlentities($_POST["LD1"]) : NULL;
$formulaireAppelant = (isset($_POST["htmlAppelant"])) ? htmlentities($_POST["htmlAppelant"]) : NULL;



if ($formulaireAppelant=="htmlReferentielChapitre")
{
	// extraction de la première valeur de la chaine transmise -> id à rechercher
	$tab=split("-",$retour);
	$idEditor=$tab[0];
	$tab=split("-",$ld1);
	$idld1=$tab[0];

	if ($idEditor) {
		$req = new ReferentielChapitre();
		$back = $req->Selectionner("idRef = ".$idld1." and numerotation='".$idEditor."'");
		
			/*echo '<input type="text" id="contNum" name="contNum" value="'.$back[0][1].'"></input>';
			echo '<input type="text" id="contTitre" name="contTitre" value="'.$back[0][2].'"></input>';
			echo '<input type="text" id="contDetail" name="contDetail" value="'.$back[0][3].'"></input>';
			*/
			echo "<data>".$back[0][0]."|".$back[0][1]."|".$back[0][2]."|".$back[0][3]."</data>";
			//echo $chaine;	
			/*echo "Numérotation : <input type='text'  id='contNum' name='contNum' value='$contNum'><br>\n";
			echo "Titre : <input type='text' id='contTitre' name='contTitre' value='$contTitre'><br>\n";
			echo "Détail :<br> <textarea rows='7' cols='80' id='contDetail' name='contDetail' value='$contDetail'></textarea>";*/
             
	}


	//echo "</list>";
}





?>