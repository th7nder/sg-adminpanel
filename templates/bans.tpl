{include file='_header.tpl'}

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
			{foreach $BANS as $ban}
				<tr {if $ban.duration == 0}class="dark"{/if}{if $ban.removed}{if $ban.removed_by}class="yellow"{else}class="green"{/if}{/if}>
					<td>{$ban.name}</td>
					<td>{$ban.authid}</td>
					<td>{$ban.server_id}</td>
					<td>{$ban.ip}</td>
					<td>{$ban.start}</td>
					<td>{$ban.end}</td>
					<td>{$ban.duration} min</td>
					<td>{$ban.reason}</td>
					<td>{$ban.admin_name}</td>
					<td>{$ban.admin_authid}</td>
					<td>{if $ban.removed}Tak{else}Nie{/if}</td>
					<td>{if $ban.removed}{if $ban.removed_by}{$ban.removed_by}{else}Wygasł{/if}{/if}</td>
				</tr>
			{/foreach}
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
				{foreach $SERVERS as $server}
					<option value="{$server.server_id}">{$server.server_name}</option>
				{/foreach}
				
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
			{foreach $BAN_REASONS as $reason}
				<tr>
					<td>{$reason.server}</td>
					<td>{$reason.reason}</td>
					<td style="text-align: center;"><a href="{$SITE_URL}/?p=handler&action=delete_ban_reason&ban_reason_id={$reason.id}" class="btn btn-danger">Usuń</a></td>
				</tr>
			{/foreach}
			</tbody>
		</table>
	</div>
</div>
{include file='_footer.tpl'}