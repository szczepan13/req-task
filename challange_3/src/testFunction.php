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
    public function testDifferentArray($arrayOfStrings, $expectedString){

        $this->assertEquals(findUnique($arrayOfStrings), $expectedString);
    }

    public static function validWordsProvider()
    {
        return [
            [[ 'Aa', 'aaa', 'aaaaa', 'BbBb', 'Aaaa', 'AaAaAa', 'a' ], 'BbBb'],
            [[ 'abc', 'acb', 'bac', 'foo', 'bca', 'cab', 'cba' ], 'foo' ],
            [[ 'silvia', 'vasili', 'victor' ], 'victor'],
            [[ 'Tom Marvolo Riddle', 'I am Lord Voldemort', 'Harry Potter' ], 'Harry Potter'],
            [[ '     ', 'a', ' ' ], 'a'],
            [[ 'bb', 'a', 'Aaa' ], 'bb'],

        ];
    }

}