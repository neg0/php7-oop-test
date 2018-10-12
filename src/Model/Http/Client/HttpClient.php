<?php

namespace App\Model\Http\Client;

use GuzzleHttp\Client;
use App\Model\Http\Response\HttpResponse;
use App\Model\Http\Response\HttpResponseInterface;

class HttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function post(string $path, array $options = []): HttpResponseInterface
    {
        $response = $this->client->request(self::METHOD_POST, $path, $options);

        return new HttpResponse(
            $response->getBody()->getContents(),
            $response->getStatusCode()
        );
    }

    public function get(string $path, array $options = []): HttpResponseInterface
    {
        $response = $this->client->request(self::METHOD_GET, $path, $options);

        return new HttpResponse(
            $response->getBody()->getContents(),
            $response->getStatusCode()
        );
    }

    public function delete(string $path, array $options = []): HttpResponseInterface
    {
        $response = $this->client->request(self::METHOD_DELETE, $path, $options);

        return new HttpResponse(
            $response->getBody()->getContents(),
            $response->getStatusCode()
        );
    }
}
