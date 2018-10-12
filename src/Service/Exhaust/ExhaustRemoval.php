<?php

namespace App\Service\Exhaust;

use App\Model\Http\Client\HttpClientInterface;

class ExhaustRemoval
{
    private const PATH = '/reactor/exhaust/';
    private const ACCEPTED_RESPONSE_CODE = 202;

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function remove(int $id): bool
    {
        $response = $this->httpClient->delete(self::PATH . "{$id}");

        return self::ACCEPTED_RESPONSE_CODE === $response->getCode();
    }
}
