<?php
/* Smarty version 3.1.30-dev/52, created on 2017-09-02 15:28:13
  from "/srv/www/sites/master.serwery-go.pl/templates/_messages.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_59aab1edc28943_07336085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '776ee433372aa2d96dae30a59c1c7100b8f56410' => 
    array (
      0 => '/srv/www/sites/master.serwery-go.pl/templates/_messages.tpl',
      1 => 1457280964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59aab1edc28943_07336085 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['MESSAGES']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['MESSAGES']->value['success']) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MESSAGES']->value['success'], 'msg');
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
$__foreach_msg_0_saved = $_smarty_tpl->tpl_vars['msg'];
?>
			<div class="alert alert-icon alert-success alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon-checkmark"></i> <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

			</div>
		<?php
$_smarty_tpl->tpl_vars['msg'] = $__foreach_msg_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['MESSAGES']->value['info']) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MESSAGES']->value['info'], 'msg');
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
$__foreach_msg_1_saved = $_smarty_tpl->tpl_vars['msg'];
?>
			<div class="alert alert-icon alert-info alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon-info"></i> <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

			</div>
		<?php
$_smarty_tpl->tpl_vars['msg'] = $__foreach_msg_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>	
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['MESSAGES']->value['warning']) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MESSAGES']->value['warning'], 'msg');
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
$__foreach_msg_2_saved = $_smarty_tpl->tpl_vars['msg'];
?>
			<div class="alert alert-icon alert-warning alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon-warning"></i> <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

			</div>
		<?php
$_smarty_tpl->tpl_vars['msg'] = $__foreach_msg_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>	
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['MESSAGES']->value['error']) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MESSAGES']->value['error'], 'msg');
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->_loop = true;
$__foreach_msg_3_saved = $_smarty_tpl->tpl_vars['msg'];
?>
			<div class="alert alert-icon alert-danger alert-dismissable fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon-close"></i> <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

			</div>
		<?php
$_smarty_tpl->tpl_vars['msg'] = $__foreach_msg_3_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>	
	<?php }
}
}
}
