<?php

namespace App\Service\Auth;

use App\Model\Http\Client\HttpClientInterface;
use App\Model\Http\Oauth\OauthRequest;
use App\Model\Http\Token\AuthToken;

class TokenAuthentication
{
    private const PATH = '/token';

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function authenticate(string $clientId, string $clientSecret): ?AuthToken
    {
        $oauthRequest = new OauthRequest($clientId, $clientSecret);
        $options = [ 'form_params' => $oauthRequest->toArray() ];

        try {
            $response = $this->httpClient->post(self::PATH, $options);

            return AuthToken::createFrom(\GuzzleHttp\json_decode($response->getBody(), true));
        } catch (\Throwable $exception) {
            error_log(self::class . $exception->getTraceAsString(), $exception->getCode());
        }

        return null;
    }
}
