<?php

class Game {
	public static function getGlobalAdminList(){
		global $mysqli, $msg;
		if($result = $mysqli->query("SELECT * FROM ad_admins ORDER by immunity DESC, name ASC")){
			if($result->num_rows > 0){
				$return = Array();
				while($tmp = $result->fetch_array()){
					$steamid = new SteamID($tmp['authid']);
					$return[$tmp['admin_id']] = $tmp;
					$return[$tmp['admin_id']]['community_link'] = 'http://steamcommunity.com/profiles/'.$steamid->ConvertTOUInt64();
				}

				return $return;
			}
		}

		return false;
	}

	public static function getSpecificData($admin_id){
		global $mysqli, $msg;
		$admin_id = (int)$admin_id;
		if($result = $mysqli->query("SELECT * FROM ad_admins_specific WHERE admin_id={$admin_id} ORDER BY server ASC")){
			if($result->num_rows > 0){
				$return = Array();
				while($tmp = $result->fetch_array()){
					$i = $tmp['server'];
					$return[$i] = $tmp;
					$return[$i]['server_id'] = $tmp['server'];
					$return[$i]['server'] = self::getServerName($tmp['server']);
				}

				return $return;
			}
		}

		return false;
	}

	public static function getServers(){
		global $mysqli, $msg;
		if($result = $mysqli->query("SELECT * FROM ad_servers")){
			if($result->num_rows > 0){
				$return = Array();
				while($tmp = $result->fetch_array()){
					$return[] = $tmp;
				}
				return $return;
			}
		}

		return false;
	}

	public static function getServerName($server_id){
		global $mysqli, $msg;
		$server_id = (int)$server_id;
		if($result = $mysqli->query("SELECT server_name FROM ad_servers WHERE server_id={$server_id}")){
			if($result->num_rows > 0){
				if($tmp = $result->fetch_array()){
					return $tmp['server_name'];
				}
			}
		}

		return false;
	}

	public static function getAdminData($admin_id){
		global $mysqli, $msg;
		$admin_id = (int)$admin_id;
		if($result = $mysqli->query("SELECT * FROM ad_admins WHERE admin_id={$admin_id}")){
			if($result->num_rows > 0){
				if($tmp = $result->fetch_array()){
					return $tmp;
				}
			}
		}

		return false;
	}
	public static function modifyAdminPrivileges($admin_id, $name, $authid, $flags, $immunity, $servers_permissions, $servers_flags, $chat_prefix, $chat_color){
		global $mysqli, $msg, $userData;

		$admin_id = (int)$admin_id;
		$immunity = (int)$immunity;
		if(!$admin_id || !$authid)
			return false;

		if($userData['id'] != 1 && ($admin_id == 1 || $immunity >= 100)){
			return false;
		}



		if(strpos($flags, "z") !== false || strpos($flags, "m") !== false || strpos($flags, "n") !== false){
			return false;
		}


		$name = trim($mysqli->real_escape_string($name));
		$authid = trim($mysqli->real_escape_string($authid));
		$flags = trim($mysqli->real_escape_string($flags));
		$chat_prefix = $mysqli->real_escape_string($chat_prefix);
		$chat_color = trim($mysqli->real_escape_string($chat_color));
		$authid = self::checkAuthID($authid);
		if(!$authid)
			return false;


		if(($userData['admin'] > 50 && $immunity < $userData['admin']) || $userData['id'] == 1){
			$query_str = "UPDATE ad_admins SET name='{$name}', authid='{$authid}', flags='{$flags}',immunity={$immunity}, chat_prefix='{$chat_prefix}', chat_color='{$chat_color}' WHERE admin_id={$admin_id}";
			if(!$mysqli->query($query_str)){
				return false;
			}

			echo $mysqli->error;
		}

		$specific_data = self::getSpecificData($admin_id);
		$admin_data = self::getAdminData($admin_id);

		foreach($servers_permissions as $i=>$permission){
			$permission = (bool)$permission;
			$servers_flags[$i] = trim($mysqli->real_escape_string($servers_flags[$i]));
			if(strpos($servers_flags[$i], "z") !== false || ($userData['admin'] < 50 && $userData['admin'] != $i) || $userData['admin'] < $admin_data['immunity'])
				continue;

			if($permission){
				if(!isset($specific_data[$i])){
					if(!$mysqli->query("INSERT INTO ad_admins_specific (`admin_id`, `server`, `flags`) VALUES({$admin_id}, {$i}, '{$servers_flags[$i]}')")){
						echo $mysqli->error;
					}
				} else {
					$mysqli->query("UPDATE ad_admins_specific SET flags='{$servers_flags[$i]}' WHERE admin_id={$admin_id} AND server={$i}");
				}
			} else {
				if(isset($specific_data[$i])){
					if(!$mysqli->query("DELETE FROM ad_admins_specific WHERE admin_id={$admin_id} AND server={$i}")){
						echo $mysqli->error;
					}
				}
			}


		}

		return true;
	}

	public static function checkAuthID($authid){
		$return = false;
		if(preg_match( '/^STEAM_([0-4]):([0-1]):([0-9]{1,10})$/', $authid, $return) === 1){
			return str_replace("STEAM_0", "STEAM_1", $authid);
		}

		return false;
	}


