{include file='_header.tpl'}
<div class="c-block">
	<h3 class="block-title">Opcje formatowania</h3>
	{literal}
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
	 {/literal}
</div>
<div class="c-block" id="addAdmin">
	<h3 class="block-title">Dodaj Reklame</h3>
	<form method="POST" action="/?p=handler&action=add_advert" role="form">
		<div class="form-group">
			<label for="server">Serwer </label>
			<select name="server" class="select">
				<option value="0">Globalnie</option>
				{foreach $SERVERS as $server}
					<option value="{$server.server_id}">{$server.server_name}</option>
				{/foreach}
				
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
			{foreach $ADVERTS as $advert}
				<tr>
					<td>{$advert.server}</td>
					<td>{$advert.text}</td>
					<td style="text-align: center;"><a href="{$SITE_URL}/?p=handler&action=delete_advert&advert_id={$advert.id}" class="btn btn-danger">Usuń</a></td>
				</tr>
			{/foreach}
			</tbody>
		</table>
	</div>
</div>
{include file='_footer.tpl'}