
<?php 
require 'db.class.php';
require 'header.php';
//require 'filter.php';
$DB = new DB();
?>
<body>


<!-- <div id="preloader">
        <div class="loader"></div>
    </div> -->
    <!-- /Preloader -->

    <!-- Header Area Start -->
    
  
    
    <!-- Header Area End -->
   
<!-- 
<?php  
// 

?> -->

<!--Product Start-->
<br><br><br><br><br>





<center><h1>Nos Produits</h1></center>
<!--LE RESTE DES PRODUIT-->
<?php

 
// Nous devons valider notre document avant de nous référer à l'ID
// $sql='SELECT * FROM produitensolde ORDER BY reference ASC  ';
// $sql='SELECT * FROM produit ';
$set="";
$sql="select * from produit where nom like '%$set%' ";

    // if (isset($_POST['min']) and isset($_POST['max'])) {
    //   $sql='SELECT * FROM produit WHERE prix >= '.$_POST["min"].' AND prix <= '.$_POST["max"].'   ';  

    // }
    // echo "$sql";
    // if (isset($_POST['rech'])) {
    //     $sql=' SELECT * FROM produit WHERE nom='.$_POST["rech"].' ';
    //     echo "$sql";
    // }

    // if (isset($_POST['max'])) {
    //  $sql.'AND (prix <= '.$_POST["max"].' ';
    // }
   //  else
   // {$sql='SELECT * FROM produit ORDER BY reference ASC  ';}

 $products2 = $DB->query($sql);?>
 <!-- <?php var_dump($products2);?> -->

<?php foreach ( $products2 as $product) : ?>

<div class="produitts">
  
    <img src="img/<?= $product->photo;?>" height="250px" width="250px" class="pic" >

    <a href="single.php?reference=<?= $product->reference ?>"><h3 class="title"> <?= $product->nom ?>   </h3></a>
    <h4 class="ref"> Reference : <?= $product->reference ?></h4>

    <h4 class="price"><?= $product->prix ?> DT</h4>
    <a href="#"><p class="type"><?php if($product->type==0) {
        echo "Vetement";
    } elseif ($product->type==1) {
        echo "Materiel";
    }
   
    ?></p></a>
    <div class="descrip"><div class="tip">Description :</div> 
    <p > <?= $product->description ?> </p></div>
    <!-- <button class="panier"><img src="chart.png" class="addchart" width="10px" height="10px"></button> -->
    <!-- <a href="addpanier.php?reference=<?=$product->reference ?>"><button ><img src="add1.jpg" width="30px" height="30px"></button></a> -->

    <a href="views/addtocart.php?reference=<?=$product->reference?>&x=1"><button>Ajouter au panier</button></a>
    

<!-- TBALBIZ STARTS HERE ! -->
<!-- <form method="get" action="addtocart.php">
    <input  name="name" hidden="hidden" value="<?= $product->nom ?>">
    <input  name="name" hidden="hidden" value="<?= $product->nom ?>">
    <input  name="name" hidden="hidden" value="<?= $product->nom ?>">
    <input  name="name" hidden="hidden" value="<?= $product->nom ?>">
    <input type="submit" name="submit">
</form> -->
</div>
 <br>

<?php endforeach ?>











<!-- <button>Ajouter au panier</button> -->
    <!-- <div class="ajouterpanier">
        <p class="textpanier">Ajouter au panier</p>
        <img src="chart.png" class="addchart" width="10px" height="10px">

    </div> -->

<!--Product End-->


 <!-- Footer Area Start -->
    
   <!-- All JS Files -->
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/akame.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>
