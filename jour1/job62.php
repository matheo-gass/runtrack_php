<?php
function my_array_sort(array $ats,string $order="ASC"):array{
	$res=array();
	$to_sort=array();
	$sorted_inds=array();
	$sorted_nbs=0;
	$index=0;
	$arrlen=0;
	while(isset($ats[$index])){
		$arrlen++;
		$index++;
	}
	if($arrlen==0){return $ats;};
	//echo"\$arrlen=".$arrlen."\n";
	if($order=="ASC"){
		$lowest=$ats[0];
		$biggest=$ats[0];
		for($i=0;$i<$arrlen;$i++){
			if($ats[$i]>$biggest){
			 	$biggest=$ats[$i];
			};
		};
		for($i=0;$i<$arrlen;$i++){
			for($j=0;$j<$arrlen;$j++){
				if(isset($to_sort[$j])){
					array_push()
				}else{
				}
			}
		}
		echo"biggest:$biggest\n";
	}else if($order=="DESC"){
	}else{
		echo"erreur: veuillez entrer un ordre valide, sois \"ASC\", sois \"DESC\"\n";
	}
	return $res;
}
echo json_encode(my_array_sort([1,2,3,2,1])); //1,2,3,6,7,8
//my_array_sort([3,8,7,2,1,6],"ASC");
//my_array_sort([3,8,7,2,1,6],"DESC");
//my_array_sort([]);
