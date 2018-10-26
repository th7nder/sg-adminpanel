{include file='_messages.tpl'}
{if !$ADMIN_SPECIFIC}
	Brak specyficznych uprawnień.
{else}
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID Serwera</th>
					<th>Serwer</th>
					<th>Flagi</th>
				</tr>
			</thead>
			<tbody>
			{foreach $ADMIN_SPECIFIC as $admin}
				<tr style="text-align: center;">
					<td>{$admin.server_id}</td>
					<td><b>{$admin.server}</b></td>
					<td>{$admin.flags}</td>
					<!-- <td><a href="{$SITE_URL}/?p=handler&action=delete_specific&admin_id={$admin.admin_id}&server_id={$admin.server_id}" class="btn btn-danger">Usuń</a> / <a href="{$SITE_URL}/?p=edit_specific&admin_id={$admin.admin_id}&server_id={$admin.server_id}" class="btn btn-warning">Edytuj</a></td> -->
				</tr>
			{/foreach}
			</tbody>
		</table>
	</div>
{/if}