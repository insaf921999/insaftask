<?php 
// include_once '../config.php';
//include "../config.php";
include "D:/wamp64/www/validation/config.php";
class PanierCore
{


	function GetProduit($ref)
	{
		$sql="SELECT * FROM produit WHERE reference=$ref";

		$db = config::getConnexion();
        try{
        $compte=$db->query($sql);
        return $compte;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
    function GetPanier($ref)
    {
        $sql="SELECT * FROM panier WHERE id_prod=$ref";

        $db = config::getConnexion();
        try{
        $compte=$db->query($sql);
        return $compte;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function veriif($idc)
    {
        $sql="SELECT * FROM panier WHERE idclient=$idc";

        $db = config::getConnexion();
        try{
        $compte=$db->query($sql);
        if (empty($compte)) {
            return 1;
        }
        else
        {
            return 0;  
        }
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }    
    }
	function VerifPanier($idprod,$idclient)
	{
		$sql="SELECT * FROM panier WHERE (id_prod=$idprod and idclient=$idclient) ";
        $db = config::getConnexion();
		try{
        $panier=$db->query($sql);
        $x=0;
        foreach ($panier as $row) {
            $x++;
        }
        if ($x==0) {
        	return $x;
        }
        else {
        	return $x;
        }
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}
	function AjouterPanier($panier,$ref)
	{
		$produitC=new PanierCore();

		$produit=$produitC->getProduit($ref);
		foreach ($produit as $row) {}
			$verif=$produitC->VerifPanier($panier->getIdProduit(),$panier->getIdClient());
		if ($verif==0)
		{
			$sql="INSERT INTO panier (id,id_prod,name,pricetotal,quantite,price,idclient) values (null,:ref,:name,:pricetotal,'1',:price,:idclient)";
            $db = config::getConnexion();
			try{

        $req=$db->prepare($sql);
	
        $req->bindValue(':ref',$ref);
        $req->bindValue(':name',$panier->getName());
        $req->bindValue(':pricetotal',$panier->getPrice());
        $req->bindValue(':price',$panier->getPrice());
        $req->bindValue(':idclient',$panier->getIdClient());
        $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		}
		else
		{
			$sql="UPDATE panier set pricetotal=:pricetotal,quantite=:quantite where (id_prod=:ref and idclient=:idclient)";
            $panierC=new PanierCore();
            $prod=$panierC->GetPanier($ref);
            foreach ($prod as $row) {
                $panier->setQuantite($row['quantite']);
            }
			$pricetotal=$panier->getPrice()*($panier->getQuantite()+1);
			$quant=$panier->getQuantite()+1;
            $db = config::getConnexion();
				try{
        $req=$db->prepare($sql);
	
        
    	$req->bindValue(':pricetotal',$pricetotal);
		$req->bindValue(':quantite',$quant);
        $req->bindValue(':ref',$ref);
        $req->bindValue(':idclient',$panier->getIdClient());
        $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

		}
		

	}
    function retirerPanier($id,$idc)
    {
     // $sql="DELETE FROM panier WHERE (id_prod=$id and idclient=$idc) "; 
        $sql="DELETE FROM panier  WHERE id_prod=$id and idclient=$idc "; 
     $db = config::getConnexion();
        $req=$db->prepare($sql);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
    }

    function delete($id,$idc)
    {
         $sql="DELETE FROM panier  WHERE idclient=$idc "; 
     $db = config::getConnexion();
        $req=$db->prepare($sql);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
    }
    function afficherPanier($idc)
    {
        //$sql='SELECT *,sum(p.quantite) as quantite FROM panier p , products pr where p.idproduit=pr.id and p.idclient = '".$idc."' group by p.idproduit';
        $sql='SELECT *,sum(p.quantite) as quantite FROM panier p , produit pr where p.id_prod=pr.reference and p.idclient ="'.$idc.'" group by p.id_prod';
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function calculerprix($idc)
    {
        $sql='SELECT *,sum(p.quantite) as quantite FROM panier p , produit pr where p.id_prod=pr.reference and p.idclient ="'.$idc.'" group by p.id_prod';
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        $somme=0;
        foreach ($liste as $key) {
            $somme=$somme+($key['quantite'] * $key['price']);
        }
        return $somme;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }
    function updatepanier($idp)
    {
        $sql='SELECT *,sum(p.quantite) as quantite FROM panier p , produit pr where p.id_prod=pr.reference  and p.id_prod='.$idp.' group by p.id_prod';
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        foreach ($liste as $key) {

        }
        
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function trierpanier($idc)
    {
            $sql='SELECT *,sum(p.quantite) as quantite FROM panier p , products pr where p.idproduit=pr.id  and p.idclient='.$idc.' group by p.idproduit ORDER BY pr.price';
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
            return $liste;
        
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }       
    }

}






?>