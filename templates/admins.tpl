{include file='_header.tpl'}
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
			{foreach $ADMINS as $admin}
				<tr data-toggle="collapse" data-target="#{$admin.admin_id}-toggle" id="{$admin.admin_id}-toclick" class="ajaxBUTTON">
					<td>{$admin.admin_id}</td>
					<td><b>{$admin.name}<b></td>
					<td>{$admin.authid}</td>
					<td><a href="{$admin.community_link}">Przejdź do Steam</a></td>
					<td>{$admin.flags}</td>
					<td>{$admin.immunity}</td>
					<td>{$admin.chat_prefix}</td>
					<td>{$admin.chat_color}</td>
					<td><a href="{$SITE_URL}/?p=handler&action=delete&admin_id={$admin.admin_id}" class="btn btn-danger">Usuń</a> / <a href="{$SITE_URL}/?p=edit&admin_id={$admin.admin_id}" class="btn btn-warning">Edytuj</a></td>

				</tr>
				<tr>
					<td colspan="7" class="hiddenRow"><div class="collapse in ajaxBUTTON" id="{$admin.admin_id}-toggle"></div></td>
				</tr>



			{/foreach}
			<script>
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


				</script>
			</tbody>
		</table>
	</div>
</div>
{include file='_footer.tpl'}
