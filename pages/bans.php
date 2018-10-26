<?php

$site_details = Array("title" => "Bany", "tpl" => "bans"); 

$smarty->assign("BAN_REASONS", Game::getBanReasons());
$smarty->assign("SERVERS", Game::getServersAdverts());
$smarty->assign("BANS", Game::getBans());

if(isset($_GET['return_message'])){
	switch(str_replace("/", "", $_GET['return_message'])){
		case "successful_delete":
		{
			$msg->add("success", "Pomyślnie usunięto.");
			break;
		}
		
		case "unsuccessful_delete":
		{
			$msg->add("error", "Coś poszło nie tak podczas usuwania.");
			break;
		}
		
		case "noperms":
		{
			$msg->add("error", "Nie masz uprawnień żeby to zrobić!");
			break;
		}
		
		case "successful_add":
		{
			$msg->add("success", "Pomyślnie dodano.");
			break;
		}
	}
}