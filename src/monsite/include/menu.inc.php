<?php include_once "include/connexion.inc.php"; ?>


        
<nav class="span4">
    <h3>Menu</h3>
    
    <form action="index.php" method="get">
        <br><input type="text" name ="titre" value=""></input>
          <br><input type="submit" name="" value="Rechercher"></input>
        
    </form>
    <div class="page-header well">
    <ul>
         <li>
             
             
             <a href="index.php">Accueil</a></li>  
         
         <?php
         
            
          if($connexion == FALSE)
       echo"<li><a href='connexion.php'>Se connecter</a></li> ";
                 
        else {
          echo"<li><a href='deconnexion.php'>Se déconnecter</a></li> ";
          echo"<li><a href='formulaire.php'>Ajouter un article</a></li>";
        }
        ?>
             
    </ul>
</div>
</nav>