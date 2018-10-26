<?php

$site_details = Array("title" => "Login", "tpl" => "login");
if(isset($_POST['login']) && isset($_POST['password'])){
	if(Account::Check(false,$_POST['login'])){
		$loginData = Account::Login($_POST['login'],$_POST['password']);
		if($loginData !== false){
			if(Session::Login($loginData['id'],$loginData['login'])){
				if(isset($_POST['redirect']) && !empty($_POST['redirect']) && $_POST['redirect'] !== NULL){
					redirect($_POST['redirect']);
				}else{
					redirect("/");
				}
			}else{
				$msg->add("error", "Błąd sesji.");
			}
		}else{
			$msg->add("error", "Błąd logowania.");
		}
	}else{
		$msg->add("error", "Błąd logowania.");
	}
}