<?php

namespace Jarenal\View;

class TerminalView implements Base\iView {

	private $data;

	public function __construct($data){
		$this->data = $data;
	}

	public function getOutput(){
		$tbl = new \Console_Table();

		$headers = array("MONTH","SALARY DATE","BONUS DATE");
		$tbl->setHeaders($headers);

		foreach ($this->data as $row) {
			$tbl->addRow($row);
		}

		return $tbl->getTable();
	}
}