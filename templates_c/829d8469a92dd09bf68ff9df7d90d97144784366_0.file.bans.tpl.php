<?php
/* Smarty version 3.1.30-dev/52, created on 2017-09-02 15:32:00
  from "/srv/www/sites/master.serwery-go.pl/templates/bans.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_59aab2d0b16132_36416779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '829d8469a92dd09bf68ff9df7d90d97144784366' => 
    array (
      0 => '/srv/www/sites/master.serwery-go.pl/templates/bans.tpl',
      1 => 1458240241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_header.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_59aab2d0b16132_36416779 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="c-block">
	<style>
		table {
			font-size: 13px;
			font-family: Actor;
			color: #333;
		}
	</style>
	<h3 class="block-title">Lista Banów</h3>
	<div class="table-responsive">
		<table class="table table-bordered table-hover"> 
			<thead>
				<tr>
					<th>Zbanowany</th>
					<th>SteamID</th>  
					<th>Serwer</th>
					<th>IP</th>
					<th>Początek</th>
					<th>Koniec</th>
					<th>Czas</th>
					<th>Powód</th>
					<th>Admin</th>
					<th>Admin SID</th>
					<th>Odbanowany?</th>
					<th>Jak?</th>
				</tr>
			</thead>
			<tbody>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BANS']->value, 'ban');
foreach ($_from as $_smarty_tpl->tpl_vars['ban']->value) {
$_smarty_tpl->tpl_vars['ban']->_loop = true;
$__foreach_ban_0_saved = $_smarty_tpl->tpl_vars['ban'];
?>
				<tr <?php if ($_smarty_tpl->tpl_vars['ban']->value['duration'] == 0) {?>class="dark"<?php }
if ($_smarty_tpl->tpl_vars['ban']->value['removed']) {
if ($_smarty_tpl->tpl_vars['ban']->value['removed_by']) {?>class="yellow"<?php } else { ?>class="green"<?php }
}?>>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['authid'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['server_id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['ip'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['start'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['end'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['duration'];?>
 min</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['reason'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['admin_name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['ban']->value['admin_authid'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['ban']->value['removed']) {?>Tak<?php } else { ?>Nie<?php }?></td>
					<td><?php if ($_smarty_tpl->tpl_vars['ban']->value['removed']) {
if ($_smarty_tpl->tpl_vars['ban']->value['removed_by']) {
echo $_smarty_tpl->tpl_vars['ban']->value['removed_by'];
} else { ?>Wygasł<?php }
}?></td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['ban'] = $__foreach_ban_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
			</tbody>
		</table>
	</div>
</div>
<div class="divider"></div>
<div class="c-block" id="addAdmin">
	<h3 class="block-title">Dodaj powód bana</h3>
	<form method="POST" action="/?p=handler&action=add_ban_reason" role="form">
		<div class="form-group">
			<label for="server">Serwer </label>
			<select name="server" class="select">
				<option value="0">Globalnie</option>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SERVERS']->value, 'server');
foreach ($_from as $_smarty_tpl->tpl_vars['server']->value) {
$_smarty_tpl->tpl_vars['server']->_loop = true;
$__foreach_server_1_saved = $_smarty_tpl->tpl_vars['server'];
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['server']->value['server_name'];?>
</option>
				<?php
$_smarty_tpl->tpl_vars['server'] = $__foreach_server_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
				
			</select>
		</div>
		<div class="form-group">
			<label for="advert_text">Powód</label>
			<input type="text" class="form-control" id="ban_reason" name="ban_reason" placeholder="Powód" required>
		</div>
		
		<button type="submit" class="btn btn-sm btn-gr-gray">Dodaj</button>
	</form>
</div>
<div class="divider"></div>
<div class="c-block">
	<style>
		table {
			font-size: 13px;
			font-family: Actor;
			color: #333;
		}
	</style>
	<h3 class="block-title">Powody banów</h3>
	<div class="table-responsive">
		<table class="table table-bordered table-hover"> 
			<thead>
				<tr>
					<th>Serwer</th>
					<th>Powód</th>  
					<th>Akcja</th>
				</tr>
			</thead>
			<tbody>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BAN_REASONS']->value, 'reason');
foreach ($_from as $_smarty_tpl->tpl_vars['reason']->value) {
$_smarty_tpl->tpl_vars['reason']->_loop = true;
$__foreach_reason_2_saved = $_smarty_tpl->tpl_vars['reason'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['reason']->value['server'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['reason']->value['reason'];?>
</td>
					<td style="text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/?p=handler&action=delete_ban_reason&ban_reason_id=<?php echo $_smarty_tpl->tpl_vars['reason']->value['id'];?>
" class="btn btn-danger">Usuń</a></td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['reason'] = $__foreach_reason_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
			</tbody>
		</table>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
