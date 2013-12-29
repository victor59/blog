<?php require_once 'include/connexion.inc.php';  // Connexion à la BDD     ?>


<?php
require_once '/home/u321193632/public_html/monsite/libs/Smarty.class.php'; // On inclue la librairie
$smarty = new Smarty();
?>

<?php

//******Si on recherche un article, la variable $recherche sera égale à cette recherche, sinon elle est nulle*********
if (isset($_GET['titre'])) {
    $recherche = $_GET['titre'];
}
else
    $recherche = NULL;
//***********************************************

$nbArticleParPage = 2;
$page = (isset($_GET['page'])) ? $_GET['page'] : 1; // on récupère le numéro de la page si celle ci existe
$debut = ($page - 1) * $nbArticleParPage; //article de début de page

//***************Si on recherche un article, on execute une requête MYSQL affichant les articles propres à notre recherche, sinon on les affiche tous******
if ($recherche != null) {
    $sqlcount = ("SELECT COUNT(*) AS id_article FROM article WHERE publication=1 AND (article.titre like '%$recherche%' or article.contenu like '%$recherche%')");

    $sql = ("select id_article,contenu,titre,DATE_FORMAT(date,'%d/%m/%Y') as date FROM article WHERE article.publication = 1 AND (article.titre like '%$recherche%' or article.contenu like '%$recherche%') order by date desc limit $debut, $nbArticleParPage");
} else {
    $sqlcount = ("SELECT COUNT(*) AS id_article FROM article WHERE publication=1");

    $sql = ("SELECT id_article, contenu, titre, DATE_FORMAT(date, '%d/%m/%Y') as date FROM article WHERE publication=1 order by date desc limit $debut, $nbArticleParPage");
}
//***************************************

$result = mysql_query($sqlcount); // On execute la requête qui compte le nombre d'articles
$data = mysql_fetch_array($result); // On regroupe ces données dans un tableau
$total = $data['id_article']; // Nombre d'articles
$nbTotalDePage = ceil($total / $nbArticleParPage); // nombre d'articles / 2
$requete = mysql_query($sql); // On execute la requete qui nous retourne les données des articles

//************************Affichage de chaque articles*******************************************************

$data_tab = array();
while ($ligne = mysql_fetch_array($requete)) {
    $data_tab[] = $ligne;
}
//***********************************************************************************************************

///////////////////Header//////////////////////////
include_once "include/header.inc.php";

///////////////////Partie Smarty//////////////////////////
$smarty->assign("connexion", $connexion);
$smarty->assign("recherche", $recherche);
$smarty->assign("nbTotalDePage", $nbTotalDePage);
$smarty->assign("total", $total);
$smarty->assign("data_tab", $data_tab);
$smarty->assign("ligne", $ligne);
$smarty->display("Template/index.tpl"); // On fait appel au fichier template

///////////////////Menu//////////////////////////
include_once "include/menu.inc.php";

//////////////////Pied de page///////////////////
include_once "include/footer.inc.php";
?>



