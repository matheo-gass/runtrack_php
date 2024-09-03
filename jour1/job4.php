<?php
function my_fizz_buzz(int $length):array{
	$arr=array();
	for($i=1;$i<$length+1;$i++){
		echo$i."\n";
		if($i%5==0&&$i%3==0){
			array_push($arr,"FizzBuzz");
		}else if($i%5==0){
			array_push($arr,"Buzz");
		}else if($i%3==0){
			array_push($arr,"Fizz");
		}else{
			array_push($arr,$i);
		}
	}
	return $arr;
}
echo json_encode(my_fizz_buzz(15));
