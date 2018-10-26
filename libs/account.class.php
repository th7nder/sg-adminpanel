<?php

class Account{
	
		public static function Login($login,$password){
			global $mysqli, $val, $msg, $lang;
			$login = $mysqli->real_escape_string($login);
			$val->checkLogin($login, $lang["error"]["login"]);
			if ($val->countError() == 0) {
				$login = $mysqli->real_escape_string($login);
				$password = $mysqli->real_escape_string($password);
				$check = $mysqli->query("SELECT `id`, `login` FROM `accounts` WHERE `login` = '{$login}' AND `password` = PASSWORD('{$password}')");
				if($check){
					if($check->num_rows == 1){
						return $check->fetch_array();
					}else{
						return false;
					}
				}
			}else{
				$msg->add("error", $val->getError());
			}
		}
		
		public static function Register($login, $email, $password, $repassword){
			global $mysqli, $val, $msg, $lang;
			
			$val->checkEmail($email, $lang["error"]["mail"]);
			$val->checkLogin($login, $lang["error"]["login"]);
			$val->compare($password, $repassword, $lang["error"]["passwords"]);
			if ($val->countError() == 0) {
				$login = $mysqli->real_escape_string($login);
				$email = $mysqli->real_escape_string($email);
				$password = $mysqli->real_escape_string($password);
				$login_check = self::check(false, $login);
				if($login_check == false){
					$email_check = self::check(false, false, $email);
					if($email_check == false){
						$ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
						$insert = $mysqli->query("INSERT INTO `accounts` SET 
						`login` = '{$login}', 
						`password` = PASSWORD('{$password}'), 
						`email` = '{$email}', 
						`ip` = '{$ip}'");
						if($insert){
							$msg->add("success", $lang["success"]["register"]);
						}else{
							$msg->add("error", $lang["error"]["register"]);
						}
					}else{
						$msg->add("error", $lang["error"]["mail"]);
					}
				}else{
					$msg->add("error", $lang["error"]["login"]);
				}
			}else{
				$msg->add("error", $val->getError());
			}
		}
		
		public static function Check($id = false, $login = false, $email = false){
			global $mysqli, $msg;
			$q = array();
			if($id != false) {
				$id = (int)$id;
				$q[] = "`id` = {$id}";
			}
			if ($login != false) {
				$login = $mysqli->real_escape_string($login);
				$q[] = "`login` = '{$login}'";
			}
			if ($email != false) {
				$email = $mysqli->real_escape_string($email);
				$q[] = "`email` = '{$email}'";
			}
			$where = implode(" OR ", $q);
			
			$result = $mysqli->query("SELECT * FROM `accounts` WHERE {$where} LIMIT 1");
			if ($result->num_rows > 0) {
				return $result->fetch_assoc();
			} else {
				return false;
			}
		}	
}