<?php
/**
 * @author Szczepan Slezak
 */

namespace Challenge;

class Validator implements ValidatorInterface
{
    /**
     * @var array Keeps list of errors
     */
    private $errors;

    /**
     * @var array Keeps function names to call
     */
    private static $rules = ["checkLength", "checkUnique", "checkAlnum"];

    /**
     * Validator constructor.
     * @param array $rules
     */
    public function __construct($rules = array())
    {
        if(!empty($rules)){
            self::$rules = $rules;
        }
    }

    /**
     * Validates the key and message to follow given constrains
     * @param $key
     * @param $message
     * @return array|bool
     * @throws \Exception
     */
    public function validate($key, $message)
    {
        foreach(self::$rules as $rule){
            if (!method_exists($this, $rule)) {
                throw new \Exception("Method {$rule} does not exist");
                exit;
            }
            $response = call_user_func(array($this,$rule), $key, $message);
            if($response !== true){
                $this->errors[] = $response;
            }
        }
        return empty($this->errors) ? true : $this->errors;
    }

    /**
     * Verifies if message is longer then the key
     * @param $key
     * @param $message
     * @return bool|string
     */
    private function checkLength($key, $message)
    {
        if(strlen($message) < strlen($key)){
            return "Message should be longer then the key.";
        }
        return true;
    }

    /**
     * Verifies if the string contains unique chars
     * @param $key
     * @return bool|string
     */
    private function checkUnique($key)
    {
        $uniqueString = implode("", array_unique(str_split($key)));
        if(strlen($uniqueString) !== strlen($key)) {
            return "Key does not contain unique chars.";
        }
        return true;
    }

    /**
     * Verifies if the string special chars
     * @param $key
     * @return bool|string
     */
    private function checkAlnum($key)
    {
        if(!ctype_alnum($key)){
            return "Key contains special chars.";
        }
        return true;
    }
}