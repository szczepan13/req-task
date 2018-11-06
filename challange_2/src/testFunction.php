<?php

require '../vendor/autoload.php';
require 'function.php';

use PHPUnit\Framework\TestCase;

final class FunctionTest extends TestCase{

    /**
     * @param String $string
     * @param String $expectedString
     *
     * @dataProvider validWordsProvider
     */
    public function testDifferentStrings($string, $expectedString){

        $this->assertEquals(sortString($string), $expectedString);
    }

    public static function validWordsProvider()
    {
        return [
            ["is2 Thi1s T7est 4a",  "Thi1s is2 4a T7est"],
            ["", ""]
        ];
    }

}