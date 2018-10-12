<?php

namespace App\Service\Prisoner;

use App\Model\Http\Client\HttpClientInterface;
use App\Model\Prisoner;

class PrisonerViewer
{
    private const PATH = '/prisoner';

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function view(string $slug): Prisoner
    {
        $response = $this->httpClient->get(self::PATH . "/{$slug}");

        return Prisoner::createFrom(\GuzzleHttp\json_decode($response->getBody(), true));
    }
}
