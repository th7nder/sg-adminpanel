<?php
	require_once("../configs/config.php");
	$sb = new mysqli("localhost", "", "", "");
	$server_id = 8; 
	if($sb->connect_error){
		die($sb->connect_error);
	}
	
	$sb->query("SET NAMES utf8");
	
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if($mysqli->connect_error){
		die($mysqli->connect_error);
	}
	
	
	$mysqli->query("SET NAMES utf8");
	function fetchData($mysqli, $query){
		$query = $mysqli->real_escape_string($query);
		$q = $mysqli->query($query);
		$data = Array();
		echo $mysqli->error;
		while($tmp = $q->fetch_array()){
			$data[] = $tmp;
		}
		return $data;
	}

	$admins = fetchData($sb, "SELECT * FROM sb_admins WHERE srv_group is not null"); 
	foreach($admins as $admin){  
		if(strpos($admin['authid'], "47473060") !== false || strpos($admin['authid'], "40469392") !== false || strpos($admin['authid'], "3674192") !== false || strpos($admin['authid'], "17470650") !== false || strpos($admin['authid'], "143916102") !== false || strpos($admin['authid'], "28686758") !== false)
			continue;
		$admin['authid'] = trim(str_replace("STEAM_0", "STEAM_1", $admin['authid']));
		$admin['user'] = trim(str_replace("STEAM_0", "STEAM_1", $admin['user'])); 
		if(strlen($admin['srv_group']) < 10)
			continue;
		 
		echo $admin['user'].'|'.$admin['authid'].'|'.$admin['srv_group'].'<br>'; 
		
		if($q = $mysqli->query("SELECT admin_id FROM ad_admins WHERE authid='{$admin['authid']}'")){
			if($q->num_rows > 0){
				$data = $q->fetch_array();
				$admin_id = (int)$data['admin_id'];
				if($admin_id != 0){
					$q = $mysqli->query("SELECT * FROM ad_admins_specific WHERE admin_id={$admin_id} AND server={$server_id}");
					if($q && $q->num_rows > 0)
						continue;
					
					$mysqli->query("INSERT INTO ad_admins_specific VALUES ({$admin_id}, {$server_id}, 'abcdefgjk')");
					if($mysqli->error){
						die($mysqli->error);
					}
					echo "<br>";
				}
			} else {
				$mysqli->query("INSERT INTO ad_admins VALUES (NULL, '{$admin['user']}', '{$admin['authid']}', '', 0)");
				if($mysqli->error){
					die($mysqli->error);
				}
				echo "<br>";
				$q = $mysqli->query("SELECT admin_id FROM ad_admins WHERE authid='{$admin['authid']}'");
				$data = $q->fetch_array();
				$admin_id = (int)$data['admin_id'];
				if($admin_id != 0){
					$q = $mysqli->query("SELECT * FROM ad_admins_specific WHERE admin_id={$admin_id} AND server={$server_id}");
					if($q && $q->num_rows > 0)
						continue;
					
					$mysqli->query("INSERT INTO ad_admins_specific VALUES ({$admin_id}, {$server_id}, 'abcdefgjk')");
					echo "INSERT INTO ad_admins_specific VALUES ({$admin_id}, {$server_id}, 'abcdefgjk')";
					if($mysqli->error){
						die($mysqli->error);
					}
					echo "<br>";
				}
			}
		}
	}
	
	$mysqli->close();
?>