<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Lang" content="en">
<meta name="author" content="">
<meta http-equiv="Reply-to" content="@.com">
<meta name="generator" content="PhpED 8.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="creation-date" content="09/06/2012">
<meta name="revisit-after" content="15 days">
<title>Référentiel</title>
<link rel="stylesheet" type="text/css" href="my.css">
</head>


<body>

<?php

    // détermine l'action à réaliser
    if(empty($_GET["crud"]))  $crud=""; else $crud= $_GET["crud"];
    
    // action : ajouter des informations en base de données    
    if ($crud=="ajouter")
        echo "<form method='POST' action='..\interface\crud.php?action=ajouter&formulaire=htmlreferentiel'>";
  ?>

  Nom : <input type="text" id="RefNom" name="RefNom"><br>
  Filiere : 
    <?php
    
        include "../interface/referentiel.php";
        $conn=getbase();
        // id=RefFiliere name=RefFiliere
        $chaine=htmlListeDeroulanteFiliere($conn);
        echo $chaine;
    ?>
  <br>
  Spécialité : <input type="text" id="RefSpecialite" name="RefSpecialite"><br>
  Date de l'arrêté : <input type="date" id="RefArrete" name="RefArrete"><br>
  Date de l'arrêt du référentiel : <input type="date" id="RefObsolette" name="RefObsolette"><br>
  Page internet du référentiel : <input type="text" id="RefMinisteriel" name="RefMinisteriel"><br>
  
   <?php
      
      if ($crud=="ajouter")
      {
        echo "<input type='submit' value='OK'>";
        echo "</form>";
      }
  ?>
</body>
</html>
