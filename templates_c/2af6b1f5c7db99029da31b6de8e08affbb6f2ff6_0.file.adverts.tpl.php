<?php
/* Smarty version 3.1.30-dev/52, created on 2017-09-02 15:32:00
  from "/srv/www/sites/master.serwery-go.pl/templates/adverts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_59aab2d02216d3_72857154',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2af6b1f5c7db99029da31b6de8e08affbb6f2ff6' => 
    array (
      0 => '/srv/www/sites/master.serwery-go.pl/templates/adverts.tpl',
      1 => 1501482073,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_header.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_59aab2d02216d3_72857154 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="c-block">
	<h3 class="block-title">Opcje formatowania</h3>
	
	<p>
	  {DEFAULT}<br>
	  {RED}<br>
	  {TEAM}<br>
	  {GREEN}<br>
	  {LIME}<br>
	  {LIGHTGREEN}<br>
	  {LIGHTRED}<br>
	  {GRAY}<br>
	  {LIGHTOLIVE}<br>
	  {OLIVE}<br>
	  {PURPLE}<br>
	  {LIGHTGRAY}<br>
	  {LIGHTBLUE}<br>
	  {BLUE}<br>
	  {PINK}<br>
	  <br>
	  {TIMELEFT}<br>
	  {CURRENT_MAP}
	  </p>
	 
</div>
<div class="c-block" id="addAdmin">
	<h3 class="block-title">Dodaj Reklame</h3>
	<form method="POST" action="/?p=handler&action=add_advert" role="form">
		<div class="form-group">
			<label for="server">Serwer </label>
			<select name="server" class="select">
				<option value="0">Globalnie</option>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SERVERS']->value, 'server');
foreach ($_from as $_smarty_tpl->tpl_vars['server']->value) {
$_smarty_tpl->tpl_vars['server']->_loop = true;
$__foreach_server_0_saved = $_smarty_tpl->tpl_vars['server'];
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['server']->value['server_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['server']->value['server_name'];?>
</option>
				<?php
$_smarty_tpl->tpl_vars['server'] = $__foreach_server_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
				
			</select>
		</div>
		<div class="form-group">
			<label for="advert_text">Treść</label>
			<input type="text" class="form-control" id="advert_text" name="advert_text" placeholder="Treść" required>
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
	<h3 class="block-title">Reklamy na serwerach</h3>
	<div class="table-responsive">
		<table class="table table-bordered table-hover"> 
			<thead>
				<tr>
					<th>Serwer</th>
					<th>Treść</th>  
					<th>Akcja</th>
				</tr>
			</thead>
			<tbody>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ADVERTS']->value, 'advert');
foreach ($_from as $_smarty_tpl->tpl_vars['advert']->value) {
$_smarty_tpl->tpl_vars['advert']->_loop = true;
$__foreach_advert_1_saved = $_smarty_tpl->tpl_vars['advert'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['advert']->value['server'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['advert']->value['text'];?>
</td>
					<td style="text-align: center;"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/?p=handler&action=delete_advert&advert_id=<?php echo $_smarty_tpl->tpl_vars['advert']->value['id'];?>
" class="btn btn-danger">Usuń</a></td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['advert'] = $__foreach_advert_1_saved;
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
