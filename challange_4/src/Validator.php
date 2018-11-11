<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 07.11.18
 * Time: 00:28
 */

namespace Challange;


use phpDocumentor\Reflection\DocBlock\Tags\Param;

class Validator
{

    private $errors;
    private static $rules = ["checkLength", "checkUnique", "checkAlnum"];

    public function __construct($rules = array())
    {
        if(!empty($rules)){
            self::$rules = $rules;
        }
    }

    public function validate($key, $message)
    {
        foreach(self::$rules as $rule){
            if (!method_exists($this, $rule)) {
                throw new Exception("Method {$rule} does not exist");
                exit;
            }
            if($response = user_call_func($rule, $this, $key, $message) !== true){
                $this->errors[] = $response;
            }
        }
        return empty($this->errors) ? true : $this->errors;
    }

    private function checkLenght($key, $message)
    {
        if(strlen($message) < strlen($key)){
            return "Key should be longer then the message.";
        }
        return true;
    }

    private function checkUnique($key)
    {
        if(!$this->checkStringUnique($key)) {
            return "Key does not contain unique chars.";
        }
        return true;
    }

    private function checkAlnum($key)
    {
        if(ctype_alnum($key)){
            return "Key cointains special chars";
        }
        return true;
    }

    private function checkStringUnique($string)
    {
        $uniqueString = implode("", array_unique(str_split($string)));
        return strlen($uniqueString) == $string;
    }


}