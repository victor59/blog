<?php

mysql_connect("mysql.hostinger.fr", "u321193632_victo", "xzibit59") or die ("Connexion impossible : ".mysql_error());
mysql_select_db("u321193632_blog");

$connexion = FALSE;
if (isset($_COOKIE['sid']))
{
    $cookie = $_COOKIE['sid'];
    $connexion = TRUE;
}
?>
