<?php

$p = null;
$ip = false;
$browser = false;
$data = date('d-m-Y H:i:s');
$log = file ('log.txt');
$liczba_wierszy = count($log);
$przegladarki = array(  '/MSIE.\S{1,3}/', "/Chrome\S{1,20}/",  "/Firefox\S{1,6}/", "/Opera\S{1,10}/", "/Safari\S{1,10}/" );

if (isset($_SERVER['REMOTE_ADDR'])){
	$ip = $_SERVER['REMOTE_ADDR'];
} 
if (isset($_SERVER['HTTP_USER_AGENT'])){
	$browser = $_SERVER['HTTP_USER_AGENT'];
}  

			foreach($przegladarki as $przegladarka){
				preg_match($przegladarka, $browser, $tab);
				if($tab){
					if (!isset($_COOKIE['byl'])){
						$liczba_wierszy ++;
						file_put_contents(  'log.txt', "$liczba_wierszy | $data | $ip | $tab[0]\n", FILE_APPEND);
					}
					break;
				}
			}	
	
setcookie('byl', 'tak', 0 );	
header('Content-Type: text/html; charset=utf-8');
?>
