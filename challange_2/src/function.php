<?php

/**
 * Sorts strings according to specs.
 *
 * @param String $str
 * @return String $newStr
 */
function sortString($str)
{
    if($str === ""){
        return "";
    }

    $arrayOfWords = explode(" ", $str);
    $sortedArray = [];
    foreach($arrayOfWords as $word){
        preg_match('/[0-9]/', $word, $matches);
        $sortedArray[$matches[0]] = $word;
    }

    ksort($sortedArray, 1);
    return implode($sortedArray, " ");
}