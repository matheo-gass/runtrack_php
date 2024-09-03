<?php
function my_str_search(string $haystack,string $needle) : int{
	$index=0;
	$occs=0;
	while(isset($haystack[$index])){
		if($haystack[$index]==$needle){
			$occs++;
		}
		$index++;
	}
	return $occs;
}
echo my_str_search("Rhubarb","r")."\n"; //1 vu que c'est pas sensible a la case
