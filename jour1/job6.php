<?php
function my_array_sort(array $ats,string $order="ASC"):array{
	$res=array();
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
		echo"biggest:$biggest\n";
		for($i=0;$i<$arrlen;$i++){
			$lind=-1;
			$lowest=$biggest;
			for($j=0;$j<$arrlen;$j++){
				$alr=false;
				//echo$ats[$j]."\n";
				if($ats[$j]<=$lowest){
					echo"$ats[$j] est plus petit ou égal à $lowest\n";
					//$lowest=$ats[$j];
					for($ii=0;$ii<$sorted_nbs;$ii++){
						if($sorted_inds[$ii]==$j){
							echo"lind deja dans larray\n";
							$alr=true;
							break;
						};
					};
					if(!$alr){
						echo"lind pas dans larray\n";
						$lowset=$ats[$j];
						$lind=$j;
					};
				};
				//echo"stats:\n  lowest:$lowest\n  lind:$lind\n;"
			};
			echo json_encode($sorted_inds)."\n";
			echo"lowest:$lowest\n";
			echo"lind:$lind\n";
			echo"pushing $ats[$lind]\n\n";
			array_push($res,$ats[$lind]);
			array_push($sorted_inds,$lind);
			$sorted_nbs++;;
		}
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
