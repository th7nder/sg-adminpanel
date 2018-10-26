<?php

class Pagination {
	private $arr = array();
 
	public function calculate_pages($total_rows, $rows_per_page, $page_num) {
		$arr = array();

		$last_page = ceil($total_rows / $rows_per_page);

		$page_num = (int) $page_num;
		if ($page_num < 1) {
			$page_num = 1;
		} 
		elseif ($page_num > $last_page) {
			$page_num = $last_page;
		}

		$upto = ($page_num - 1) * $rows_per_page;
		if($upto < 0){
			$upto = 0;
		}
		$limit = 'LIMIT '.$upto.',' .$rows_per_page;
		
		$this->arr['current'] = $page_num;
		if ($page_num == 1)
			$this->arr['previous'] = $page_num;
		else
			$this->arr['previous'] = $page_num - 1;
	
		if ($page_num == $last_page)
			$this->arr['next'] = $last_page;
		else
			$this->arr['next'] = $page_num + 1;
		 
		 $this->arr['last'] = $last_page;

		return $limit;
	}
	
	public function getArray() {
		return $this->arr;
	}

}
