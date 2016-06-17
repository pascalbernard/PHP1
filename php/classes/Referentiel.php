<?php
  

 include_once ("bd.php");
 include_once ("DaoFiliere.php");
 include_once ("DaoReferentiel.php");
  
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
      public function getIdRef()
      {
          return $this->i_IdRef;
      }
      public function setIdRef($var)
      {
          $this->i_IdRef=$var;
      } 
      
      
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
      	  if ($var=="") $var="1901-01-01";
          $this->d_Obsolette=$var;
      }                  
     
      public function getArrete()
      {
          return $this->d_Arrete;
      }
      public function setArrete($var)
      {
      	  if ($var=="") $var="1901-01-01";
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
      public function Ajouter(){
		  
		  $chaineValue='("'.$this->getNom().'","'.$this->getFiliere().'","'.$this->getSpecialite().'","'.$this->getArrete().'","'.$this->getObsolette().'","'.$this->getRefMinisteriel().'")';		  
	      $bd=new bd();
	      $conn=$bd->connectionBase();
	      $table=new DaoReferentiel();
	      $res=$table->insert($conn,$chaineValue);
	      
      }
      
      // modifier un référentiel
      public function Modifier(){
		  
		$tabValeurs["nom"]=$this->getNom();
		$tabValeurs["filiere"]=$this->getFiliere();
		$tabValeurs["specialite"]=$this->getSpecialite();
		$tabValeurs["dateArrete"]=$this->getArrete();
		$tabValeurs["dateObsolette"]=$this->getObsolette();
		$tabValeurs["refMinisteriel"]=$this->getRefMinisteriel(); 
      	$tabValeurs["idRef"]=$this->getIdRef();  
		  
		$table=new DaoReferentiel();
		$table->update($tabValeurs);  	  
      }
      
      // supprimer un référentiel
      public function Supprimer(){
		  
      	$tabValeurs["idRef"]=$this->getIdRef();  
		  
		$table=new DaoReferentiel();
		$table->delete($this->getIdRef()); 		  		  
		  
		   
      } 
      
      // lire un référentiel
      public function Lire ($ii_IdRef) {
		  
		  
		  
		  
      }
      
      
      
      
      
      
      // création de la table
      // CREATE TABLE `scool`. ( `idRef` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(50) NOT NULL , `filiere` VARCHAR(10) NOT NULL , 
      //`specialite` VARCHAR(60) NOT NULL , `dateArrete` DATE NOT NULL , `dateObsolette` DATE NOT NULL , 
      //`refMinisteriel` VARCHAR(100) NOT NULL , PRIMARY KEY (`idRef`)) ENGINE = MyISAM; 
  }
      
  
  
?>


