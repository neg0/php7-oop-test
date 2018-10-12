<?php

namespace App\Tests\Service;

use App\Model\BinaryDecode\BinaryDecodeAdapter;
use App\Service\BinaryDecoder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class BinaryDecoderTest extends TestCase
{
    /**
     * @var BinaryDecoder
     */
    private $sut;

    /**
     * @var BinaryDecodeAdapter | MockObject
     */
    private $adapter;

    protected function setUp(): void
    {
        $this->adapter = $this->getBinaryDecodeAdapter();

        $this->sut = new BinaryDecoder($this->adapter);
    }

    public function testShouldBeInstantiable(): void
    {
        $this->assertInstanceOf(BinaryDecoder::class, $this->sut);
    }

    public function testItShouldConvertBinaryToString(): void
    {
        $this->adapter
            ->expects($this->once())
            ->method('convert')
            ->willReturn("h");

        $this->assertEquals("h", $this->sut->convert("01101000"));
    }

    private function getBinaryDecodeAdapter(): MockObject
    {
        return $this->createMock(BinaryDecodeAdapter::class);
    }
}
