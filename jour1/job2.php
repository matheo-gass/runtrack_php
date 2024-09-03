<?php
function my_str_reverse(string $string) : string{
	$res="";
	$index=0;
	$strlen=0;
	while(isset($string[$index])){
	$strlen++;
	$index++;
	}
	for($i=$strlen-1;$i>=0;$i--){
		$res=$res.$string[$i];
	}
	return $res;
}
echo my_str_reverse("Rhubarb")."\n";
