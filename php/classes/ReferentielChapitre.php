<?php
  
   
include_once ("bd.php");
//include_once ("DaoFiliere.php");
include_once ("DaoChapitreContenu.php");


class ReferentielChapitre 
{
	private $idRef;
	private $chapNumerotation;
	private $chapTitre;
	private $chapDetail;
	
	
	public function getIdRef(){ return $this->idRef;}
	public function setIdRef($var){ $this->idRef=$var;}	 
	public function getchapNumerotation(){ return $this->chapNumerotation;}
	public function setchapNumerotation($var){ $this->chapNumerotation=$var;} 
	public function getchapTitre(){ return $this->chapTitre;}
	public function setchapTitre($var){ $this->chapTitre=$var;}	 
	public function getchapDetail(){ return $this->chapDetail;}
	public function setchapDetail($var){ $this->chapDetail=$var;}	 
	 
	 
	public function Selectionner()
	{
	  $bd=new bd();
	  $conn=$bd->connectionBase();
	  $table=new daoChapitreContenu();
	  $res=$table->	selectChapitre();
	  return $res;
	} 
	 

	public function Ajouter(){
	  
	  $chaineValue="('".$this->getIdRef()."','".$this->getchapNumerotation()."','".$this->getchapTitre()."','".$this->getchapDetail()."')";		  
	  $bd=new bd();
	  $conn=$bd->connectionBase();
	  $table=new daoChapitreContenu();
	  $res=$table->insertChapitre($chaineValue);
	
	}
	
	public function Modifier(){
	  
		$tabValeurs["numerotation"]=$this->getchapNumerotation();
		$tabValeurs["titre"]=$this->getchapTitre();
		$tabValeurs["detail"]=$this->getchapDetail();

		$table=new daoChapitreContenu();
		$table->updateChapitre($tabValeurs);  	  
	}
  
   
    public function Supprimer(){
	  
	    $tabValeurs["idRef"]=$this->getIdRef();  
		  
		$table=new daoChapitreContenu();
		$table->deleteChapitre($this->getIdRef()); 		  		  
			  
		   
    } 
  	 
	 
}

  
  
  
?>
