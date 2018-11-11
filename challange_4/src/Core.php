<?php
/**
 * @author Szczepan Slezak
 */
namespace Challenge;

require './vendor/autoload.php';

/**
 * Core class and wrapper to decode and encode classes,
 * providing dependecy injection of validator class as well
 * as wrapping exception for convenient output.
 * Class Core
 * @package Challenge
 */

class Core
{
    /**
     * Decodes message using key
     * @param $key
     * @param $message
     * @return string
     */
    public static function decode($key, $message)
    {
        try{
            $dec = new Decoder($key, $message, new Validator());
            return $dec->decode();
        }catch (\Exception $exception){
            echo $exception->getMessage() . "\n";
        }
    }

    /**
     * Encodes message using key
     * @param $key
     * @param $message
     * @return string
     */
    public static function encode($key, $message)
    {
        try{
            $enc = new Encoder($key, $message, new Validator());
            return $enc->encode();
        }catch (\Exception $exception){
            echo $exception->getMessage() . "\n";
        }
    }
}


$decode = Core::encode("2e1Ca", "secretinformation");
$encode = Core::decode("2e1Ca", "ecrseonftiiatrm   on");


echo $decode;
echo $encode;