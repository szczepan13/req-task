<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 06.11.18
 * Time: 00:11
 */

namespace Challange;


class Encoder
{

    private $numericKey;
    private $message;

    public function __construct($key)
    {
        $this->initializeKey($key);
    }

    private function initializeKey($key)
    {
        $keySplited = str_split($key);
        uasort($keySplited, array($this, 'compare'));
        foreach ($keySplited as $key => $item) {
            $this->numericKey .= $key + 1;
        }
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

    public function validateMessage()
    {

    }

    public function processMessage($message)
    {

        $this->message = $message;
    }
}

$en = new Encoder("2e1Ca");
