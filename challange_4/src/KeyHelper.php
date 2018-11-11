<?php
/**
 * @author Szczepan Slezak
 */

namespace Challenge;

/**
 * Provides to conversion to numeric for decoder and encoder
 * Trait KeyHelper
 * @package Challenge
 */
Trait KeyHelper
{
    /**
     * Takes the key and converts to numeric
     * @param $key
     * @return string
     */
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

    /**
     * Custom sort function
     * @param $a
     * @param $b
     * @return int
     */
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