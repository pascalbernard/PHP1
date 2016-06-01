<?php



header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<list>";

$retour = (isset($_POST["IdEditor"])) ? htmlentities($_POST["IdEditor"]) : NULL;
$idEditor=substr($retour,0,1);

if ($idEditor) {
	mysql_connect("127.0.0.1", "root", "");
	mysql_select_db("scool");
	
	$req="SELECT * FROM chapitreref WHERE idRef=" . mysql_real_escape_string($idEditor);
	$query = mysql_query($req );
	while ($back = mysql_fetch_assoc($query)) {
		echo "<item id=\"" . $back["idRef"] . "\" name=\"" . $back["titre"] . "\" />";
	}
}

echo "</list>";

?>