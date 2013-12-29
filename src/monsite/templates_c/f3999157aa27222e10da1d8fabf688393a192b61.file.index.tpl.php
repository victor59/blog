<?php /* Smarty version Smarty-3.1.15, created on 2013-12-17 16:18:52
         compiled from "Template\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116435294acbf3f8733-48666124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3999157aa27222e10da1d8fabf688393a192b61' => 
    array (
      0 => 'Template\\index.tpl',
      1 => 1386080108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116435294acbf3f8733-48666124',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5294acbf42f237_94909570',
  'variables' => 
  array (
    'total' => 0,
    'data_tab' => 0,
    'data' => 0,
    'connexion' => 0,
    'nbTotalDePage' => 0,
    'recherche' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5294acbf42f237_94909570')) {function content_5294acbf42f237_94909570($_smarty_tpl) {?><div class="span8">
    <!-- On informe le nombre d'article correspondant à notre recherche (nombre total d'articles si on ne recherche pas)-->
    <?php if (($_smarty_tpl->tpl_vars['total']->value<1)) {?>
            Il n'y a pas d'article correspondant.
        <?php } else { ?>
            Il y a <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 article(s).
        
    <?php }?>    
   
    <!-- On affiche chaque articles (titre, date, contenu et image)-->
    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data_tab']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
      <h2> <?php echo $_smarty_tpl->tpl_vars['data']->value['titre'];?>
</h2><?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
 - <?php echo $_smarty_tpl->tpl_vars['data']->value['contenu'];?>

      
      <img src = 'img/<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
.jpg' width = '1024' height = '768' alt = '1'/>
      
      <!-- Si on est connecté, on a la possibilité de modifier ou de supprimer un article-->
      <?php if ($_smarty_tpl->tpl_vars['connexion']->value==true) {?>
          <a href ='formulaire.php?id_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
'> Modifier un article </a>
          <a href ='supprimer.php?id_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
'> Supprimer un article </a>
      <?php }?>
      
     <?php } ?>
      <br>
      <!-- Affichage des liens vers les pages suivantes-->
     <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nbTotalDePage']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nbTotalDePage']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>

         <?php if ($_smarty_tpl->tpl_vars['recherche']->value!=null) {?>
        <a href='index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
&titre=<?php echo $_smarty_tpl->tpl_vars['recherche']->value;?>
'> page <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 </a>
           <?php } else { ?>
                 <a href='index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
'> page <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 </a>          
        <?php }?>
         
        
     <?php }} ?>
     
      
      <br><br>
    </div><?php }} ?>
