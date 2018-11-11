<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 07.11.18
 * Time: 00:58
 */

namespace Challange;

Trait KeyHelper
{
    public function toNumeric($key)
    {
        $numericKey = "";
        $keySplited = str_split($key);
        uasort($keySplited, array($this, 'compare'));
        foreach ($keySplited as $key => $item) {
            $numericKey .= $key + 1;
        }
        return $numericKey;
    }

    private function compare($a, $b)
    {
        if(ctype_upper($a) && (ctype_lower($b) || ctype_alnum($b)) ){
            return -1;
        }
        if(ctype_alnum($a) && (ctype_lower($b) || ctype_upper($b)) ){
            return 1;
        }
        if(ctype_lower($a) && ctype_alnum($b)){
            return -1;
        }
        if(ctype_lower($a) && ctype_upper($b)){
            return 1;
        }
        return $a <=> $b;
    }
}