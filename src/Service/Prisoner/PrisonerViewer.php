<?php

namespace App\Service\Prisoner;

use App\Model\Prisoner;
use App\Service\HttpClientService;

class PrisonerViewer
{
    private const PATH = '/prisoner';

    /**
     * @var HttpClientService
     */
    private $httpClient;

    public function __construct(HttpClientService $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function view(string $slug): Prisoner
    {
        $response = $this->httpClient->get(self::PATH . "/{$slug}");

        return Prisoner::createFrom(\GuzzleHttp\json_decode($response->getBody(), true));
    }
}
