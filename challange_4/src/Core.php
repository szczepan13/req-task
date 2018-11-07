<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 07.11.18
 * Time: 00:28
 */

namespace Challange;


class Core implements CoreInterface
{
    public static function decode($key, $message)
    {
        $validator = new Validator();
        $dec = new Decoder($key, $message, $validator);
        return $dec->decode();
    }

    public static function encode($key, $message)
    {
        $validator = new Validator();
        $enc = new Encoder($key, $message, $validator);
        return $enc->encode();
    }

}



$decode = Core::encode("2e1Ca", "secretinformation");

$encode = Core::decode("2e1Ca", "ecrseonftiiatrm   on");



var_dump($decode);

var_dump($encode);