<?php
  
  class Referentiel 
  {
         private    $i_IdRef;
         private    $s_Nom;
         private    $s_Filiere;
         private    $s_Specialite;
         private    $d_Arrete;
         private    $d_Obsolette;
         private    $s_RefMinisteriel;
      

      
      // getter / setter
      
      public function getNom()
      {
          return $this->s_Nom;
      }
      public function setNom($var)
      {
          $this->s_Nom=$var;
      }                  
      
       public function getFiliere()
      {
          return $this->s_Filiere;
      }
      public function setFiliere($var)
      {
          $this->s_Filiere=$var;
      }                  
     
       public function getSpecialite()
      {
          return $this->s_Specialite;
      }
      public function setSpecialite($var)
      {
          $this->s_Specialite=$var;
      }                  
     
       public function getObsolette()
      {
          return $this->d_Obsolette;
      }
      public function setObsolette($var)
      {
          $this->d_Obsolette=$var;
      }                  
     
      public function getArrete()
      {
          return $this->d_Arrete;
      }
      public function setArrete($var)
      {
          $this->d_Arrete=$var;
      }                  
     
      public function getRefMinisteriel()
      {
          return $this->s_RefMinisteriel;
      }
      public function setRefMinisteriel($var)
      {
          $this->s_RefMinisteriel=$var;
      }                  
     
     
     
     
      // constuire l'objet
      //private function __construct() {}
      
      // ajouter un référentiel
      public function Ajouter(){}
      
      // modifier un référentiel
      public function Modifier($ii_IdRef){}
      
      // supprimer un référentiel
      public function Supprimer($ii_IdRef){} 
      
      // lire un référentiel
      public function Lire ($ii_IdRef) {}
      
      // création de la table
      // CREATE TABLE `scool`. ( `idRef` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(50) NOT NULL , `filiere` VARCHAR(10) NOT NULL , `specialite` VARCHAR(60) NOT NULL , `dateArrete` DATE NOT NULL , `dateObsolette` DATE NOT NULL , `refMinisteriel` VARCHAR(100) NOT NULL , PRIMARY KEY (`idRef`)) ENGINE = MyISAM; 
  }
      
  
  
?>


