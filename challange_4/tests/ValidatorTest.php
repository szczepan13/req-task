<?php
/**
 * @author Szczepan Slezak
 */

use PHPUnit\Framework\TestCase;

/**
 * Class ValidatorTest
 */

class ValidatorTest extends TestCase
{
    /**
     * Tests if key length is valid
     * @throws Exception
     */
    public function testKeyLenght()
    {
        $validator = new \Challenge\Validator(['checkLength']);
        $response = $validator->validate("test123", "test");
        $this->assertEquals( "Message should be longer then the key.", $response[0]);
    }

    /**
     * Tests whether keys are unique
     * @throws Exception
     */
    public function testKeykUniqueness()
    {
        $validator = new \Challenge\Validator(['checkUnique']);
        $response = $validator->validate("test123WWW", "test");
        $this->assertEquals( "Key does not contain unique chars.", $response[0]);
    }

    /**
     * Tests whether key contains special chars
     * @throws Exception
     */
    public function testKeySpecialChars()
    {
        $validator = new \Challenge\Validator(['checkAlnum']);
        $response = $validator->validate("tes23?", "test");
        $this->assertEquals( "Key contains special chars.", $response[0]);
    }

    /**
     * Checks if expected exception is thorwn
     */
    public function testThrowsExceptions()
    {
        $validator = new \Challenge\Validator(['unknownFunction']);
        $this->expectException(\Exception::class);
        $validator->validate("tes123", "message");
    }
}