<?php

require_once("../libs/Smarty/Smarty.class.php");
require_once("../configs/config.php");
require_once("../libs/functions.php");
require_once("../libs/www.class.php");
require_once("../libs/validation.class.php");
require_once("../libs/account.class.php");
require_once("../libs/session.class.php");
require_once("../libs/messages.class.php");
require_once("../libs/pagination.class.php");
require_once("../libs/steam.class.php");
require_once("../libs/game.class.php");
require_once("../libs/shop.class.php");
session_start();
if(MAINTENANCE_BREAK){
    die("Przerwa techniczna.");
}

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if($mysqli->connect_error){
    die("<meta charset=\"UTF-8\">Wystąpił błąd. Zgłoś to do th7ndera.");
}

$mysqli_shop = new mysqli(DB_HOST_SHOP, DB_USER_SHOP, DB_PASSWORD_SHOP, DB_NAME_SHOP);
if($mysqli_shop->connect_error){
	die("<meta charset=\"UTF-8\">Wystąpił błąd. Zgłoś to do th7ndera.");
}

$mysqli->set_charset("utf8");
$mysqli->query("SET NAMES utf8");
$mysqli_shop->set_charset("utf8");
$mysqli_shop->query("SET NAMES utf8");
$msg = new Messages();
$val = new Validation();
$pag = new Pagination();

$isLogged = Session::isLogged();
if($isLogged != false){
	$userData = Account::Check($isLogged);
}else{
	$userData['id'] = false;
	$userData['admin'] = false;
}

$smarty = new Smarty();
$smarty->setTemplateDir("../templates");
$smarty->setCompileDir("../templates_c");
$smarty->setCacheDir("../cache");
$smarty->assign("SITE_URL", SITE_URL);
$smarty->assign("STATIC_URL", STATIC_URL);


switch(filterGet($_GET["p"])){
	case "logout":
		Session::Logout();
		redirect(SITE_URL);
	break;

    default:
		if($isLogged != false) {
			require_once("../pages/home.php");
		}
		else {
			require_once("../pages/login.php");
		}
    break;

	case "admins":
	{
		if($isLogged != false && $userData['admin'] != false) {
			require_once("../pages/admins.php");
		} else if($isLogged != false){
			require_once("../pages/login.php");
		} else {
			require_once("../pages/login.php");
		}
		break;
	}

	case "specific":
	{
		if($isLogged != false && $userData['admin'] != false) {
			require_once("../pages/specific.php");
		} else if($isLogged != false){
			require_once("../pages/login.php");
		} else {
			require_once("../pages/login.php");
		}
		break;
	}


	case "handler":
	{
		if($isLogged != false && $userData['admin'] != false) {
			require_once("../pages/handler.php");
		} else if($isLogged != false){
			require_once("../pages/login.php");
		} else {
			require_once("../pages/login.php");
		}
		break;
	}


	case "edit":
	{
		if($isLogged != false && $userData['admin'] != false) {
			require_once("../pages/edit.php");
		} else if($isLogged != false){
			require_once("../pages/login.php");
		} else {
			require_once("../pages/login.php");
		}
		break;
	}

	case "shop":
	{
		if($isLogged != false && $userData['admin'] != false && ($userData['admin'] >= 100 || $userData['id'] == 14 || $userData['id'] == 2)) {
			require_once("../pages/shop.php");
		} else {
			require_once("../pages/login.php");
		}
		break;
	}

	case "adverts":
	{
		if($isLogged != false && $userData['admin'] != false) {
			require_once("../pages/adverts.php");
		} else {
			require_once("../pages/login.php");
		}
		break;
	}

	case "bans":
	{
		if($isLogged != false && $userData['admin'] != false) {
			require_once("../pages/bans.php");
		} else {
			require_once("../pages/login.php");
		}
		break;
	}

}
$smarty->assign("SITE_DETAILS", $site_details);
$smarty->assign("MESSAGES", $msg->get());
$smarty->display($site_details["tpl"].".tpl");
$mysqli->close();
$mysqli_shop->close();
