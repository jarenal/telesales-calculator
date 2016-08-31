<?php

namespace Jarenal\Fixtures;

class DummyData {

	public static function getTest2016(){

		$data = array();
		$data[] = array("January", "2016-01-29", "2016-01-12");
		$data[] = array("February", "2016-02-29", "2016-02-12");
		$data[] = array("March", "2016-03-31", "2016-03-15");
		$data[] = array("April", "2016-04-29", "2016-04-12");
		$data[] = array("May", "2016-05-31", "2016-05-12");
		$data[] = array("June", "2016-06-30", "2016-06-14");
		$data[] = array("July", "2016-07-29", "2016-07-12");
		$data[] = array("August", "2016-08-31", "2016-08-12");
		$data[] = array("September", "2016-09-30", "2016-09-12");
		$data[] = array("October", "2016-10-31", "2016-10-12");
		$data[] = array("November", "2016-11-30", "2016-11-15");
		$data[] = array("December", "2016-12-30", "2016-12-12");

		return $data;
	}

	public static function getTest2015(){

		$data = array();
		$data[] = array("January", "2015-01-30", "2015-01-12");
		$data[] = array("February", "2015-02-27", "2015-02-12");
		$data[] = array("March", "2015-03-31", "2015-03-12");
		$data[] = array("April", "2015-04-30", "2015-04-14");
		$data[] = array("May", "2015-05-29", "2015-05-12");
		$data[] = array("June", "2015-06-30", "2015-06-12");
		$data[] = array("July", "2015-07-31", "2015-07-14");
		$data[] = array("August", "2015-08-31", "2015-08-12");
		$data[] = array("September", "2015-09-30", "2015-09-15");
		$data[] = array("October", "2015-10-30", "2015-10-12");
		$data[] = array("November", "2015-11-30", "2015-11-12");
		$data[] = array("December", "2015-12-31", "2015-12-15");

		return $data;
	}

	public static function getTest2014(){

		$data = array();
		$data[] = array("February", "2014-02-28", "2014-02-12");
		$data[] = array("March", "2014-03-31", "2014-03-12");
		$data[] = array("April", "2014-04-30", "2014-04-15");

		return $data;
	}
}