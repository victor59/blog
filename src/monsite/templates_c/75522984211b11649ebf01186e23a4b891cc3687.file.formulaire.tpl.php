<?php /* Smarty version Smarty-3.1.15, created on 2013-12-03 15:14:29
         compiled from "Template\formulaire.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32365294be9df07264-82779027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75522984211b11649ebf01186e23a4b891cc3687' => 
    array (
      0 => 'Template\\formulaire.tpl',
      1 => 1386079765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32365294be9df07264-82779027',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5294be9e061281_55470814',
  'variables' => 
  array (
    'action_label' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294be9e061281_55470814')) {function content_5294be9e061281_55470814($_smarty_tpl) {?><div class="span8">
        <center><h2><font color="red"><?php echo $_smarty_tpl->tpl_vars['action_label']->value;?>
 un article</font></h2>



            <!-- AFFICHAGE DU FORMULAIRE D'AJOUT OU DE MODIFICATION D'UN ARTICLE -->
            <form action="formulaire.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_article" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
" >
                Titre
                <br>
                <br><input type="text" name ="titre" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['titre'];?>
"></input>
                <br>
                <br>
                Texte
                <br><textarea name ="texte" ><?php echo $_smarty_tpl->tpl_vars['data']->value['contenu'];?>
</textarea>
                <br>
                <br>
                Image
                <br>
                <br><input type="file" name="image" value="Choisissez un fichier"></input>
                <br>
                <br>
                Publi&eacute;   &nbsp;&nbsp;&nbsp; <input type="checkbox" name="publie" <?php if (($_smarty_tpl->tpl_vars['data']->value['publication']==1)) {?>  checked="checked"<?php }?>  value="1" ></input>
                <br>
                <br><input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['action_label']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['action_label']->value;?>
" class="btn btn-large btn-primary"></input>





            </form>
        </center>
    </div><?php }} ?>
