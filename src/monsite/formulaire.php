
<?php
require_once 'include/connexion.inc.php';  // Connexion à la BDD 
require_once '/home/u321193632/public_html/monsite/libs/Smarty.class.php'; // On inclue la librairie
$smarty = new Smarty();


//*******************AJOUT D'UN ARTICLE**************************
if (isset($_POST['Ajouter'])) { // Si on clique sur "ajouter"
    
    // On met dans des variables toutes les propriétés de l'article
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $date = date("Y") . '-' . date("m") . '-' . date("d");

    if (isset($_POST['publie']))
        $publie = $_POST['publie'];
    if ($titre != "" && $texte != "")
        $req = "INSERT INTO article(id_article, date, contenu, titre, publication ) VALUES('', '$date', '$texte', '$titre', '$publie')";
    mysql_query($req); // On ajoute l'article dans la bdd
    
    //Gestion des erreurs concernants les images
    if (!empty($_POST['image'])) {

        $erreur_image = $_FILES['image']['error'];
    }
    else
        $erreur_image = "";

    $id = mysql_insert_id();

    move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id.jpg"); // On ajoute l'image dans le dossier "img" avec comme nom l'id de l'article


    echo $erreur_image;
    echo "Article ajouté !";
} 

//*******************MODIFICATION D'UN ARTICLE**************************
else if (isset($_POST['Modifier'])){ // Si on clique sur "modifier"
    
    // On met dans des variables toutes les propriétés de l'article
    $id_article = $_POST['id_article'];
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $date = date("Y") . '-' . date("m") . '-' . date("d");

    if (isset($_POST['publie']))
        $publie = $_POST['publie'];
    if ($titre != "" && $texte != "")
        $req = "UPDATE article SET date='$date', contenu='$texte', titre='$titre', publication='$publie' WHERE id_article='$id_article'";
    
    mysql_query($req); // On modifie l'article dans la bdd
    
    //Gestion des erreurs concernants les images
     if (!empty($_POST['image'])) {

        $erreur_image = $_FILES['image']['error'];
    }
    else{
        $erreur_image = "";
    move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__)."/img/$id_article.jpg"); // On ajoute l'image dans le dossier "img" avec comme nom l'id de l'article
    echo $id_article.".jpg";
    echo "Article modifié !";
    }
}
if (isset($_GET['id_article'])) { // Si l'id de l'article existe dans l'url
    $id= $_GET['id_article'];
    $sql = "SELECT * FROM article WHERE id_article= $id";
    $requete = mysql_query($sql);
    $data = mysql_fetch_array($requete);
    extract($data); // On extrait les données
    

} else {
    $data = array("id_article" => NULL, "titre" => "", "contenu" => "", "publication" => "", "date" => ""); // Sinon les champs sont vides par défaut
}
$action_label = (!empty($_GET['id_article'])) ? 'Modifier' : 'Ajouter'; // Si on modifie un article, le bouton de soumission se nomme 'Modifier'. Sinon il se nomme 'Supprimer'

///////////////////Header//////////////////////////
include_once "include/header.inc.php";

///////////////////Partie Smarty//////////////////////////
$smarty->assign("action_label", $action_label);
$smarty->assign("data", $data);
$smarty->display("Template/formulaire.tpl"); // On fait appel au fichier template

///////////////////Menu//////////////////////////
include_once "include/menu.inc.php";

//////////////////Pied de page///////////////////
include_once "include/footer.inc.php";

    ?>

    

 
