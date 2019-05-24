<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
	 * m是列 n是行
	 * $base[$i][$j] 表示第i行 第j列
	 * 动态规划
     */
    function uniquePaths($m, $n) {
        $base = array();
		for($i=1; $i<=$m; $i++){
			$base[1][$i] = 1;
		}
		for($i=1; $i<=$n; $i++){
			$base[$i][1] = 1;
		}
		
		if($m>=2 && $n>=2){
			for($i=2; $i<=$n; $i++){
				for($j = 2; $j<=$m; $j++){
					$base[$i][$j] = $base[$i][$j-1] + $base[$i-1][$j];
				}
			}
		}

		return $base[$n][$m];
    }
}

$obj = new Solution();
$result = $obj->uniquePaths(7, 3);//7列 3行
echo $result;