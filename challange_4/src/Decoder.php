<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 07.11.18
 * Time: 00:29
 */

namespace Challange;


class Decoder
{
    
    public function decodeMessage($message, $key)
    {
        $encodedMessage = "";
        $sizeOfKey = strlen($this->numericKey);
        $y = 0;
        for($i = 0; $i < strlen($this->message); $i++){
            $index = $i % $sizeOfKey;
            if($index == 0){
                $y++;
            }
            $numericKey = $this->numericKey;
            $encodedMessage[$numericKey[$index] + $y * $sizeOfKey] = $this->message[$i];
        }
        return $encodedMessage;
    }

    public function decode()
    {
        return $this->decodeMessage($this->message, $this->numericKey);
    }

}