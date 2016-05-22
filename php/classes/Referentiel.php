<?php
  
  class Referentiel 
  {
         private    $i_IdRef;
         public     $s_Nom;
         public     $s_Filiere;
         public     $s_Specialite;
         public     $d_Arrete;
         public     $d_Obsollette;
         public     $s_RefMinisteriel;
      
      
      // constuire l'objet
      public function __construct() {}
      
      // ajouter un référentiel
      public function Ajouter(){}
      
      // modifier un référentiel
      public function Modifier($ii_IdRef){}
      
      // supprimer un référentiel
      public function Supprimer($ii_IdRef){} 
      
      // lire un référentiel
      public function Lire ($ii_IdRef) {}
      
      
  }
      
  
  
?>
