
<?php
require_once '/home/u321193632/public_html/monsite/libs/Smarty.class.php'; // On inclue la librairie
$smarty = new Smarty();
?>



<?php
require_once 'include/connexion.inc.php';  // Connexion à la BDD 

//**********Si l'id de l'article existe dans l'URL*************
if (isset($_GET['id_article'])) { 
    $id = $_GET['id_article']; 
    $sql = "SELECT contenu FROM article WHERE id_article= '$id' "; //requête ciblant l'article à mettre à la corbeille
    $requete = mysql_query($sql) or die('Erreur SQL !' . $sql . '<br>' . mysql_error()); // On execute la requête cherchant l'article à supprimer dans la base
    $contenu = mysql_fetch_array($requete);
    extract($contenu); // On extrait le contenu de l'article
    $sqlcorbeille = "UPDATE corbeille SET contenu='$contenu' WHERE id='$id' ";
    mysql_query($sqlcorbeille); // On insère l'article dans la table corbeille
    $sqlsupprimer = "DELETE FROM article WHERE contenu= '$contenu' ";
    mysql_query($sqlsupprimer); // On supprime l'article
     $sqlsupprimercom = "DELETE FROM `commentaire` WHERE  commentaire.id='$id'; ";
    mysql_query($sqlsupprimercom); // On supprime les commentaires
    ///////////////////Header//////////////////////////
    include_once "include/header.inc.php";
    
    ///////////////////Partie Smarty//////////////////////////
    $smarty->display("Template/supprimer.tpl"); // On fait appel au fichier template
    
    ///////////////////Menu//////////////////////////
    include_once "include/menu.inc.php";
    
    //////////////////Pied de page///////////////////
    include_once "include/footer.inc.php";
    
    header("Refresh: 3;URL=index.php"); // On rafraichie la page 3 secondes après le message informant la suppression de l'article
}
?>




