<?php
/* Smarty version 3.1.30-dev/52, created on 2017-09-02 15:30:22
  from "/srv/www/sites/master.serwery-go.pl/templates/admins.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_59aab26e3070c3_45240666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '718088b782fe2bfdf41bfecf6e676bf12d71ff43' => 
    array (
      0 => '/srv/www/sites/master.serwery-go.pl/templates/admins.tpl',
      1 => 1470790460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_header.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_59aab26e3070c3_45240666 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="c-block" id="addAdmin">
	<h3 class="block-title">Dodaj Admina</h3>
	<form class="form-inline" method="POST" action="/?p=handler&action=add" role="form">
		<div class="form-group">
			<label class="sr-only" for="playerName">Gracz: </label>
			<input type="text" class="form-control" id="playerName" name="name" placeholder="Nick" required>
		</div>
		<div class="form-group">
			<label class="sr-only" for="playerAuth">SteamID</label>
			<input type="text" class="form-control" id="playerAuth" name="authid" placeholder="STEAM_1:*" required>
		</div>

		<div class="form-group">
			<label class="sr-only" for="playerFlags">Globalne Flagi</label>
			<input type="text" class="form-control" id="playerFlags" name="flags" placeholder="Globalne Flagi">
		</div>

		<div class="form-group">
			<label class="sr-only" for="playerImmunity">Immunitet</label>
			<input type="text" class="form-control" id="playerImmunity" name="immunity" placeholder="Immunitet" required>
		</div>

		<button type="submit" class="btn btn-sm btn-gr-gray">Dodaj</button>
	</form>
</div>
<div class="divider"></div>
<div class="c-block" id="adminList">
	<h3 class="block-title">Lista Adminów</h3>
	<div class="table-responsive">
		<table class="table table-bordered table-hover" style="border-collapse:collapse;">
			<thead>
				<tr>
					<th>Admin ID</th>
					<th>Nick</th>
					<th>SteamID</th>
					<th>Profil Steam</th>
					<th>Globalne Flagi</th>
					<th>Immunitet</th>
					<th>Prefix</th>
					<th>Kolor czatu</th>
					<th>Akcja</th>
				</tr>
			</thead>
			<tbody>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ADMINS']->value, 'admin');
foreach ($_from as $_smarty_tpl->tpl_vars['admin']->value) {
$_smarty_tpl->tpl_vars['admin']->_loop = true;
$__foreach_admin_0_saved = $_smarty_tpl->tpl_vars['admin'];
?>
				<tr data-toggle="collapse" data-target="#<?php echo $_smarty_tpl->tpl_vars['admin']->value['admin_id'];?>
-toggle" id="<?php echo $_smarty_tpl->tpl_vars['admin']->value['admin_id'];?>
-toclick" class="ajaxBUTTON">
					<td><?php echo $_smarty_tpl->tpl_vars['admin']->value['admin_id'];?>
</td>
					<td><b><?php echo $_smarty_tpl->tpl_vars['admin']->value['name'];?>
<b></td>
					<td><?php echo $_smarty_tpl->tpl_vars['admin']->value['authid'];?>
</td>
					<td><a href="<?php echo $_smarty_tpl->tpl_vars['admin']->value['community_link'];?>
">Przejdź do Steam</a></td>
					<td><?php echo $_smarty_tpl->tpl_vars['admin']->value['flags'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['admin']->value['immunity'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['admin']->value['chat_prefix'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['admin']->value['chat_color'];?>
</td>
					<td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/?p=handler&action=delete&admin_id=<?php echo $_smarty_tpl->tpl_vars['admin']->value['admin_id'];?>
" class="btn btn-danger">Usuń</a> / <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/?p=edit&admin_id=<?php echo $_smarty_tpl->tpl_vars['admin']->value['admin_id'];?>
" class="btn btn-warning">Edytuj</a></td>

				</tr>
				<tr>
					<td colspan="7" class="hiddenRow"><div class="collapse in ajaxBUTTON" id="<?php echo $_smarty_tpl->tpl_vars['admin']->value['admin_id'];?>
-toggle"></div></td>
				</tr>



			<?php
$_smarty_tpl->tpl_vars['admin'] = $__foreach_admin_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
			<?php echo '<script'; ?>
>
					var toggled = false;
					var loading = false;

					function onClick(){
						if(toggled == false){
							var target = $(this).data("target");
							var target_url = target.replace("-toggle", "");
							target_url = target_url.replace("#", "");
							$(target).html("Ładowanie...");
							loading = true;
							$.ajax({
								type: "POST",
								url: "/?p=specific&admin_id=" + target_url,
								dataType: "html",
								success: function(msg){
										$(target).html(msg);
										loading = false;
										toggled = false;
								}

							});
							toggled = true;
						} else {
							var target = $(this).data("target");
							$(target).html("");
							toggled = false;
						}
					}

					$('.ajaxBUTTON').click(onClick);


				<?php echo '</script'; ?>
>
			</tbody>
		</table>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
