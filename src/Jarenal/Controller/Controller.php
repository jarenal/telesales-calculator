<?php

namespace Jarenal\Controller;

use Jarenal\Model\SalaryCalculator;
use Jarenal\View\Base\ViewFactory;

class Controller {

	private $output_file;
	private $date_start;
	private $date_end;
	private $format;

	public function __construct($output_file="", $format="", $date_start="", $date_end=""){

		$this->output_file = $output_file;
		$this->date_start = $date_start;
		$this->date_end = $date_end;
		$this->format = $format;

	}

	public function execute(){
		try {
			$model = new SalaryCalculator($this->date_start, $this->date_end);
			$view = ViewFactory::init($model->getData(), $this->format);

			$output = $view->getOutput();

			switch ($this->format) {
				case 'csv':
				case 'xml':
					$handle = @fopen($this->output_file, "w+");
					fwrite($handle, $output);
					fclose($handle);
					return "The file '{$this->output_file}' was generated successfully.";
					break;
				default: // terminal
					return $output;
					break;
			}

		} catch (\Exception $ex) {
			throw $ex;
		}
	}
}