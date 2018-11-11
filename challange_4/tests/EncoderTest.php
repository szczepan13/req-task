<?php
/**
 * Created by PhpStorm.
 * User: szczepan
 * Date: 10.11.18
 * Time: 22:58
 */

use PHPUnit\Framework\TestCase;
require './vendor/autoload.php';

class EncoderTest extends TestCase
{


    public function setUp(){


    }

    public function testEncode(){

        $validatorMock = $this->getMockBuilder('Challange\ValidatorInterface')->getMock();
        $validatorMock->method('validate')->willReturn(true);

        $message = "secretinformation";

        $encoder = new \Challange\Encoder("2e1Ca", $message, $validatorMock );
        $encodedText = $encoder->encode();
        var_dump($encodedText);

        $this->assertEquals($encodedText, "ecrseonftiiatrm   on");
    }
}