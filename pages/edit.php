<?php

$site_details = Array("title" => "Specific Data", "tpl" => "edit");

$smarty->assign("ADMIN_DATA", Game::getAdminData(str_replace("/", "", $_GET['admin_id'])));
$smarty->assign("ADMIN_SPECIFIC", Game::getSpecificData(str_replace("/", "", $_GET['admin_id'])));
$smarty->assign("SERVERS", Game::getServers());

if(isset($_GET['return_message'])){
	switch(str_replace("/", "", $_GET['return_message'])){
		case "successful_modify":
		{
			$msg->add("success", "Pomyślnie zedytowano uprawnienia"); 
			break;
		}
	}
}