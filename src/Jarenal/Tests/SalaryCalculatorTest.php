<?php

use PHPUnit\Framework\TestCase;
use Jarenal\Model\SalaryCalculator;
use Jarenal\Fixtures\DummyData;

class SalaryCalculatorTest extends TestCase
{
    public function test2016()
    {
        $calculator = new SalaryCalculator("2015-12-20", "2016-12-14");
        $this->assertEquals($calculator->getData(), DummyData::getTest2016());
    }

    public function test2015()
    {
        $calculator = new SalaryCalculator("2014-12-10", "2015-12-03");
        $this->assertEquals($calculator->getData(), DummyData::getTest2015());
    }

    public function test2014()
    {
        $calculator = new SalaryCalculator("2014-01-15", "2014-04-08");
        $this->assertEquals($calculator->getData(), DummyData::getTest2014());
    }

}