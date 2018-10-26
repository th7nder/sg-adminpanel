<?php

$site_details = Array("title" => "Reklamy", "tpl" => "adverts"); 

$smarty->assign("ADVERTS", Game::getAdverts());
$smarty->assign("SERVERS", Game::getServersAdverts());

if(isset($_GET['return_message'])){
	switch(str_replace("/", "", $_GET['return_message'])){
		case "successful_delete":
		{
			$msg->add("success", "Pomyślnie usunięto reklamę.");
			break;
		}
		
		case "unsuccessful_delete":
		{
			$msg->add("error", "Coś poszło nie tak podczas usuwania rekalmy.");
			break;
		}
		
		case "noperms":
		{
			$msg->add("error", "Nie masz uprawnień żeby to zrobić!");
			break;
		}
		
		case "successful_add":
		{
			$msg->add("success", "Pomyślnie dodano reklame");
			break;
		}
	}
}