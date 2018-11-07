<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 07.11.18
 * Time: 00:28
 */

namespace Challange;


class Validator
{
    private static $rules = ["checkLength", "checkUnique"];

    public function validate($key, $message)
    {
        foreach(self::$rules as $rule){
            $this->$rule($key, $message);
        }
    }

    private function checkLenght($key, $message)
    {
        if(strlen($message) < strlen($key)){
            throw new \InvalidArgumentException("Key should be longer then the message.");
        }
    }

    private function checkUnique($key, $message)
    {
        if ($this->checkStringUnique($this->key)) {
            throw new \InvalidArgumentException("Key does not contain unique chars.");
        }
    }

    private function checkStringUnique($key, $message)
    {
        $uniqueString = implode("", array_unique(str_split($string)));
        return strlen($uniqueString) == $string;
    }


}