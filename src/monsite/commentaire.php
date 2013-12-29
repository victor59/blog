<?php require_once 'include/connexion.inc.php';  // Connexion à la BDD     ?>
<!-- En tête -->
<?php
require_once '/home/u321193632/public_html/monsite/libs/Smarty.class.php'; // On inclue la librairie
$smarty = new Smarty();
?>

<?php
ini_set('memory_limit','2048M');

if (isset($_GET['id_article'])) {
   $id = (isset($_GET['id_article'])) ? $_GET['id_article'] : 1;
    $sql = ("SELECT id_article, contenu, titre, DATE_FORMAT(date, '%d/%m/%Y') as date FROM article WHERE id_article='$id'");
$result = mysql_query($sql); // On execute la requête qui récupère l'article
$data = mysql_fetch_array($result) ; // On regroupe ces données dans un tableau

//*******************AJOUT D'UN COMMENTAIRE**************************
if (isset($_POST['Envoyer'])) { // Si on clique sur "Envoyer"
    
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $commentaire = $_POST['commentaire'];
    $commentaire =mysql_real_escape_string($commentaire); // Pouvoir insérer des apostrophe dans les commentaires
    $article=$data['titre'];
    $date = date("Y") . '-' . date("m") . '-' . date("d");
    $req = "INSERT INTO commentaire(id, pseudo, mail, commentaire, article, date ) VALUES('$id', '$pseudo', '$mail', '$commentaire', '$article', '$date')";
     mysql_query($req); // On ajoute le commentaire dans la bdd
    
     echo "Commentaire ajouté !";
}
//**************************************************************************

//*******************AFFICHAGE DES COMMENTAIRES**************************

$jointure = ("SELECT article.id_article, commentaire.id, commentaire.article, article.titre, commentaire.commentaire, commentaire.pseudo, commentaire.date
FROM article, commentaire
WHERE  article.id_article='$id'
AND   article.id_article=commentaire.id
 ;
 ");
$resultjointure = mysql_query($jointure); // On execute la requête qui récupère les commentaires

$data_tab = array();
    while ($datajointure = mysql_fetch_array($resultjointure)) {
    $data_tab[] = $datajointure;
}

//***********************************************************************
}
 else {
     echo "Erreur dans l'ajout d'un commentaire";
}



    ///////////////////Header//////////////////////////
    include_once "include/header.inc.php";
    
    ///////////////////Partie Smarty//////////////////////////
    $smarty->assign("connexion", $connexion);
    $smarty->assign("data", $data);
    $smarty->assign("ligne", $ligne);
    $smarty->assign("data_tab", $data_tab);
    $smarty->assign("datajointure", $datajointure);
    $smarty->display("Template/commentaire.tpl"); // On fait appel au fichier template
   
    
    ///////////////////Menu//////////////////////////
    include_once "include/menu.inc.php";
    
    //////////////////Pied de page///////////////////
    include_once "include/footer.inc.php";



?>

