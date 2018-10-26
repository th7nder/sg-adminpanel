{include file='_header.tpl'}
{if !$ADMIN_DATA or !$SERVERS}
	Brak specyficznych uprawnień.
{else}

<div class="c-block" id="adminEdit">
	<h3 class="block-title">Edycja globalnych uprawnień dla gracza o ID {$ADMIN_DATA.admin_id}</h3>
	<form method="POST" action="/?p=handler&action=edit&admin_id={$smarty.get.admin_id}" role="form">
		<div class="form-group">
			<label for="name">Gracz</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Nick Gracza" value="{$ADMIN_DATA.name}" required>
		</div>
		<div class="form-group">
			<label for="steamid">SteamID</label>
			<input type="text" class="form-control" id="authid" name="authid" placeholder="SteamID" value="{$ADMIN_DATA.authid}" required>
		</div>

		<div class="form-group">
			<label for="steamid">Globalne Flagi</label>
			<input type="text" class="form-control" id="flags" name="flags" placeholder="Globalne Flagi" value="{$ADMIN_DATA.flags}">
		</div>

		<div class="form-group">
			<label for="steamid">Immunitet</label>
			<input type="text" class="form-control" id="immunity" name="immunity" placeholder="Immunitet" value="{$ADMIN_DATA.immunity}" required>
		</div>

		<div class="form-group">
			<label for="chat_prefix">Prefix Czatu</label>
			<input type="text" class="form-control" id="chat_prefix" name="chat_prefix" placeholder="Prefix Chatu" value="{$ADMIN_DATA.chat_prefix}">
		</div>

		<div class="form-group">
			<label for="chat_prefix">Kolor Chatu</label>
			<input type="text" class="form-control" id="chat_color" name="chat_color" placeholder="Kolor Chatu" value="{$ADMIN_DATA.chat_color}">
		</div>

		{foreach $SERVERS as $server}
		<div class="checkbox">
			<label>
				<input class="checkbox-server" id="checkbox-{$server.server_id}" type="checkbox" name="servers[{$server.server_id}]" {if $ADMIN_SPECIFIC.{$server.server_id}.flags}value="1" checked{else}value="0"{/if}> {$server.server_name}
				<input id="checkbox-{$server.server_id}-hidden" type="hidden" name="servers[{$server.server_id}]" value="0" {if $ADMIN_SPECIFIC.{$server.server_id}.flags}disabled{/if}>
				{if $ADMIN_SPECIFIC and {$ADMIN_SPECIFIC.{$server.server_id}.flags}}
					<input type="text" class="form-control" id="checkbox-{$server.server_id}-flags" name="servers_perms[{$server.server_id}]" placeholder="Flagi" value="{$ADMIN_SPECIFIC.{$server.server_id}.flags}">
				{else}
					<input type="text" class="form-control" id="checkbox-{$server.server_id}-flags" name="servers_perms[{$server.server_id}]" placeholder="Flagi" value="" style="display: none;">
				{/if}
			</label>
		</div>
		{/foreach}
		<script>
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

		</script>

		<button type="submit" class="btn btn-warning">Zapisz</button>
	</form>
</div>
<div class="divider"></div>
<div class="c-block" id="inline">
<a href="/?p=admins&return_admin_id={$smarty.get.admin_id}" style="text-align: center;" class="btn btn-block btn-success">Powrót</a>
</div>
{/if}
{include file='_footer.tpl'}
