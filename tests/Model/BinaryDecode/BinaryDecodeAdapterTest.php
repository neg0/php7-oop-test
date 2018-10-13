<?php

namespace Tests\Model\BinaryDecode;

use App\Model\BinaryDecode\BinaryDecodeAdapter;
use App\Model\BinaryDecode\BinaryDecodeInterface;
use PHPUnit\Framework\TestCase;

class BinaryDecodeAdapterTest extends TestCase
{
    private const MOCK_BINARY_CELL = "01000011 01100101 01101100 01101100 00100000 00110010 00110001 00111000 00110111";
    private const MOCK_BINARY_BLOCK = "01000100 01100101 01110100 01100101 01101110 01110100 01101001 01101111 01101110
00100000 01000010 01101100 01101111 01100011 01101011 00100000 01000001 01000001 00101101 00110010
00110011 00101100";
    private const MOCK_BINARY_EMPTY = "";

    /**
     * @var BinaryDecodeInterface
     */
    private $sut;

    protected function setUp(): void
    {
        $this->sut = new BinaryDecodeAdapter();
    }

    public function testServiceShouldBeInstantiable(): void
    {
        $this->assertInstanceOf(BinaryDecodeInterface::class, $this->sut);
    }

    /**
     * @dataProvider getTestCases
     */
    public function testItShouldConvertBinaryToString(string $expected, string $given): void
    {

        $this->assertEquals($expected, $this->sut->convert($given));
    }

    public function getTestCases(): array
    {
        return [
            'Test case cell' => [ "Cell 2187", self::MOCK_BINARY_CELL ],
            'Test case block' => [ "Detention Block AA-23,", self::MOCK_BINARY_BLOCK ],
            'Test case empty string' => [ "", self::MOCK_BINARY_EMPTY ]
        ];
    }
}
