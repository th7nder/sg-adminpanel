<?php
/* Smarty version 3.1.30-dev/52, created on 2017-09-02 15:32:02
  from "/srv/www/sites/master.serwery-go.pl/templates/shop.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_59aab2d2548d39_49366111',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fe9263f1793ede7767e25b68a1b983e3d5ef9b8' => 
    array (
      0 => '/srv/www/sites/master.serwery-go.pl/templates/shop.tpl',
      1 => 1464546467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_header.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_59aab2d2548d39_49366111 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
	table {
		font-size: 13px;
		font-family: Actor;
		color: #333;
	}
</style>

<div class="c-block">
	<h3 class="block-title">Logi Sklepu</h3>
	<div class="table-responsive">
		<table class="table table-bordered table-hover" style="border-collapse:collapse;color: #000;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Serwer</th>
					<th>SteamID</th>
					<th>Usługa</th>
					<th>Cena</th>
					<th>Czas</th>
					<th>Dostawca</th>
					<th>Usunięto?</th>
				</tr>
			</thead>
			<tbody>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LOGS']->value, 'log');
foreach ($_from as $_smarty_tpl->tpl_vars['log']->value) {
$_smarty_tpl->tpl_vars['log']->_loop = true;
$__foreach_log_0_saved = $_smarty_tpl->tpl_vars['log'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['log']->value['server'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['log']->value['authid'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['log']->value['service'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['log']->value['price'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['log']->value['datetime'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['log']->value['supplier'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['log']->value['deleted'];?>
</td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['log'] = $__foreach_log_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
			</tbody>
		</table>
	</div>
</div>
<div class="divider"></div>
<div class="c-block">
	<h3 class="block-title">Usługi</h3>
	<div class="table-responsive">
		<table class="table table-bordered table-hover" style="border-collapse:collapse;color: #000;">
			<thead>
				<tr>
					<th>123</th>
				<!--	<th>Serwer</th>
					<th>Nazwa Usługi</th>
					<th>Nazwa wyświetlająca</th>
					<th>SMS Pack</th>
					<th>Flagi</th>
					<th>Opis</th>
					<th>Ilość dni</th>
					<th>Cena przelewu</th> -->
				</tr>
			</thead>
			<tbody>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SERVERS']->value, 'server');
foreach ($_from as $_smarty_tpl->tpl_vars['server']->value) {
$_smarty_tpl->tpl_vars['server']->_loop = true;
$__foreach_server_1_saved = $_smarty_tpl->tpl_vars['server'];
?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SERVICES']->value[$_smarty_tpl->tpl_vars['server']->value['id']], 'service');
foreach ($_from as $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->_loop = true;
$__foreach_service_2_saved = $_smarty_tpl->tpl_vars['service'];
?>

				<tr>
					<td>
						<form method="POST" class="form-inline" action="/?p=shop">
							<input type="hidden" name="id-<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
" id="id-<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
">
							<div class="form-group">
								<label for="codename">codename</label>
								<input type="text" class="form-control" id="codename-<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
"  name="codename" value="<?php echo $_smarty_tpl->tpl_vars['server']->value['codename'];?>
">
							</div>

							<div class="form-group">
								<label for="service_name">service_name</label>
								<input type="text" class="form-control" id="service_name-<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
" name="service_name"  value="<?php echo $_smarty_tpl->tpl_vars['service']->value['service_name'];?>
">
							</div>

							<div class="form-group">
								<label for="display_name">display_name</label>
								<input type="text" class="form-control" id="display_name-<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
" name="display_name"  value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['service']->value['display_name'], ENT_QUOTES, 'UTF-8', true);?>
">
							</div>

							<div class="form-group">
								<label for="description">description</label>
								<textarea type="text" class="form-control" name="description"  id="description-<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['service']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
							</div>

							<button type="submit" class="btn btn-default superprzycisk" value="<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
">Edytuj</button>
						</form>

					</td>
				</tr>

				<?php if (false) {?>
				<!-- <tr>
					<td><?php echo $_smarty_tpl->tpl_vars['server']->value['codename'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['service']->value['service_name'];?>
</td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['service']->value['display_name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['service']->value['sms_pack'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['service']->value['flags'];?>
</td>
					<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['service']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['service']->value['days'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['service']->value['transfer_price'];?>
</td>
				</tr>-->
				<?php }?>
				<?php
$_smarty_tpl->tpl_vars['service'] = $__foreach_service_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
			<?php
$_smarty_tpl->tpl_vars['server'] = $__foreach_server_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
			<?php echo '<script'; ?>
>
				$(".superprzycisk").click(function(){

					$("#id-" + this.value).attr("name", "id_curr");
					$("#codename-" + this.value).attr("name", "codename_curr");
					$("#service_name-" + this.value).attr("name", "service_name_curr");
					$("#display_name-" + this.value).attr("name", "display_name_curr");
					$("#description-" + this.value).attr("name", "description_curr");

					alert($("#id-" + this.value).attr("name"));
					return true; 
				});
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
