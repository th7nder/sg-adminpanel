<?php
/* Smarty version 3.1.30-dev/52, created on 2016-08-10 02:57:00
  from "/srv/httpd/master.serwery-go.pl/templates/edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_57aa7bdc354ba8_61301645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d074252c387af12460c0e3a30dc2d86cd4e0879' => 
    array (
      0 => '/srv/httpd/master.serwery-go.pl/templates/edit.tpl',
      1 => 1470790617,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_header.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_57aa7bdc354ba8_61301645 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if (!$_smarty_tpl->tpl_vars['ADMIN_DATA']->value || !$_smarty_tpl->tpl_vars['SERVERS']->value) {?>
	Brak specyficznych uprawnień.
<?php } else { ?>

<div class="c-block" id="adminEdit">
	<h3 class="block-title">Edycja globalnych uprawnień dla gracza o ID <?php echo $_smarty_tpl->tpl_vars['ADMIN_DATA']->value['admin_id'];?>
</h3>
	<form method="POST" action="/?p=handler&action=edit&admin_id=<?php echo $_GET['admin_id'];?>
" role="form">
		<div class="form-group">
			<label for="name">Gracz</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Nick Gracza" value="<?php echo $_smarty_tpl->tpl_vars['ADMIN_DATA']->value['name'];?>
" required>
		</div>
		<div class="form-group">
			<label for="steamid">SteamID</label>
			<input type="text" class="form-control" id="authid" name="authid" placeholder="SteamID" value="<?php echo $_smarty_tpl->tpl_vars['ADMIN_DATA']->value['authid'];?>
" required>
		</div>

		<div class="form-group">
			<label for="steamid">Globalne Flagi</label>
			<input type="text" class="form-control" id="flags" name="flags" placeholder="Globalne Flagi" value="<?php echo $_smarty_tpl->tpl_vars['ADMIN_DATA']->value['flags'];?>
">
		</div>

		<div class="form-group">
			<label for="steamid">Immunitet</label>
			<input type="text" class="form-control" id="immunity" name="immunity" placeholder="Immunitet" value="<?php echo $_smarty_tpl->tpl_vars['ADMIN_DATA']->value['immunity'];?>
" required>
		</div>

		<div class="form-group">
			<label for="chat_prefix">Prefix Czatu</label>
			<input type="text" class="form-control" id="chat_prefix" name="chat_prefix" placeholder="Prefix Chatu" value="<?php echo $_smarty_tpl->tpl_vars['ADMIN_DATA']->value['chat_prefix'];?>
">
		</div>

		<div class="form-group">
			<label for="chat_prefix">Kolor Chatu</label>
			<input type="text" class="form-control" id="chat_color" name="chat_color" placeholder="Kolor Chatu" value="<?php echo $_smarty_tpl->tpl_vars['ADMIN_DATA']->value['chat_color'];?>
">
		</div>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SERVERS']->value, 'server');
foreach ($_from as $_smarty_tpl->tpl_vars['server']->value) {
$_smarty_tpl->tpl_vars['server']->_loop = true;
$__foreach_server_0_saved = $_smarty_tpl->tpl_vars['server'];
?>
		<div class="checkbox">
			<label>
				<input class="checkbox-server" id="checkbox-<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
" type="checkbox" name="servers[<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
]" <?php if ($_smarty_tpl->tpl_vars['ADMIN_SPECIFIC']->value[$_smarty_tpl->tpl_vars['server']->value['server_id']]['flags']) {?>value="1" checked<?php } else { ?>value="0"<?php }?>> <?php echo $_smarty_tpl->tpl_vars['server']->value['server_name'];?>

				<input id="checkbox-<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
-hidden" type="hidden" name="servers[<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
]" value="0" <?php if ($_smarty_tpl->tpl_vars['ADMIN_SPECIFIC']->value[$_smarty_tpl->tpl_vars['server']->value['server_id']]['flags']) {?>disabled<?php }?>>
				<?php ob_start();
echo $_smarty_tpl->tpl_vars['ADMIN_SPECIFIC']->value[$_smarty_tpl->tpl_vars['server']->value['server_id']]['flags'];
$_prefixVariable1=ob_get_clean();
if ($_smarty_tpl->tpl_vars['ADMIN_SPECIFIC']->value && $_prefixVariable1) {?>
					<input type="text" class="form-control" id="checkbox-<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
-flags" name="servers_perms[<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
]" placeholder="Flagi" value="<?php echo $_smarty_tpl->tpl_vars['ADMIN_SPECIFIC']->value[$_smarty_tpl->tpl_vars['server']->value['server_id']]['flags'];?>
">
				<?php } else { ?>
					<input type="text" class="form-control" id="checkbox-<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
-flags" name="servers_perms[<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
]" placeholder="Flagi" value="" style="display: none;">
				<?php }?>
			</label>
		</div>
		<?php
$_smarty_tpl->tpl_vars['server'] = $__foreach_server_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
		<?php echo '<script'; ?>
>
			$('.checkbox-server').click(function (){
				if(this.value == 1){
					this.value = 0;
					$("#" + this.id + "-hidden").removeAttr("disabled");
					$("#" + this.id + "-flags").hide();
				} else {
					this.value = 1;
					$("#" + this.id + "-hidden").attr('disabled', 'disabled');
					$("#" + this.id + "-flags").show();
				}

			});

		<?php echo '</script'; ?>
>

		<button type="submit" class="btn btn-warning">Zapisz</button>
	</form>
</div>
<div class="divider"></div>
<div class="c-block" id="inline">
<a href="/?p=admins&return_admin_id=<?php echo $_GET['admin_id'];?>
" style="text-align: center;" class="btn btn-block btn-success">Powrót</a>
</div>
<?php }
$_smarty_tpl->_subTemplateRender("file:_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
