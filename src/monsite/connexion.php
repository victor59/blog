<?php require_once 'include/connexion.inc.php';  // Connexion à la BDD     ?>
<!-- En tête -->
<?php
require_once '/home/u321193632/public_html/monsite/libs/Smarty.class.php'; // On inclue la librairie
$smarty = new Smarty();
?>

<?php
//**************Si on soumet le formulaire***********************
if (isset($_POST['connexion'])) { 
    
    $mail = $_POST['mail']; // On déclare la variable récupérant le login
    $texte = $_POST['mdp']; // On déclare la variable récupérant le mdp
    
    //Si ces 2 variables ne sont pas nulles, on fait un requête mysql cherchant ces utilisateurs
    if ($mail != "" && $texte != "")
        header("Refresh: 0;URL=index.php"); // On rafraichie immédiatement la page vers index.php
        $sql = "select mail,mdp FROM utilisateur WHERE utilisateur.mail = '$mail' AND utilisateur.mdp = '$texte'";
        $requete = mysql_query($sql);
        $data = mysql_fetch_array($requete);
    if ($data['mail']==$mail && $data['mdp']==$texte) {
        $sid = md5($data['mail'] . time()); // on crypte
        $maj = "UPDATE utilisateur SET sid='$sid' WHERE mail='$mail'"; // on met à jour le champ sid
        mysql_query($maj);
        setcookie('sid', $sid, time() + 15 * 60); // nom du cookie, valeur du cookie, temps de validité (ici 15 min)
    } else {
        header("Refresh: 3;URL=index.php"); // On rafraichie immédiatement la page vers index.php
        echo "Connexion impossible";
    }
} else {
    
    ///////////////////Header//////////////////////////
    include_once "include/header.inc.php";
    
    ///////////////////Partie Smarty//////////////////////////
    $smarty->display("Template/connexion.tpl"); // On fait appel au fichier template
    
    ///////////////////Menu//////////////////////////
    include_once "include/menu.inc.php";
    
    //////////////////Pied de page///////////////////
    include_once "include/footer.inc.php";
}


?>

