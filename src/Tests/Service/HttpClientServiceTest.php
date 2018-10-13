<?php

namespace App\Tests\Service;

use App\Model\Http\Client\HttpClientInterface;
use App\Model\Http\Response\HttpResponseInterface;
use App\Service\HttpClientService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class HttpClientServiceTest extends TestCase
{
    /**
     * @var HttpClientService
     */
    private $sut;

    /**
     * @var HttpClientService | MockObject
     */
    private $adapter;

    /**
     * @var HttpResponseInterface
     */
    private $httpResponse;

    protected function setUp(): void
    {
        $this->adapter = $this->getHttpClient();
        $this->httpResponse = $this->getHttpResponse();

        $this->sut = new HttpClientService($this->adapter);
    }

    public function testShouldBeInstantiable(): void
    {
        $this->assertInstanceOf(HttpClientService::class, $this->sut);
    }

    public function testShouldSendPOSTRequestAndGetHttpResponseBack(): void
    {
        $this->adapter
            ->expects($this->once())
            ->method(HttpClientInterface::METHOD_POST)
            ->willReturn($this->httpResponse);

        $this->assertInstanceOf(HttpResponseInterface::class, $this->sut->post('/any'));
    }

    public function testShouldSendGETRequestAndGetHttpResponseBack(): void
    {
        $this->adapter
            ->expects($this->once())
            ->method(HttpClientInterface::METHOD_GET)
            ->willReturn($this->httpResponse);

        $this->assertInstanceOf(HttpResponseInterface::class, $this->sut->get('/any'));
    }

    public function testShouldSendDELETERequestAndGetHttpResponseBack(): void
    {
        $this->adapter
            ->expects($this->once())
            ->method(HttpClientInterface::METHOD_DELETE)
            ->willReturn($this->httpResponse);

        $this->assertInstanceOf(HttpResponseInterface::class, $this->sut->delete('/any'));
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
