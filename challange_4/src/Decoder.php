<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 07.11.18
 * Time: 00:29
 */

namespace Challange;

class Decoder implements DecoderInterface
{
    use KeyHelper;

    private static $IGNORE_SPACES_AT_THE_END = true;
    private $numericKey;
    private $message;

    public function __construct(string $key, string $message, ValidatorInterface $validator)
    {
        $this->message = $message;
        if($errors = $validator->validate($key, $message) !== true){
            throw new \InvalidArgumentException(implode("\n", $errors));
        }
        $this->numericKey = $this->toNumeric($key);
    }

    public function decode()
    {
        return $this->decodeMessage($this->message, $this->numericKey);
    }

    private function decodeMessage(string $message, string $key)
    {
        $decodedMessage = "";
        $sizeOfKey = strlen($key);
        $y = 0;
        for($i = 0; $i < strlen($message); $i++){
            $line = $i % $sizeOfKey;
            if($line == 0 && $i >= $sizeOfKey){
                $y++;
            }
            /* This shift -1 is due to difference in numeric key position and internal php implementation,
               one starts at 0 the other with 1 */
            $decodedMessage[$i] = $message[($key[$line]-1) + $y * $sizeOfKey];
        }
        if(self::$IGNORE_SPACES_AT_THE_END){
            return trim($decodedMessage);
        }
        return $decodedMessage;
    }
}