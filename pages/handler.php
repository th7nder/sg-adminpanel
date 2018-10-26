<?php

$site_details = Array("title" => "Handler", "tpl" => "handler");


switch(str_replace("/", "", $_GET['action'])){


	case "delete":
	{
		$data = 'deleteAdmin::'.$_GET['admin_id'];
		WWW::insertToLogs($userData['id'], $data);
		if(Game::deleteAdmin($_GET['admin_id'])){
			redirect(SITE_URL."/?p=admins&return_message=successful_delete");
		} else {
			redirect(SITE_URL."/?p=admins&return_message=unsuccessful_delete");
		}

		break;
	}

	case "edit":
	{
		$data = 'modifyAdminPrivileges::'.$_GET['admin_id'].'|'.$_POST['name'].'|'.$_POST['authid'].'|'.$_POST['flags'].'|'.$_POST['immunity'].'|'.implode(',', $_POST['servers']).'|'.implode(',', $_POST['servers_perms']);
		WWW::insertToLogs($userData['id'], $data);
		if(Game::modifyAdminPrivileges($_GET['admin_id'], $_POST['name'], $_POST['authid'], $_POST['flags'], $_POST['immunity'], $_POST['servers'], $_POST['servers_perms'], $_POST['chat_prefix'], $_POST['chat_color'])){
			redirect(SITE_URL."/?p=edit&admin_id={$_GET['admin_id']}&return_message=successful_modify");
		} else {
			redirect(SITE_URL."/?p=admins&return_message=noperms");
		}

		break;
	}

	case "add":
	{
		$data = 'insertAdmin::'.$_POST['name'].'|'.$_POST['authid'].'|'.$_POST['flags'].'|'.$_POST['immunity'];
		WWW::insertToLogs($userData['id'], $data);
		if(Game::insertAdmin($_POST['name'], $_POST['authid'], $_POST['flags'], $_POST['immunity'])){
			redirect(SITE_URL."/?p=admins&return_message=successful_add");
		} else {
			redirect(SITE_URL."/?p=admins&return_message=noperms");
		}

		break;
	}

	case "add_advert":
	{
		$data = 'insertAdvert::'.$_POST['server'].'|'.$_POST['advert_text'];
		WWW::insertToLogs($userData['id'], $data);
		if(Game::insertAdvert($_POST['server'], $_POST['advert_text'])){
			redirect(SITE_URL."/?p=adverts&return_message=successful_add");
		} else {
			redirect(SITE_URL."/?p=adverts&return_message=noperms");
		}

		break;
	}

	case "delete_advert":
	{
		$data = 'deleteAdvert::'.$_GET['advert_id'];
		WWW::insertToLogs($userData['id'], $data);
		if(Game::deleteAdvert($_GET['advert_id'])){
			redirect(SITE_URL."/?p=adverts&return_message=successful_delete");
		} else {
			redirect(SITE_URL."/?p=adverts&return_message=noperms");
		}

		break;
	}


	case "add_ban_reason":
	{
		$data = 'insertBanReason::'.$_POST['server'].'|'.$_POST['ban_reason'];
		WWW::insertToLogs($userData['id'], $data);
		if(Game::insertBanReason($_POST['server'], $_POST['ban_reason'])){
			redirect(SITE_URL."/?p=bans&return_message=successful_add");
		} else {
			redirect(SITE_URL."/?p=bans&return_message=noperms");
		}

		break;
	}

	case "delete_ban_reason":
	{
		$data = 'deleteBanReason::'.$_GET['ban_reason_id'];
		WWW::insertToLogs($userData['id'], $data);
		if(Game::deleteBanReason($_GET['ban_reason_id'])){
			redirect(SITE_URL."/?p=bans&return_message=successful_delete");
		} else {
			redirect(SITE_URL."/?p=bans&return_message=noperms");
		}

		break;
	}
}
