<?php

namespace App\Tests\Service;

use App\Model\Http\Client\HttpClientInterface;
use App\Model\Http\Response\HttpResponseInterface;
use App\Model\Http\Token\AuthToken;
use App\Model\Http\Token\AuthTokenInterface;
use App\Service\Auth\TokenAuthentication;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class TokenAuthenticationTest extends TestCase
{
    private const MOCK_CLIENT_ID = 'SomeRandomStringAndN4mb3rs';
    private const MOCK_CLIENT_SECRET = 'SomeRandomStringAndN4mb3rs-SomeRandomStringAndN4mb3rs';
    private const MOCK_RESPONSE = [
        AuthTokenInterface::FIELD_ACCESS_TOKEN => 'S676ghghg32g3h2h32334ghg2',
        AuthTokenInterface::FIELD_EXPIRES_IN => 9999999,
        AuthTokenInterface::FIELD_TOKEN_TYPE => 'Bearer',
        AuthTokenInterface::FIELD_SCOPE => 'TheForce',
    ];

    /**
     * @var TokenAuthentication
     */
    private $sut;

    /**
     * @var HttpClientInterface | MockObject
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

        $this->sut = new TokenAuthentication($this->httpClient);
    }

    public function testShouldBeInstantiable(): void
    {
        $this->assertInstanceOf(TokenAuthentication::class, $this->sut);
    }

    public function testShouldGetAuthenticationToken(): void
    {
        $this->httpResponse
            ->expects($this->once())
            ->method('getBody')
            ->willReturn(json_encode(self::MOCK_RESPONSE));

        $this->httpClient
            ->expects($this->once())
            ->method('post')
            ->willReturn($this->httpResponse);

        $this->assertInstanceOf(
            AuthToken::class,
            $this->sut->Authenticate(self::MOCK_CLIENT_ID, self::MOCK_CLIENT_SECRET)
        );
    }

    private function getHttpClient(): MockObject
    {
        return $this->createMock(HttpClientInterface::class);
    }

    private function getHttpResponse(): MockObject
    {
        return $this->createMock(HttpResponseInterface::class);
    }
}
