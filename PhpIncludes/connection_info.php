<?php
//$mysqlServer = 'localhost';
//$mysqlUser = 'root';
//$mysqlPassword = 'root';
//$databaseSelect='akanksha';

error_reporting(0);
$mysqlServer = 'localhost';
$mysqlUser = 'winderma_shahid';
$mysqlPassword = '!@#$%shahid786';
$databaseSelect='winderma_rt';


function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }
	//date_default_timezone_set('Africa/Nairobi');
	
    //echo $date = date('Y-m-d H:i:s');
    //echo $now."<br>";
	//echo $unix_date;
    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}

?>