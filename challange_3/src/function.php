<?php

/**
 * @param Array $arr
 * @return String string
 */
function findUnique($arr){

    $unique = "";
    $i = 0;
    $search = uniqueChars($arr[0]);
    foreach($arr as $item){
        if(uniqueChars($item) !== $search){
            $unique = $item;
            $i++;
        }
    }
    return ($i === 1) ? $unique : $arr[0];
}

/**
 * Removes all whitespaces and returns sorted unique characters set used in string.
 * @param String $str
 * @return String
 */
function uniqueChars($str){
    $sortedArray = array_unique(str_split(strtolower(str_replace(" ", "", $str))));
    sort($sortedArray);
    return implode("", $sortedArray);
}



