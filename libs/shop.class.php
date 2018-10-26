<?php


class Shop {
	public static function getPaymentType($server_id){
		global $msg, $mysqli_shop;
		$server_id = (int)$server_id;
		$q = $mysqli_shop->query("SELECT payment_type FROM `servers` WHERE `id`='{$server_id}'");
		if($data = $q->fetch_array()){
			return $data['payment_type'];
		} else {
			return false;
		}

	}


	public static function getServers($codename = false){
		global $mysqli_shop;
		$q = false;
		if($codename){
			$codename = $mysqli_shop->real_escape_string($codename);
			$q = $mysqli_shop->query("SELECT id, ip, port FROM `servers` WHERE `codename`='{$codename}'");
		} else {
			$q = $mysqli_shop->query("SELECT * FROM `servers`");
		}

		$data = Array();
		while($tmp = $q->fetch_array()){
			$data[$tmp['id']] = $tmp;
		}
		return $data;
	}

	public static function getServices($codename = false){
		global $mysqli_shop;

		$q = false;
		if($codename){
			$codename = $mysqli_shop->real_escape_string($codename);
			$id = $mysqli_shop->query("SELECT id FROM `servers` WHERE `codename`='{$codename}'")->fetch_array();
			$id = (int)$id['id'];
			if($id){
				$q = $mysqli_shop->query("SELECT * FROM `services` WHERE `server`='{$id}'");
			} else {
				return false;
			}
		} else {
			$q = $mysqli_shop->query("SELECT * FROM `services`");
		}

		$data = Array();
		while($tmp = $q->fetch_array()){
			$data[$tmp['server']][$tmp['id']] = $tmp;
		}

		return $data;
	}

	public static function getSmsPacks($supplier = "1s1k"){
		global $mysqli_shop;
		$supplier = $mysqli_shop->real_escape_string($supplier);
		$q = $mysqli_shop->query("SELECT * FROM `sms_packs_{$supplier}`");
		$data = Array();
		while($tmp = $q->fetch_array()){
			$data[$tmp['id']] = $tmp;
		}
		return $data;
	}

	public static function getLogs(){
		global $mysqli_shop;
		$servers = self::getServers();
		$q = $mysqli_shop->query("SELECT * FROM `sms_shop_logs` ORDER BY `id` DESC LIMIT 100");
		$data = Array();
		while($tmp = $q->fetch_array()){
			$data[$tmp['id']] = $tmp;
			$data[$tmp['id']]['server'] = $servers[$tmp['server']]['codename'];
		}
		return $data;
	}


	public static function getService($service_name){
		global $mysqli_shop;

		$service_name = $mysqli_shop->real_escape_string($service_name);
		$q = $mysqli_shop->query("SELECT * FROM `services` WHERE `service_name`='{$service_name}' LIMIT 1");
		$data = $q->fetch_array();
		if($data){
			return $data;
		} else {
			return false;
		}
	}

	public static function modifyService($id, $service_name, $display_name, $description){
		global $mysqli_shop, $msg;

		$id = (int)$id;
		$service_name = $mysqli_shop->real_escape_string($service_name);
		$display_name = $mysqli_shop->real_escape_string($display_name);
		$description = $mysqli_shop->real_escape_string($description);

		$mysqli_shop->query("UPDATE services SET service_name='{$service_name}', display_name='{$display_name}', description='{$description}' WHERE id={$id}");
		$msg->add("success", "Pomyślnie zmodyfikowano usługę.");
		return true;
	}

}
