<?php
class Solution {

    /**
     * @param Integer $amount
     * @param Integer[] $coins
     * @return Integer
	 *
	 * f[i][j] 表示前i个数的和为j
	 * f[i][j] 等价于 f[i-1][j - n次*coins[i-1]] 所有组合的合计，这里的n次，表示从0,1,2,3...开始取值
     */
    function change($amount, $coins) {
        $base[0][0] = 1;
		
		for($i = 1; $i <= $amount; $i++){
			$base[0][$i] = 0;
		}
		
		for($i = 1; $i <= count($coins); $i++){
			for($j = 0; $j <= $amount; $j++){
				$num = floor($amount / $coins[$i - 1]);
				$tmpResult = 0;
				for($k = 0; $k <= $num; $k++){
					if(isset($base[$i - 1][$j - $k*$coins[$i - 1]])){
						$tmpResult += $base[$i - 1][$j - $k*$coins[$i - 1]];//当前j的总额 减去第$coins[$i - 1]出现1次 2次 3次的情况
					}
				}
				$base[$i][$j] = $tmpResult;
			}
		}
		
		return $base[count($coins)][$amount];
    }
}

$obj = new Solution();
$result = $obj->change(5, [1, 2, 5]);
echo $result;