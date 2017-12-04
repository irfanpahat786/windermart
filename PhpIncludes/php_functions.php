<?php
function fileName($fileName)
{
	return preg_replace("/^[0-9]+_(.*)/","$1",$fileName);
}

function dmy($dt) // covert date in year-month-day to day-month-year
{ $date = array();
$date=preg_split('/-|\/| |,/',$dt);

if(count($date) ==3){
return "$date[2]-$date[1]-$date[0]" ;
}
else $dt;
}

function ymd($dt) // covert date in  day-month-year to year-month-day 
{ $date = array(); 
$date=preg_split('/-|\/| |,/',$dt);
if(count($date) ==3){
return "$date[2]-$date[1]-$date[0]" ;
}
else $dt;
}
define('WEB_TITLE','Perfect Interiors : Manufacturer of wardrobe | bedrooms | chairs | furniture | tables | bed | table | design | interiors | interior | door | kitchen | sofa | cabinet | console | flooring | bar | coffee table | office furniture');
define('ADMIN_TITLE','ADMIN : Perfect Interiors');
?>