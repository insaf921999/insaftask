<?php


require "../_header.php";
session_start();
$idclient=$_SESSION['cin'];
if(isset($_GET['id'])){
	
      $product = $DB->query('SELECT * FROM products WHERE id=:id',array('id' => $_GET['id']));
	if(empty($product))
	{
		die("ce produit n'existe pas");
	}
	else {
     
      $product=$DB->query('SELECT *,sum(p.quantite) as quantite FROM panier p , products pr where p.idproduit=pr.id  and p.idproduit='.$_GET['id'].' group by p.idproduit'); 

      
       		$DB->query("UPDATE panier set  quantite='".$_GET['quantite']."', pricetotal='".($product[0]->price*($_GET['quantite']))."' WHERE idproduit='".$_GET['id']."' and idclient='".$idclient."'");

       }  


//	var_dump($product);
	//$DB->query('INSERT INTO panier  values (null,'.$_GET['id'].',"'.$product[0]->price.'","1","'.$product[0]->price.'",1)');
	//
	 //echo "<script> window.location.href='Panier.php'</script>";
	 header("location:../Panier.php");
	}
	?>
  

