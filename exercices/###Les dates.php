<?php
###Les dates

echo 'exo1:<br>';
$date =new DateTime();
echo $date->format("l d F");
//ou
echo '<br>';
setlocale(LC_TIME, 'fr_FR','fra');
echo strftime("%A %d %B %Y");


echo '<br><br><br>';


echo 'exo2:<br>';
$date2=new DateTime('14-07-2019');
echo 'semaine ' . $date2->format("W");


echo '<br><br><br>';


echo 'exo3:<br>';
$dateNow = new DateTime();
$dateEnd = new DateTime('29-10-2021');

$interval = $dateNow->diff($dateEnd);
echo $interval-> format('%a jours avant la fin de la formation');


echo '<br><br><br>';


echo 'exo4:<br>';
$dateNow2=time();
$dateEnd2=strtotime('2021-10-29');
//$dateEnd3 = mktime(0, 0, 0, 29, 10, 2019);
$dayRemain= $dateEnd2 - $dateNow2;

 echo floor($dayRemain/(24*60*60)) . ' jours restants avant la find e la formation';


 echo '<br><br><br>';


 echo 'exo5:<br>';

function bissextile($year)
{
    return date("m-d", strtotime("$year-02-29")) == "02-29";
}

echo 'prochaine année bissextile : 2024'; 


echo '<br><br><br>';


echo 'exo6:<br>';
echo 'Null';


echo '<br><br><br>';


echo 'exo7:<br>';
 $date4 = new DateTime();
 echo 'Il est actuellement : ' . $date4 -> format('H' . '\h' . 'i');

 
echo '<br><br><br>';


echo 'exo8:<br>';
$date5 = new DateTime();
$date->add(new DateInterval('P1M'));
echo $date->format('d m Y');