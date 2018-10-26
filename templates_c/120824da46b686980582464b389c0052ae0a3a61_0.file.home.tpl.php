<?php
/* Smarty version 3.1.30-dev/52, created on 2017-09-02 15:29:52
  from "/srv/www/sites/master.serwery-go.pl/templates/home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_59aab25065ff80_92221250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '120824da46b686980582464b389c0052ae0a3a61' => 
    array (
      0 => '/srv/www/sites/master.serwery-go.pl/templates/home.tpl',
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
function content_59aab25065ff80_92221250 (Smarty_Internal_Template $_smarty_tpl) {
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
