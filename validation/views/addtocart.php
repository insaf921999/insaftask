<?php 
include "../entities/panier.php";
include "../core/panierC.php";
include '../header.php';
// session_start();
$idclient=$_SESSION['cin'];
$panierC=new PanierCore();
// $liste=$panierC->GetProduit($_GET['reference']);
$liste=$panierC->GetProduit($_GET['reference']);

$x=0;
foreach ($liste as $produit){
 $x++;

}
 $panier=new Panier(0,$_GET['reference'],$produit['nom'],0,0,$produit['prix'],$idclient);
echo $panier->getName();
$verif=$panierC->VerifPanier($panier->getIdProduit(),$panier->getIdClient());


 $panierC->AjouterPanier($panier,$_GET['reference']);

//  $liste=$panierC->GetPanier($_GET['reference']);
// var_dump($liste);
// $x=0;
// foreach ($liste as $row){
// 	echo $row['quantite'];
// }
//echo $panier->getPriceTotal();


 echo "<script> window.location.href='../Panier.php'</script>";

?>