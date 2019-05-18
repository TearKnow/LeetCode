<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     * 使用堆栈的概念
     */
    
    function shouldBe($pop, $left, $right){
        for($i=0; $i<count($left); $i++){
            if($pop == $left[$i]){
                return $right[$i];
            }
        }
    }
    
    
    function isValid($s) {
        $result = false;
        $left = array('(', '{', '[');
        $right = array(')', '}', ']');
        
        if(!$s){
            return true;
        }
        
        $countRight = 0;
        $leftArr = $originLeft = $originRight = [];
        $rightArr = [];
        
        $arr = [];
        for($i = 0; $i < strlen($s); $i++){
            $arr[] = substr($s, $i, 1);
        }
        
        foreach($arr as $k => $one){
            $isLeft = false;
            $isRight = false;
            if(in_array($one, $left)){
                $leftArr[] = $one;
                $originLeft[] = $one;
            }else{
                $originRight[] = $one;
                $leftPop = array_pop($leftArr);
                $shouldBe = $this->shouldBe($leftPop, $left, $right);
                
                if($shouldBe != $one){
                    $result = false;
                }else{
                    $countRight++;
                }
            }
        }
        return $countRight == count($originLeft) && $countRight && (count($originRight) == count($originLeft)) ? true : false;;
    }
    
}

$s = new Solution();
$r = $s->isValid("[])");
var_dump($r);
