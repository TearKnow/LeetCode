<?php

function str_rev($str)
{
	$count = strlen($str);
	$maxIndex = $count - 1;
	
	for($j = $maxIndex; $j>= 0 ; $j--){
		echo substr($str, $j, 1);//这个等于 $str[1] = b。字符串也可以用index来做
	}
}

str_rev('abcdefg');

//可以用自带的方法strrev();