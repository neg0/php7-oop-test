<?php

namespace App\Tests\Service;

use App\Model\Http\Response\HttpResponseInterface;
use App\Model\Prisoner;
use App\Service\HttpClientService;
use App\Service\Prisoner\PrisonerViewer;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PrisonerViewerTest extends TestCase
{
    private const MOCK_PRISONER_SLUG = 'leia';
    private const MOCK_PRISONER_RESPONSE = [ 'cell' => '010101', 'block' => '110100' ];

    /**
     * @var PrisonerViewer
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

        $this->sut = new PrisonerViewer($this->httpClient);
    }

    public function testShouldBeInstantiable(): void
    {
        $this->assertInstanceOf(PrisonerViewer::class, $this->sut);
    }

    public function testShouldReturnPrisoner(): void
    {
        $this->httpResponse
            ->expects($this->once())
            ->method('getBody')
            ->willReturn(\GuzzleHttp\json_encode(self::MOCK_PRISONER_RESPONSE, true));

        $this->httpClient
            ->expects($this->once())
            ->method('get')
            ->willReturn($this->httpResponse);

        $response = $this->sut->view(self::MOCK_PRISONER_SLUG);
        $this->assertInstanceOf(Prisoner::class, $response);
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
