<?php

class Messages {
	private $messages = Array();
	
	public function add($type, $msg){
		if(is_array($msg)){
			foreach($msg as $m){
				$this->messages[$type][] = $m;
			}
		} else {
			$this->messages[$type][] = $msg;
		}
	}
	
	public function get(){
		return $this->messages;
	}
}