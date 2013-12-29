<?php /* Smarty version Smarty-3.1.15, created on 2013-12-17 16:18:58
         compiled from "Template\connexion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:227765294a5b86f29d8-19318943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88ab0f5928427ba1730a4bda555c26353efde3b8' => 
    array (
      0 => 'Template\\connexion.tpl',
      1 => 1386080432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '227765294a5b86f29d8-19318943',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5294a5b8715c58_37961772',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294a5b8715c58_37961772')) {function content_5294a5b8715c58_37961772($_smarty_tpl) {?><div class="span8">
    <!-- AFFICHAGE DU FORMULAIRE DE CONNEXION -->
    <center><h2><font color="red">Connexion</font></h2>
            <form action="connexion.php" method="post" enctype="multipart/form-data">

                Email
                <br><input type="text" name ="mail" value="vlorenzi.ac@gmail.com"></input>
                <br>
                Mot de passe
                <br><input type="password" name ="mdp" value="root"></input>
                <br><input type="submit" name="connexion" value="connexion" class="btn btn-large btn-primary"></input>
              
        </center>
   
        
</div><?php }} ?>
