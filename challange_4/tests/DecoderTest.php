<?php
/**
 * @author Szczepan Slezak
 */
use PHPUnit\Framework\TestCase;

class DecoderTest extends TestCase
{
    private $validatorMock;

    /**
     * Initializes mock
     */
    public function setUp()
    {
        $this->validatorMock = $this->getMockBuilder('Challenge\ValidatorInterface')->getMock();
    }

    /**
     * Tests the decode functionality
     */
    public function testDecode()
    {
        $this->validatorMock->method('validate')->willReturn(true);
        $message = "ecrseonftiiatrm   on";
        $decoder = new \Challenge\Decoder("2e1Ca", $message, $this->validatorMock );
        $decoderText = $decoder->decode();
        $this->assertEquals($decoderText, "secretinformation");
    }

    /**
     * Tests length key should be longer then message
     */
    public function testLengthOfKey()
    {
        $this->validatorMock->method('validate')->willReturn(array("Message should be longer then the key."));
        $message = "test123";
        $this->expectException(InvalidArgumentException::class);
        new \Challenge\Decoder("2e1Ca", $message, $this->validatorMock);
    }

    /**
     * Tests unique key characters
     */
    public function testLengthUniqueOfKey()
    {
        $this->validatorMock->method('validate')->willReturn(array("Key does not contain unique chars."));
        $message = "test123";
        $this->expectException(InvalidArgumentException::class);
        new \Challenge\Decoder("2e1Ca", $message, $this->validatorMock);
    }
}