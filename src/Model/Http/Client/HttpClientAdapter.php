<?php

namespace App\Model\Http\Client;

use App\Model\Http\Config\HttpConfig;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use App\Model\Http\Response\HttpResponseInterface;

class HttpClientAdapter implements HttpClientInterface
{
    private const BASE_URI = 'https://death.star.api';
    private const SSL_KEY = '/etc/pki/private_key.pem';
    private const SSL_CRT = '/etc/pki/public_key.crt';

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct(HandlerStack $handler = null)
    {
        $config = new HttpConfig(self::BASE_URI, self::SSL_CRT, self::SSL_KEY);
        if ($handler instanceof HandlerStack) {
            $config->setHandlerTestingMock($handler);
        }

        $adapter = new Client($config->toArray());
        $this->httpClient = new HttpClient($adapter);
    }

    public function post(string $path, array $options = []): HttpResponseInterface
    {
        array_push($options, $this->createHeader());

        return $this->httpClient->post($path, $options);
    }

    public function get(string $path, array $options = []): HttpResponseInterface
    {
        array_push($options, $this->createHeader());

        return $this->httpClient->get($path, $options);
    }

    public function delete(string $path, array $options = []): HttpResponseInterface
    {
        array_push($options, $this->createHeader());
        $options['headers']['x-torpedoes'] = 2;

        return $this->httpClient->delete($path, $options);
    }

    private function createHeader(): array
    {
        $accessToken = filter_input(INPUT_SERVER, 'access_token');

        return [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Accept' => 'application/json',
            ]
        ];
    }
}
