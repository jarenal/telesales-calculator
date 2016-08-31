<?php

namespace Jarenal\View\Base;

use Jarenal\View\CsvView;
use Jarenal\View\XmlView;
use Jarenal\View\TerminalView;

class ViewFactory {

	public static function init($data, $format){

		switch ($format)
		{
			case "csv":
				$view = new CsvView($data);
				break;
			case "xml":
				$view = new XmlView($data);
				break;
			default:
				$view = new TerminalView($data);
				break;
		}

		return $view;
	}
}