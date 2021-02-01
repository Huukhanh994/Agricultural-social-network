<?php
namespace App\Date;

class Common
{
    public static function convertStr2Date($value)
    {
        $str = strtotime($value);
        $date = date('Y/m/d', $str);
        return $date;
    }

    /**
     * Set value of input date with from start_time to end_time
     *
     * Input 2 parameters => $input_start_date, $input_end_date
     * Output return array() => $start_time,$end_time
     * 
     */
    public static function setValueFromStart2EndTime($input_start, $input_end)
    {
        $season_start = substr($input_start, 0, 19);
        $season_end = substr($input_end, 22, 19);
        if (substr($season_start, 17, 2) == 'AM') {
            $start = (date('Y-m-d h:i:s', strtotime($season_start)));
        } else {
            $start = (date('Y-m-d H:i:s', strtotime($season_start)));
        }

        if (substr($season_end,17,2) == 'AM') {
            $end = (date('Y-m-d h:i:s', strtotime($season_end)));
        } else {
            $end = (date('Y-m-d H:i:s', strtotime($season_end)));
        }

        $start_time = $start;
        $end_time = $end;
        $arrDate[] = $start_time;
        $arrDate[] = $end_time;
        return $arrDate;
    }

    /**
     * Get value of input date with from start_time to end_time
     *
     * Input 2 parameters => $input_start_date, $input_end_date
     * Output return array() => $schedule_time
     * 
     */
    public static function getValueFromStart2EndTime($input_start,$input_end)
    {
        if (substr(date('H:i A', strtotime($input_start)), 0, 2) > 12) {
            $start = date('m/d/Y h:i A', strtotime($input_start));
        } else {
            $start = date('m/d/Y h:i', strtotime($input_start)) . ' AM';
        }
        if (substr(date('H:i A', strtotime($input_end)), 0, 2) > 12) {
            $end = date('m/d/Y h:i A', strtotime($input_end));
        } else {
            $end = date('m/d/Y h:i', strtotime($input_end)) . ' AM';
        }
        // dd($end);
        $schedule_time = $start . ' - ' . $end;
        return $schedule_time;
    }
}

?>