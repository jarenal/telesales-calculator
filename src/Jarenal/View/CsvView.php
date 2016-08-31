<?php

namespace Jarenal\View;

class CsvView implements Base\iView {

	private $data;

	public function __construct($data){
		$this->data = $data;
	}

	public function getOutput(){

		$out = '"MONTH","SALARY DATE","BONUS DATE"'."\n\r";

		foreach ($this->data as $row) {
			$out .= "\"".implode('","', $row)."\"\n\r";
		}

		return $out;
	}
}