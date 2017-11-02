<?php

class Main_func {
    
    public function getDates()
    {
        if(date("m")>7)
        {
            $y = date("Y")+1;
        }
        else
        {
            $y = date("Y");
        }
        $now = time();
        $date2 = strtotime($y."-7-31");
        $datediff = $date2 - $now;
        return floor($datediff/(60*60*24));
    }
    public function checkStaffPK($value,$array)
    {
        foreach($array AS $row)
        {
            if($row->staff_id==$value)
            {
                echo "checked";
            }
        }
    }
}