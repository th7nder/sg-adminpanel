<?php
/* Smarty version 3.1.30-dev/52, created on 2016-03-14 16:25:24
  from "/srv/httpd/master.serwery-go.pl/templates/home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_56e6d7e48c3d40_73067396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1b10e21a43b07304545cc5aeaa3f3eeb49932e7' => 
    array (
      0 => '/srv/httpd/master.serwery-go.pl/templates/home.tpl',
      1 => 1457969122,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_header.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_56e6d7e48c3d40_73067396 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<center><img src="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/img/logo_big.png"></center>
<center><img src="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/img/sg_logo.png"></center>
<?php $_smarty_tpl->_subTemplateRender("file:_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
