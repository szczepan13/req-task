<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 10.11.18
 * Time: 22:58
 */

use PHPUnit\Framework\TestCase;
require './vendor/autoload.php';

class DecoderTest extends TestCase
{


    public function setUp(){


    }

    public function testDecode(){

        $validatorMock = $this->getMockBuilder('Challange\ValidatorInterface')->getMock();
        $validatorMock->method('validate')->willReturn(true);

        $message = "ecrseonftiiatrm   on";

        $encoder = new \Challange\Decoder("2e1Ca", $message, $validatorMock );
        $encodedText = $encoder->decode();

        $this->assertEquals($encodedText, "secretinformation");
    }
}