	public static function insertAdmin($name, $authid, $flags, $immunity){
		global $mysqli, $msg, $userData;
		$name = trim($mysqli->real_escape_string($name));
		$authid = trim($mysqli->real_escape_string($authid));
		$flags = trim($mysqli->real_escape_string($flags));
		$immunity = (int)$immunity;

		$authid = self::checkAuthID($authid);
		if(!$authid)
			return false;

		if(strpos($flags, "z") !== false || strpos($flags, "m") !== false || strpos($flags, "n") !== false || $immunity >= 100){
			return false;
		}


		if($userData['admin'] < 50){
			$flags = "";
			$immunity = 0;
		}

		if($immunity > $userData['admin']){
			$immunity = $userData['admin'];
		}

		if($mysqli->query("INSERT INTO ad_admins (`name`, `authid`, `flags`, `immunity`) VALUES ('{$name}', '{$authid}', '{$flags}', {$immunity})")){
			return true;
		}

		return false;
	}


	public static function deleteAdmin($admin_id){
		global $mysqli, $userData;
		$admin_id = (int)$admin_id;
		if($admin_id == 1){
			return false;
		}

		$admin_data = self::getAdminData($admin_id);
		if($userData['admin'] < 50 && $userData['admin'] <= $admin_data['immunity']){
			return false;
		}

		if($mysqli->query("DELETE FROM ad_admins WHERE admin_id={$admin_id}") && $mysqli->query("DELETE FROM ad_admins_specific WHERE admin_id={$admin_id}")){
			return true;
		} else {
			return false;
		}
	}


	public static function deleteSpecificAdmin($admin_id, $server_id){
		global $mysqli;
		$admin_id = (int)$admin_id;
		$server_id = (int)$server_id;

		if($admin_id == 1){
			return false;
		}

		if($mysqli->query("DELETE FROM ad_admins_specific WHERE admin_id={$admin_id} AND server={$server_id}")){
			return true;
		} else {
			return false;
		}
	}

	public static function getServersAdverts(){
		global $mysqli, $msg;
		if($result = $mysqli->query("SELECT * FROM ad_servers")){
			if($result->num_rows > 0){
				$return = Array();
				while($tmp = $result->fetch_array()){
					$return[$tmp['server_id']] = $tmp;
				}
				return $return;
			}
		}

		return false;
	}

	public static function getAdverts(){
		global $mysqli;
		$servers = self::getServersAdverts();
		$q = $mysqli->query("SELECT * FROM `ad_advertisements` ORDER BY `server` ASC");
		$data = Array();
		$i = 0;
		while($tmp = $q->fetch_array()){
			$data[$i] = $tmp;
			if($tmp['server'] == 0){
				$data[$i]['server'] = "Globalnie.";
			} else {
				$data[$i]['server'] = $servers[$tmp['server']]['server_name'];
			}

			$i++;

		}
		return $data;
	}

	public static function insertAdvert($server, $text){
		global $mysqli, $userData;
		if($userData['admin'] < 50){
			return false;
		}

		$server = (int)$server;
		$text = $mysqli->real_escape_string($text);

		if($mysqli->query("INSERT INTO ad_advertisements VALUES (NULL, '{$text}', {$server})")){
			return true;
		} else {
			return false;
		}
	}

	public static function deleteAdvert($advert_id){
		global $mysqli, $userData;
		if($userData['admin'] < 50){
			return false;
		}

		$advert_id = (int)$advert_id;

		if($mysqli->query("DELETE FROM ad_advertisements WHERE id={$advert_id}")){
			return true;
		} else {
			return false;
		}
	}

	public static function getBanReasons(){
		global $mysqli;
		$servers = self::getServersAdverts();
		$q = $mysqli->query("SELECT * FROM `ad_banreasons` ORDER BY `server` ASC");
		$data = Array();
		$i = 0;
		while($tmp = $q->fetch_array()){
			$data[$i] = $tmp;
			if($tmp['server'] == 0){
				$data[$i]['server'] = "Globalnie.";
			} else {
				$data[$i]['server'] = $servers[$tmp['server']]['server_name'];
			}

			$i++;

		}
		return $data;
	}

	public static function insertBanReason($server, $text){
		global $mysqli, $userData;
		if($userData['admin'] < 50){
			return false;
		}

		$server = (int)$server;
		$text = $mysqli->real_escape_string($text);

		if($mysqli->query("INSERT INTO ad_banreasons VALUES (NULL, '{$text}', {$server})")){
			return true;
		} else {
			return false;
		}
	}

	public static function deleteBanReason($ban_id){
		global $mysqli, $userData;
		if($userData['admin'] < 50){
			return false;
		}

		$ban_id = (int)$ban_id;

		if($mysqli->query("DELETE FROM ad_banreasons WHERE id={$ban_id}")){
			return true;
		} else {
			return false;
		}
	}

	public static function getBans(){
		global $mysqli;
		$servers = self::getServersAdverts();
		$q = $mysqli->query("SELECT * FROM `ad_blockades` WHERE `blockade_type`='ban' ORDER BY `id` DESC");
		$data = Array();
		$i = 0;
		while($tmp = $q->fetch_array()){
			$data[] = $tmp; 
			if($tmp['server_id'] == 0){
				$data[$i]['server_id'] = "Globalnie.";
			} else {
				if(isset($servers[$tmp['server_id']])){
					$data[$i]['server_id'] = $servers[$tmp['server_id']]['server_name'];
				} else {
					$data[$i]['server_id'] = "Globalnie.";
				}
				
			}

			$data[$i]['start'] = date('d M Y H:i:s', $data[$i]['start']);
			$data[$i]['end'] = date('d M Y H:i:s', $data[$i]['end']);
			$duration = (int)$tmp['duration'];
			if($duration == 0){
				$data[$i]['end'] = "Permanentny";
			}


			$i++;

		}
		return $data;
	}

}
