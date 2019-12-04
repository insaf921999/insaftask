<?php
include '../core/panierC.php';
//require "_header.php";
session_start();
 	$idclient=$_SESSION['cin'];	
 	$idclient=$_GET['idc'];
 	$id=$_GET['id'];
       		//$DB->query('DELETE  FROM panier WHERE idproduit='.$_GET['id'].' AND idclient='.$idclient.'');
       		$panierC=new PanierCore();
       		$panierC->delete($id,$idclient);
       		
       		 echo "<script> window.location.href='../Panier.php'</script>";
       		?>