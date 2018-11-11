<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 10.11.18
 * Time: 23:39
 */

namespace Challange;


interface ValidatorInterface
{
    public function validate($key, $message);
}