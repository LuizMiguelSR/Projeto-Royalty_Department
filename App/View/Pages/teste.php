<?php
    //$date = new DateTime("now",
    //new DateTimeZone('America/Sao_Paulo');  
    /*$tempo1 = '19:38:20';
    $tempo2 = '19:37:00';
 
	$tempo = date('H:i:s', strtotime( $tempo1 ) - strtotime( $tempo2 ) );
 
	echo $tempo;*/

    /*$date = date("H:i:s");
    echo $date;*/

$date_begin = new DateTime('19:38:20');
$hora = 23;
$min = 00;
$seg = 00;
$date_end = new DateTime($hora.':'.$min.':'.$seg);
 
// Definimos o intervalo de 1 ano
$interval = new DateInterval('PT1H');
 
// Resgatamos datas de cada ano entre data de início e fim
$period = new DatePeriod($date_begin, $interval, $date_end);
 
foreach($period as $date) {
    echo $valor=(int)$date->format("H")-3 . '<br />' . PHP_EOL;
}