<?php

class Session{
	private $ses_lifetime = 3600;
	
	public function Login($id, $name, $remember = false){
		global $mysqli, $msg;
		session_destroy();
		session_start();
		$session_id = session_id();
		
		if($session_id != NULL && $session_id != "" && !empty($session_id) && strlen($session_id) > 0){
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name'] = $name;
			$ip = $_SERVER['REMOTE_ADDR'];
			$hash = md5(sha1("th7.eu".$id.$name.$ip));
			if($remember){
				setcookie("login",$hash,time()+3600*24*365,'/','.th7.eu');
				$insert = $mysqli->query("INSERT INTO `sessions` 
									(`id_session`,`id_user`,`user_ip`,`session_last_active`,`hash`,`remember_me`) 
									VALUES ('{$session_id}',{$uid},INET_ATON('{$ip}'),NOW(),'{$hash}','true') 
									-- Session.class Login");
			
			} else {
				$insert = $mysqli->query("INSERT INTO `sessions` 
										(`id_session`,`id_user`,`user_ip`,`session_last_active`,`hash`)
										VALUES ('{$session_id}', {$id}, INET_ATON('{$ip}'), NOW(), '{$hash}')
										-- Session.class Login");
			}
			
			if($insert) {
				return true;
			} else {
				$msg->add("error", $mysqli->error);
				return false;
			}
		} else {
			$msg->add("error", "session_last");
			return false;
		}
	}
	
		public static function isLogged() {
		global $mysqli; 
		$session_id = session_id();
		if(isset($_SESSION['user_id']) && strlen($_SESSION['user_id']) > 0 && $session_id != NULL && $session_id != "" && !empty($session_id)  && strlen($session_id) > 0) {
			$ip = $_SERVER['REMOTE_ADDR'];
			$id_user = (int)$_SESSION['user_id'];
			$check = $mysqli->query("SELECT count(`id`) as count FROM `sessions` 
			WHERE `id_user` = {$id_user} AND (`session_last_active`>=DATE_SUB(NOW(), INTERVAL 3600 SECOND) OR `remember_me`='true') ")->fetch_array();
			if($check['count'] > 0){
				$session_id = session_id();
				$update = $mysqli->query("UPDATE `sessions` SET `session_last_active` = NOW() WHERE  `id_user` = {$id_user} AND (`session_last_active`>=DATE_SUB(NOW(), INTERVAL 3600 SECOND) OR `remember_me`='true') ");
				return (int) $id_user;
				if(isset($_COOKIE['login'])){
					setcookie("login",$_COOKIE['login'],time()+3600*24*365,'/','.th7.eu');
				}
			}else{
				session_destroy(); 
				if(isset($_COOKIE['login'])){
					$hash = $mysqli->real_escape_string($_COOKIE['login']);
					$check = $mysqli->query("SELECT id_user, count(`id`) as count FROM `sessions` 
					WHERE `hash` = '{$hash}'")->fetch_array();
					if($check['count'] > 0){
						session_start();
						$_SESSION['user_id'] = (int)$check['id_user'];
						$udata = $mysqli->query("SELECT login FROM web_data_mc-derox`.`users WHERE id = {$_SESSION['user_id']}")->fetch_array();
						$_SESSION['user_name'] = $udata['login'];
						$session_id = session_id();
						$ip = $_SERVER['REMOTE_ADDR'];
						$insert = $mysqli->query("INSERT INTO `sessions` 
											(`id_session`,`id_user`,`user_ip`,`session_last_active`,`hash`,`remember_me`) 
											VALUES ('{$session_id}',{$_SESSION['user_id']},INET_ATON('{$ip}'),NOW(),'{$hash}','true') 
											-- Session.class Login");
						return (int) $_SESSION['user_id'];
						setcookie("login",$hash,time()+3600*24*365,'/','.th7.eu');
					}else{
						setcookie("login","logout",time()-1,'/','.th7.eu');
						return false;
					}
				}else{
					return false;
				}
			}
		}elseif(isset($_COOKIE['login'])){
			$hash = $mysqli->real_escape_string($_COOKIE['login']);
			$check = $mysqli->query("SELECT id_user, count(`id`) as count FROM `sessions` 
			WHERE `hash` = '{$hash}'")->fetch_array();
			if($check['count'] > 0){
				$_SESSION['user_id'] = (int)$check['id_user'];
				$udata = $mysqli->query("SELECT login FROM `users` WHERE id = {$_SESSION['user_id']}")->fetch_array();
				$_SESSION['user_name'] = $udata['login'];
				$session_id = session_id();
				$ip = $_SERVER['REMOTE_ADDR'];
				$insert = $mysqli->query("INSERT INTO `sessions` 
									(`id_session`,`id_user`,`user_ip`,`session_last_active`,`hash`,`remember_me`) 
									VALUES ('{$session_id}',{$_SESSION['user_id']},INET_ATON('{$ip}'),NOW(),'{$hash}','true') 
									-- Session.class Login");
				return (int) $_SESSION['user_id'];
				setcookie("login",$hash,time()+3600*24*365,'/','.th7.eu');
			}else{
				setcookie("login","logout",time()-1,'/','.th7.eu');
				session_destroy(); 
				return false;
			}
		} else {
			return false;
		}
	}

	public static function setLang($lang) {
		$_SESSION["lang"] = $lang;
	}

	public static function getLang() {
		if(isset($_SESSION["lang"])) {
			return $_SESSION["lang"];
		} else {
			return false;
		}
	}

	public function Logout($redirect = true) {
		session_destroy(); 
		if(isset($_COOKIE['login'])){
			setcookie("login","logout",time()-1,'/','.th7.eu');
		}
		
		if ($redirect){
			die(redirect(SITE_URL));
		}
	}
}