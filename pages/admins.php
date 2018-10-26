<?php

$site_details = Array("title" => "Administracja", "tpl" => "admins");

$smarty->assign("ADMINS", Game::getGlobalAdminList());

if(isset($_GET['return_message'])){
	switch(str_replace("/", "", $_GET['return_message'])){
		case "successful_delete":
		{
			$msg->add("success", "Pomyślnie usunięto uprawnienia");
			break;
		}
		
		case "unsuccessful_delete":
		{
			$msg->add("error", "Coś poszło nie tak podczas usuwania uprawnień.");
			break;
		}
		
		case "noperms":
		{
			$msg->add("error", "Nie masz uprawnień żeby to zrobić!");
			break;
		}
		
		case "successful_add":
		{
			$msg->add("success", "Pomyślnie dodano admina");
			break;
		}
	}
}

if(isset($_GET['return_admin_id'])){
	$smarty->assign("RETURN_ADMIN_ID", $_GET['return_admin_id']);
}
