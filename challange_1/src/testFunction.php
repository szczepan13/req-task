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

        $this->assertEquals(formatString($string), $expectedString);
    }

    public static function validWordsProvider()
    {
        return [
            ["Test Me Please",  "TMP"],
            ["TEst me please",  "TES"],
            ["Tst Me please",   "TMS"],
            ["tEst Me please",  "EMT"],
            ["test Me please",  "MTE"],
            ["test me please",  "TES"],
            ["test me pleasE",  "ETE"],
            ["TEST ME PLEASE",  "TES"],
            ["",  ""],

        ];
    }

}