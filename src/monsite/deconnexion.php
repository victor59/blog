<?php require_once 'include/connexion.inc.php';  // Connexion à la BDD    
      require_once '/home/u321193632/public_html/monsite/libs/Smarty.class.php'; // On inclue la librairie
      $smarty = new Smarty();
?>

    <?php
        // DECONNEXION
     
        header("Refresh: 3;URL=index.php"); // On rafraichie  la page vers index.php au bout de 3 secondes 
        setcookie('sid', NULL, -1); // On efface le cookie en créant un vide
        
        ///////////////////Header//////////////////////////
        include_once "include/header.inc.php";
        
        ///////////////////Partie Smarty//////////////////////////
        $smarty->display("Template/deconnexion.tpl"); // On fait appel au fichier template
        
        ///////////////////Menu//////////////////////////
        include_once "include/menu.inc.php";
        
        //////////////////Pied de page///////////////////
        include_once "include/footer.inc.php";
        ?>
       

