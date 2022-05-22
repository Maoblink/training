<?php 

function tiempo_pasado($tiempo){

	$diferencia = time() - $tiempo;

	if($diferencia < 60){
		return 'Justo Ahora';
	}elseif($diferencia >= 60 && $diferencia < 3600){
		return date("i",$diferencia).'m';
	}elseif($diferencia >= 3600 && $diferencia < 86400){
		return date("G",$diferencia).'h';
	}elseif($diferencia >= 86400 && $diferencia < 604800){
		return date("j", $diferencia).'d';
	}elseif($diferencia >= 604800 && $diferencia < 2628000){
		return date("W",$diferencia).'s';
	}elseif($diferencia >= 2628000 && $diferencia < 31556926){
		return date("n", $diferencia).'me';
	}elseif($diferencia >= 31556926){
		return floor($diferencia / 31556926).'a';
	}

}

 ?>