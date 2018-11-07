<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 07.11.18
 * Time: 01:20
 */

namespace Challange;


interface CoreInterface
{
    public static function encode($key, $message);

    public static function decode($key, $message);

}