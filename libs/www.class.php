<?php

class WWW {
	public static function getLang() {
		if(isset($_COOKIE['lang'])){
			return addslashes($_COOKIE['lang']);
		} else {
			return SITE_LANG;
		}
	}
	
	public static function setLang($country) {
		$country = trim(strtolower(addslashes($country)));
		if(file_exists(SCRIPT_PATH."/lang/".$country.".lang.php")){ 
			setcookie("lang", $country, time()+3600*24*365, "/", ".th7.eu");
		} else {
			setcookie("lang", DEFAULT_LANG, time()+3600*24*365, "/", ".th7.eu");
		}
	}
	
	public static function insertToLogs($admin_id, $data){
		global $mysqli;
		$admin_id = (int)$admin_id;
		$data = $mysqli->real_escape_string($data);
		$mysqli->query("INSERT INTO logs VALUES (NULL, {$admin_id}, '{$data}')");
	}

}