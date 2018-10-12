<?php

namespace App\Tests\Service;

use App\Model\Http\Client\HttpClientAdapter;
use App\Model\Http\Response\HttpResponse;
use App\Model\Http\Client\HttpClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class HttpClientAdapterTest extends TestCase
{
    /**
     * @var HttpClientInterface
     */
    private $sut;

    protected function setUp(): void
    {
        $mock = new MockHandler([
            new Response(200, ['Content-Length' => 0]),
            new RequestException('Error Communicating with Server', new Request('GET', 'test'))
        ]);

        $handlerStack = HandlerStack::create($mock);

        $this->sut = new HttpClientAdapter($handlerStack);
    }

    public function testServiceShouldBeInstantiable(): void
    {
        $this->assertInstanceOf(HttpClientInterface::class, $this->sut);
    }

    public function testPost(): void
    {
        $this->assertInstanceOf(HttpResponse::class, $this->sut->post('/slug'));
    }

    public function testGet(): void
    {
        $this->assertInstanceOf(HttpResponse::class, $this->sut->get('/slug'));
    }

    public function testDelete(): void
    {
        $this->assertInstanceOf(HttpResponse::class, $this->sut->delete('/slug'));
    }

    public function testRequestExceptionErrorCatching(): void
    {
        $this->expectException(RequestException::class);
        $this->assertInstanceOf(HttpResponse::class, $this->sut->post('/post-path'));
        $this->assertInstanceOf(RequestException::class, $this->sut->delete('/bad-request'));
    }
}
