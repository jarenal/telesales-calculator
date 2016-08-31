<?php

namespace Jarenal\View;

class XmlView implements Base\iView {

	private $data;

	public function __construct($data){
		$this->data = $data;
	}

	public function getOutput(){
		$dom = new \DOMDocument('1.0', 'UTF-8');
		$element = $dom->appendChild(new \DOMElement("months"));

		foreach ($this->data as $item)
		{
			$monthNode = $element->appendChild(new \DOMElement("month"));

			$nameNode = $monthNode->appendChild(new \DOMElement("name"));
			$nameNode->appendChild(new \DOMText($item[0]));

			$salaryDateNode = $monthNode->appendChild(new \DOMElement("salary_date"));
			$salaryDateNode->appendChild(new \DOMText($item[1]));

			$bonusDateNode = $monthNode->appendChild(new \DOMElement("bonus_date"));
			$bonusDateNode->appendChild(new \DOMText($item[2]));
		}

		$dom->formatOutput = true;
		return $dom->saveXML();
	}
}