<?php
/**
 */

namespace Challange;

class Encoder implements EncoderInterface
{
    use KeyHelper;

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

    public function encode()
    {
        return $this->encodeMessage($this->message, $this->numericKey);
    }

    private function encodeMessage(string $message, string $key)
    {
        $encodedMessage = "";
        $sizeOfKey = strlen($key);
        $y = 0;
        for($i = 0; $i < strlen($message); $i++){
            $line = $i % $sizeOfKey;
            if($line == 0 && $i >= $sizeOfKey){
                $y++;
            }
            /* This shift -1 is due to difference in numeric key position and internal php implementation
             * One starts at 0 the other with 1 */
            $encodedMessage[($key[$line]-1) + $y * $sizeOfKey] = $message[$i];
        }
        return $encodedMessage;
    }
}
