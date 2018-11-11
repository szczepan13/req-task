<?php
/**
 * @author Szczepan Slezak
 */

namespace Challenge;

/**
 * Decodes message using key
 * Class Decoder
 * @package Challenge
 */
class Decoder implements DecoderInterface
{
    /**
     * Trait KeyHelper helps encode key to numeric form
     */
    use KeyHelper;

    /**
     * If set to true trims the end message of extra spaces
     * @var bool
     */
    private static $IGNORE_SPACES_AT_THE_END = true;

    /**
     * Numeric representation of key
     * @var string
     */
    private $numericKey;

    /**
     * Message to decode
     * @var string
     */
    private $message;

    /**
     * Decoder constructor.
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
     * Wrapper to decodeMessage
     * @return string
     */
    public function decode()
    {
        return $this->decodeMessage($this->message, $this->numericKey);
    }

    /**
     * Decodes the message
     * @param string $message
     * @param string $key
     * @return string
     */
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