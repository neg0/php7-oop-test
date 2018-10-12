<?php

namespace App\Tests\Service;

use App\Model\BinaryDecode\BinaryDecodeAdapter;
use App\Service\BinaryDecodeService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class BinaryDecodeServiceTest extends TestCase
{
    /**
     * @var BinaryDecodeService
     */
    private $sut;

    /**
     * @var BinaryDecodeAdapter | MockObject
     */
    private $adapter;

    protected function setUp(): void
    {
        $this->adapter = $this->getBinaryDecodeAdapter();

        $this->sut = new BinaryDecodeService($this->adapter);
    }

    public function testShouldBeInstantiable(): void
    {
        $this->assertInstanceOf(BinaryDecodeService::class, $this->sut);
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
