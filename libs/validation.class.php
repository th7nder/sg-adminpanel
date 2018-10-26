<?php
	class Validation {
	private $errors = array();


	public function check($string, $filter, $emsg, $options = array()) {
		$var_clean = filter_var($var, $filter, $options);
		if($var_clean == true) {
			return true;
		} else {
			$this->errors[] = $emsg;
			return false;
		}

	}

	public function checkEmail($email, $emsg) {
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			$this->errors[] = $emsg;
			return false;
		}

	}

	public function checkInt($string, $max_length, $min_length, $mes) {
			$check = filter_var($string, FILTER_VALIDATE_INT, array(
					'options' => array(
						'default' => false,
						'min_range' => $min_length, 
						'max_range' => $max_length
					),
					'flags' => FILTER_FLAG_ALLOW_OCTAL,
					));
			if($check == true){
				return true;
			} else {
				$this->errors[] = $mes;
				return false;
			}

	}

	public static function clearString($string) {
		$options = array(

			'flags' => FILTER_FLAG_STRIP_LOW
		);

		return filter_var($string, FILTER_SANITIZE_STRING, $options);
	}

	public function checkRegexp($name, $string, $regexp, $emsg) {
		$options = array(
			'options' => array(
				'regexp' => $regexp
			)
		);

		if(filter_var($string, FILTER_VALIDATE_REGEXP, $options) == true) {
			return true;
		} else {
			$this->errors[] = $name.' : '.$emsg;
			return false;
		}
	}

	public function checkLogin($login, $emsg) {
		$options = array(
			'options' => array(
				'regexp' => "/^[a-zA-Z0-9_-]{1,32}$/"
			)
		);

		if(filter_var($login, FILTER_VALIDATE_REGEXP, $options) == true) {
			return true;
		} else {
			$this->errors[] = $emsg;
			return false;
		}

	}

	public function compare($c1, $c2, $emsg) {
		if($c1 != $c2) {
			$this->errors[] = $emsg;
			return false;
		} else {
			return true;
		}
	}
	
	public function getError() {
		return $this->errors;
	}
	
	public function countError() {
		return count($this->errors);
	}
	
}