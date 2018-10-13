<?php

namespace Tests\Service;

use App\Model\Http\Response\HttpResponseInterface;
use App\Service\Exhaust\ExhaustRemoval;
use App\Service\HttpClientService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ExhaustRemovalTest extends TestCase
{
    private const MOCK_ACCEPTED_DELETE = 202;
    private const MOCK_EXHAUST_ID = 1;

    /**
     * @var ExhaustRemoval
     */
    private $sut;

    /**
     * @var HttpClientService | MockObject
     */
    private $httpClient;

    /**
     * @var HttpResponseInterface | MockObject
     */
    private $httpResponse;

    protected function setUp(): void
    {
        $this->httpClient = $this->getHttpClient();
        $this->httpResponse = $this->getHttpResponse();

        $this->sut = new ExhaustRemoval($this->httpClient);
    }

    public function testShouldBeInstantiable(): void
    {
        $this->assertInstanceOf(ExhaustRemoval::class, $this->sut);
    }

    public function testShouldRemoveExhaustById(): void
    {
        $this->httpResponse
            ->expects($this->once())
            ->method('getCode')
            ->willReturn(self::MOCK_ACCEPTED_DELETE);

        $this->httpClient
            ->expects($this->once())
            ->method('delete')
            ->willReturn($this->httpResponse);

        $this->assertTrue($this->sut->remove(self::MOCK_EXHAUST_ID));
    }

    private function getHttpClient(): MockObject
    {
        return $this->createMock(HttpClientService::class);
    }

    private function getHttpResponse(): MockObject
    {
        return $this->createMock(HttpResponseInterface::class);
    }
}
