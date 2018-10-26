<?php
	require_once("../configs/config.php");
	$mysqli_shop = new mysqli(DB_HOST_SHOP, DB_USER_SHOP, DB_PASSWORD_SHOP, DB_NAME_SHOP);
	if($mysqli_shop->connect_error){
		die($mysqli_shop->connect_error);
	}
	
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if($mysqli->connect_error){
		die($mysqli->connect_error);
	}
	
	function getDaemonServerID($shop_server_id){
		global $mysqli_shop, $mysqli;
		$q = $mysqli_shop->query("SELECT ip, port FROM servers WHERE id='{$shop_server_id}'");
		$ip = 0;
		$port = 0;
		if($q){
			$data = $q->fetch_array();
			$ip = $data['ip'];
			$port = $data['port'];
		} else {
			echo $mysqli_shop->error;
		}
		
		
		if($q = $mysqli->query("SELECT server_id FROM ad_servers WHERE ip='{$ip}' AND hostport='{$port}'")){
			if($q->num_rows > 0){
				$id = $q->fetch_array();
				return $id['server_id'];
			}
		} else {
			echo $mysqli->error;
		}
		
		return -1;
	}
	
	function getServiceFlags($shop_service_id){
		global $mysqli_shop, $mysqli;
		
		$flags = "";
		$q = $mysqli_shop->query("SELECT flags FROM services WHERE service_name='{$shop_service_id}'");
		if($q){
			if($q->num_rows > 0){
				$data = $q->fetch_array();
				return $data['flags'];
			}
		} else {
			echo $mysqli_shop->error;
		}
		
		return -1;
	}
	
	function checkIfClientExists($authid){
		global $mysqli;
		
		$authid = $mysqli->real_escape_string($authid);
		$q = $mysqli->query("SELECT client_id FROM ad_clients WHERE authid='{$authid}'");
		if($q){
			if($q->num_rows > 0){
				return true;
			}
		}
		
		return false;
	}
	
	function getClientID($authid){
		global $mysqli;
		
		$authid = $mysqli->real_escape_string($authid);
		
		$q = $mysqli->query("SELECT client_id FROM ad_clients WHERE authid='{$authid}'");
		if($q){
			if($q->num_rows > 0){
				$data = $q->fetch_array();
				return (int)$data['client_id'];
			}
		}
		
		return -1;
	}
	
	function getSpecificClientData($client_id, $server){
		global $mysqli;
		
		$client_id = (int)$client_id;
		$server = (int)$server;
		
		$q = $mysqli->query("SELECT flags FROM ad_clients_specific WHERE server={$server} AND client_id={$client_id}");
		if($q){
			if($q->num_rows > 0){
				$data = $q->fetch_array();
				return $data['flags'];
			}
		} else {
			echo $mysqli->error;
		}
		
		return false;
	}
	
	if($q = $mysqli_shop->query("SELECT * FROM sms_shop_logs WHERE deleted=0 and service LIKE '%hns%' ORDER BY id ASC")){
		while($result = $q->fetch_array()){
			
			$daemon_server_id = getDaemonServerID((int)$result['server']);
			$flags = getServiceFlags($result['service']); 
			if($flags == -1 || $daemon_server_id == -1){
				continue;
			}
			echo $result['server'].'|'.$result['authid'].'|'.$result['service'];
			echo '------->';
			echo 'DaemonServerID: '.$daemon_server_id;
			echo '---------------->Flags:'.$flags;
			echo '<br>';
			$authid = str_replace("STEAM_0", "STEAM_1", $result['authid']);
			if(checkIfClientExists($authid)){
				echo "EXISTS!";
				echo '<br>';
			} else {
				echo "INSERT INTO ad_clients VALUES (NULL, '{$authid}', '')";
				$mysqli->query("INSERT INTO ad_clients VALUES (NULL, '{$authid}', '')") ;
				if($mysqli->error){
					echo $mysqli->error;
				}
				echo '<br>'; 
			}
			
			$client_id = getClientID($authid);
			echo 'Client ID: '.$client_id;
			echo '<br>';
			if($client_id != -1 && ($existing_flags = getSpecificClientData($client_id, $daemon_server_id))){ 
				echo 'SPECIFIC EXISTS!';
				$flagsToAdd = "";
				foreach(str_split($flags) as $flag){
					if(strpos($existing_flags, $flag) === false){
						$flagsToAdd .= $flag;
					}
				}
				
				
				if(strlen($flagsToAdd) > 0){
					$final_flags = $existing_flags.$flagsToAdd;
					sort($final_flags);
					echo "UPDATE ad_clients_specific SET `flags`='{$final_flags}' WHERE client_id={$client_id} AND server={$daemon_server_id}";
					$mysqli->query("UPDATE ad_clients_specific SET `flags`='{$final_flags}' WHERE client_id={$client_id} AND server={$daemon_server_id}");
					if($mysqli->error){
						echo $mysqli->error;
					}
				} else {
					echo "flags are ok!";
				}
				echo '<br>';
				echo $existing_flags.$flagsToAdd;
			} else if($client_id != -1){
				echo "INSERT INTO ad_clients_specific VALUES ({$client_id}, {$daemon_server_id}, '{$flags}')"; 
				$mysqli->query("INSERT INTO ad_clients_specific VALUES ({$client_id}, {$daemon_server_id}, '{$flags}')");
				if($mysqli->error){
					echo $mysqli->error;
				}
			} else {
				echo "INVALID CLIENT";
			}
			echo '<br>';
			echo '-------------------------------------------------------------------------------------------------------------------<br>';
			
		}
	}
	
	$mysqli->close();
	$mysqli_shop->close();
?>
