#!/usr/bin/php
<?php

require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/vendor/pear/console_table/Table.php";

use \Jarenal\Controller\Controller;

$message = <<<EOD

Description:

    This script calculates when to pay to telesales staff.

Usage:

	telesales-calculator.php [command] [options]

Available commands:

  run     Execute the script.

Optional arguments:

  -h, --help             Show this help message.
  -o, --output_file      (Optional) Output file. Without output file the script will return the output through the terminal.
  -s, --date_start       (Optional) Start date "yyyy-mm-dd". The start date from which calculate the salaries date, otherwise will use the current date.
  -e, --date_end         (Optional) End date "yyyy-mm-dd". The end date for to calculate the salaries date, otherwise will be one year from the start date.

EOD;

if(count($argv)==1 || (isset($argv[1]) && in_array($argv[1], array("-h", "--help"))))
	die($message."\n\r");

$parameters = array("output_file"=>"", "date_start"=>"", "date_end"=>"");

$run = false;

foreach ($argv as $key => $argument) {

	if($argument == "run")
	{
		$run = true;
	}

	// Parsing output_file
	if($argument == "-o")
	{
		if(isset($argv[$key+1]))
			$parameters["output_file"] = trim($argv[$key+1]);
	} elseif(strpos($argument, "--output_file") !== false) {
		$parts = explode("=", $argument);
		$parameters["output_file"] = trim($parts[1]);
	}

	// Date start
	if($argument == "-s")
	{
		if(isset($argv[$key+1]))
			$parameters["date_start"] = trim($argv[$key+1]);
	} elseif(strpos($argument, "--date_start") !== false) {
		$parts = explode("=", $argument);
		$parameters["date_start"] = trim($parts[1]);
	}

	// Date end
	if($argument == "-e")
	{
		if(isset($argv[$key+1]))
			$parameters["date_end"] = trim($argv[$key+1]);
	} elseif(strpos($argument, "--date_end") !== false) {
		$parts = explode("=", $argument);
		$parameters["date_end"] = trim($parts[1]);
	}

}

try {

	if($run===false)
		die($message."\n\r");

	// Check output file format
	if($parameters['output_file'])
	{
		$pattern = "/.(\w*)$/";
		preg_match($pattern, $parameters['output_file'], $matches);
		$supported_formats = array("csv", "xml");

		if(!in_array($matches[1], $supported_formats))
			throw new \Exception("Output file format not supported. The supported formats are: ".implode(", ", $supported_formats));

		$parameters["format"] = strtolower($matches[1]);
	}
	else
	{
		$parameters["format"] = "terminal";
	}

	$controller = new Controller($parameters['output_file'], $parameters["format"], $parameters["date_start"], $parameters["date_end"]);

	die($controller->execute()."\n\r");


} catch (\Exception $ex) {
	die($ex->getMessage()."\n\r");
}