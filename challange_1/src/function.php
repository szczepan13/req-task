<?php

/**
 * Formats strings according to spec.
 *
 * @param String $str
 * @return String $newStr
 */
function formatString($str)
{
    $newStr = "";
    $strSmall = "";
    for ($i = 0; $i < strlen($str) && strlen($newStr)< 3; $i++){
        if(ctype_upper($str[$i])){
            $newStr .= $str[$i];
        }else{
            $strSmall .= $str[$i];
        }
    }
    for ($i = 0; $i < strlen($strSmall) && strlen($newStr) < 3; $i++){
        $newStr .= strtoupper($strSmall[$i]);
    }

    return $newStr;
}
