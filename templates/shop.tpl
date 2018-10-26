{include file='_header.tpl'}
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
			{foreach $LOGS as $log}
				<tr>
					<td>{$log.id}</td>
					<td>{$log.server}</td>
					<td>{$log.authid}</td>
					<td>{$log.service}</td>
					<td>{$log.price}</td>
					<td>{$log.datetime}</td>
					<td>{$log.supplier}</td>
					<td>{$log.deleted}</td>
				</tr>
			{/foreach}
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
			{foreach $SERVERS as $server}
				{foreach $SERVICES.{$server.id} as $service}

				<tr>
					<td>
						<form method="POST" class="form-inline" action="/?p=shop">
							<input type="hidden" name="id-{$service.id}" id="id-{$service.id}" value="{$service.id}">
							<div class="form-group">
								<label for="codename">codename</label>
								<input type="text" class="form-control" id="codename-{$service.id}"  name="codename" value="{$server.codename}">
							</div>

							<div class="form-group">
								<label for="service_name">service_name</label>
								<input type="text" class="form-control" id="service_name-{$service.id}" name="service_name"  value="{$service.service_name}">
							</div>

							<div class="form-group">
								<label for="display_name">display_name</label>
								<input type="text" class="form-control" id="display_name-{$service.id}" name="display_name"  value="{$service.display_name|escape:'html'}">
							</div>

							<div class="form-group">
								<label for="description">description</label>
								<textarea type="text" class="form-control" name="description"  id="description-{$service.id}">{$service.description|escape:'html'}</textarea>
							</div>

							<button type="submit" class="btn btn-default superprzycisk" value="{$service.id}">Edytuj</button>
						</form>

					</td>
				</tr>

				{if false}
				<!-- <tr>
					<td>{$server.codename}</td>
					<td>{$service.service_name}</td>
					<td>{$service.display_name|escape:'html'}</td>
					<td>{$service.sms_pack}</td>
					<td>{$service.flags}</td>
					<td>{$service.description|escape:'html'}</td>
					<td>{$service.days}</td>
					<td>{$service.transfer_price}</td>
				</tr>-->
				{/if}
				{/foreach}
			{/foreach}
			<script>
				$(".superprzycisk").click(function(){

					$("#id-" + this.value).attr("name", "id_curr");
					$("#codename-" + this.value).attr("name", "codename_curr");
					$("#service_name-" + this.value).attr("name", "service_name_curr");
					$("#display_name-" + this.value).attr("name", "display_name_curr");
					$("#description-" + this.value).attr("name", "description_curr");

					alert($("#id-" + this.value).attr("name"));
					return true; 
				});
			</script>
			</tbody>
		</table>
	</div>
</div>
{include file='_footer.tpl'}
