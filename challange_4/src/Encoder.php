<?php
/**
 * @author Szczepan Slezak
 */
namespace Challenge;

/**
 * Encodes message using key
 * Class Encoder
 * @package Challenge
 */
class Encoder implements EncoderInterface
{
    /**
     * Trait KeyHelper helps encode key to numeric form
     */
    use KeyHelper;

    /**
     * Numeric representation of key
     * @var string
     */
    private $numericKey;

    /**
     * Message to encode
     * @var string
     */
    private $message;

    /**
     * Encoder constructor.
     * @param string $key
     * @param string $message
     * @param ValidatorInterface $validator
     */
    public function __construct(string $key, string $message, ValidatorInterface $validator)
    {
        $this->message = $message;
        $errors = $validator->validate($key, $message);
        if($errors !== true){
            throw new \InvalidArgumentException(implode("\n", $errors));
        }
        $this->numericKey = $this->toNumeric($key);
    }

    /**
     * Wrapper to encodeMessage
     * @return string
     */
    public function encode()
    {
        return $this->encodeMessage($this->message, $this->numericKey);
    }

    /**
     * Encodes message using key
     * @param string $message
     * @param string $key
     * @return string
     */
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
