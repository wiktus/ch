<?php

function Tytul ($lin){
	foreach ($menu as $nazwa){
		if ($lin == $link){
			return($nazwa);
		}
	}
}