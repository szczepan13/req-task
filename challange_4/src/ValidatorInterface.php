<?php
/**
 * @author Szczepan Slezak
 */

namespace Challenge;

/**
 * Interface ValidatorInterface
 * @package Challenge
 */
interface ValidatorInterface
{
    public function validate($key, $message);
}