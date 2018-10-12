<?php

namespace App\Model\Http\Config;

use App\Model\Arrayable;
use GuzzleHttp\HandlerStack;

class HttpConfig implements HttpConfigInterface, Arrayable
{
    /**
     * @var string
     */
    private $baseUri;

    /**
     * @var string
     */
    private $sslCertPath;

    /**
     * @var string
     */
    private $sslKeyPath;

    /**
     * @var HandlerStack
     */
    private $handlerTestingMock = null;

    public function __construct(string $baseUri, string $sslCertPath, string $sslKeyPath)
    {
        $this->baseUri = $baseUri;
        $this->sslCertPath = $sslCertPath;
        $this->sslKeyPath = $sslKeyPath;
    }

    public function setHandlerTestingMock(HandlerStack $handler): self
    {
        $this->handlerTestingMock = $handler;

        return $this;
    }

    public function toArray(): array
    {
        return [
            self::FIELD_BASE_URI => $this->baseUri,
            self::FIELD_SSL_CRT => $this->sslCertPath,
            self::FIELD_SSL_KEY => $this->sslKeyPath,
            self::FIELD_HANDLER => $this->handlerTestingMock,
        ];
    }
}
