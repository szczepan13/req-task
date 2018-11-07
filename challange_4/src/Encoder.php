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

    public function __construct($key, $message, Validator $validator, KeyHelper $keyHelper)
    {
        $this->message = $message;
        $validator->validate($key, $message);
        $this->numericKey = $keyHelper->toNumeric($key);
    }

    public function encodeMessage($message, $key)
    {
        $encodedMessage = "";
        $sizeOfKey = strlen($key);
        $y = 0;
        for($i = 0; $i < strlen($message); $i++){
            $index = $i % $sizeOfKey;
            if($index == 0){
                $y++;
            }
            $numericKey = $key;
            $encodedMessage[$numericKey[$index] + $y * $sizeOfKey] = $message[$i];
        }
        return $encodedMessage;
    }

    public function encode()
    {
       return $this->encodeMessage($this->message, $this->numericKey);
    }

}
