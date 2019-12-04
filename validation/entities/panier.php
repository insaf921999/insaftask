<?php 
class Panier {
private $id;
private $idproduit;
private $name;
private $pricetotal;
private $quantite;
private $price;
private $idclient;

function __construct($id,$idprod,$name,$pricetot,$quant,$price,$idcli){
	 


	$this->id=$id;
	$this->idproduit=$idprod;
	$this->name=$name;
	$this->pricetotal=$pricetot;
	$this->quantite=$quant;
	$this->price=$price;
	$this->idclient=$idcli;

	 }

	 function getId(){
	 	return $this->id;
	 }
	 function getIdProduit()
	 {
	 	return $this->idproduit;
	 }
	 function getName()
	 {
	 	return $this->name;
	 }
	 function getPriceTotal()
	 {
	 	return $this->pricetotal;
	 }
	 function getQuantite()
	 {
	 	return $this->quantite;
	 }
	 function getPrice()
	 {
	 	return $this->price;
	 }
	 function getIdClient()
	 {
	 	return $this->idclient;
	 }

	 function setQuantite($quant)
	 {
	 	$this->quantite=$quant;
	 }
}


?>