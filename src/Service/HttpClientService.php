<?php

namespace App\Service;

use App\Model\Http\Client\HttpClientInterface;
use App\Model\Http\Response\HttpResponseInterface;

class HttpClientService implements HttpClientInterface
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function post(string $path, array $options = []): HttpResponseInterface
    {
        return $this->httpClient->post($path);
    }

    public function get(string $path, array $options = []): HttpResponseInterface
    {
        return $this->httpClient->get($path);
    }

    public function delete(string $path, array $options = []): HttpResponseInterface
    {
        return $this->httpClient->delete($path);
    }
}
