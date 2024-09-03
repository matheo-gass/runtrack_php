<?php
function my_is_multiple(int $divider,int $multiple):bool{
	if(($multiple%$divider)==0){
		return true;
	}
	return false;
}
