<?php 
require 'header.php';
include 'core/panierC.php';
?>
<link rel="stylesheet" type="text/css" href="kakaroto.css">
<link rel="stylesheet" type="text/css" href="views/stylek.css">
<div class="form">
<form action="searchPanier.php" method="post">
    <label class="kiro">search</label>
    <input placeholder="type here product name " class="searchk" type="text" name="search" onkeyup="recherche(this.value);">
</form>
<a href="produits.php">GO BACK</a>

</div>
<!-- annimation des images-->
<div id="sss">
<table>
  <tr>
    <th>Image</th>
    <th>Nom Produit</th>
    <th>Quantite</th>
    <th>Prix Unitaire</th>
    <th>Prix Total</th>
    <th>Action</th>
  </tr>
  <?php
  require '_header.php';
 if(!isset($_SESSION['cin']))
 {
    echo "<script type='text/javascript'>alert('vous devez connecter a votre compte');
window.location='../web/login.php';
</script>";
 }
 else
 {
  
  $idclient=$_SESSION['cin'];
  $panierc=new PanierCore();
  $products=$panierc->afficherPanier($idclient);
      if(empty($products))
    {

    } 
    else
    {
        $somme=0;
        $z=0;
      foreach ($products as $product)
      {
        $z++;
        // <td><img class="imgprod" src="'.$product['img'].'" class="panierpic"></td>
  echo '<tr><form action="views/update_panier.php" method="get">
    <input type="hidden" name="id" value="'.$product['id'].'"/>

    <td></td>
    <td><h2>'.$product['name'].'</h2></td>
    <td><input type="number" size="30" min="1" max="99" name="quantite" value="'.$product['quantite'].'" id="qte" class="haha"></td>
    <td><span  id="prix" name="prix">'.$product['price'].'</span><span id="tnd" class="tnd">TND</span></td>
    <td id="total"><span>'.$product['quantite'] * $product['price'].'</span><span id="tnd" class="tnd">TND</span></td>
    <td><button><a href="views/retirerpanier.php?id='.$product['id'].'&idc='.$_SESSION['cin'].'">retirer</button></a><input class="update" type="submit" value="update"/></td></tr></form>';
}
$somme=$panierc->calculerprix($idclient);
$_SESSION['somme']=$somme;
echo "<h1>Total=$somme TND<h1>";
    }
}    # code...

     ?>
</table>
</div>
<form action="commande.php" method="post">
<input class="comm" type="submit" name="Commander" value="Commander">
    </form>
    <!-- Welcome Area Start -->
    
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel owl-loaded owl-drag">
            <!-- Single Welcome Slide -->
            

            <!-- Single Welcome Slide -->
            
        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-2052px, 0px, 0px); transition: all 0s ease 0s; width: 6156px;"><div class="owl-item cloned" style="width: 1026px;"></div><div class="owl-item cloned" style="width: 1026px;"></div><div class="owl-item active" style="width: 1026px;"></div><div class="owl-item cloned" style="width: 1026px;"></div><div class="owl-item cloned" style="width: 1026px;"></div></div></div><div class="owl-nav disabled"><div class="owl-prev">prev</div><div class="owl-next">next</div></div><div class="owl-dots"><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div></div></div>
    </section>



<!-- les produits kela fehom 4 tsawer-->


<!-- Border -->
    <div class="container">
        <div class="border-top mt-3"></div>
    </div>

    <!-- les produits kela fehom 4 tsawer-->
    



<!-- Pourquoi Nous Choisir? -->


<!-- Why Choose Us Area Start -->
    
    <!-- Why Choose Us Area End -->



<!-- Portfolio Area Start -->
    
    <!-- Portfolio Area End -->



<!-- mte3 service client -->

       




<!-- la derniere partie de la page: contactez_nous -->


   
    




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
    <script src="js/default-assets/active.js"></script><a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;"><i class="arrow_carrot-up" <="" i=""></i></a>
    <script type="text/javascript">
        function recherche(str)
        {

            if(str=="")
            {

                if (window.XMLHttpRequest) 
                {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } 
                else 
                {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("sss").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","views/afficherPanierTotal.php",true);
                xmlhttp.send();
            }

            
            else
            {
                if (window.XMLHttpRequest) 
                {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } 
                else 
                {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() 
                {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                        document.getElementById("sss").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","views/searchPanier.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>


</body>
</html>