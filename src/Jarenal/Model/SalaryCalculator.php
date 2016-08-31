<?php

namespace Jarenal\Model;

class SalaryCalculator {

    private $date_start;
    private $date_end;

	public function __construct($date_start, $date_end){
        $this->date_start = $date_start;
        $this->date_end = $date_end;
	}

	public function getData()
	{
		$data = array();

        if($this->date_start)
            $current_date = new \DateTime($this->date_start);
        else
            $current_date = new \DateTime();

        if($this->date_end)
            $finish_date = new \DateTime($this->date_end);
        else {
            $finish_date = new \DateTime();
            $finish_date->add(new \DateInterval("P1Y"));
        }

        $current_year = $current_date->format("Y");
        $current_month = $current_date->format("n")+1;

        if($current_month>12)
        {
            $current_month=1;
            $current_year++;
        }

        do {

            $month_name =  date("F", strtotime("$current_year-$current_month-1"));

            // Getting bonus date
            $day_of_week = date("N", strtotime("$current_year-$current_month-12"));
            if($day_of_week<6)
            {
                $bonus_day = date("Y-m-d", mktime(0,0,0,$current_month,12,$current_year));
            }
            else
            {
                $bonus_day = date("Y-m-d", strtotime("Next Tuesday", mktime(0,0,0,$current_month, 12, $current_year)));
            }

            // Getting salary date
            $last_day = date("N", strtotime("last day of this month", mktime(0,0,0,$current_month, 1, $current_year)));

            if($last_day<6)
            {
                $pay_day = date("Y-m-d", strtotime("last day of this month", mktime(0,0,0,$current_month, 1, $current_year)));
            }
            else
            {
                $diff = $last_day-5;
                $last_day_of_month = date("j", strtotime("last day of this month", mktime(0,0,0,$current_month, 1, $current_year)));
                $pay_day = date("Y-m-d", strtotime("$diff days ago", mktime(0,0,0,$current_month, $last_day_of_month, $current_year)));
            }

            $data[] = array($month_name, $pay_day, $bonus_day);

            $current_month++;

            if($current_month>12)
            {
                $current_month=1;
                $current_year++;
            }


        } while (new \DateTime("$current_year-$current_month-".$finish_date->format("d")) <= $finish_date);

        return $data;
	}

}