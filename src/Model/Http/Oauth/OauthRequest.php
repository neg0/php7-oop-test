<?php

namespace App\Model\Http\Oauth;

use App\Model\Arrayable;

final class OauthRequest implements OauthRequestInterface, Arrayable
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var string
     */
    private $grantType;

    public function __construct(
        string $clientId,
        string $clientSecret,
        string $grantType = self::GRANT_TYPE_DEFAULT_VALUE
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->grantType = $grantType;
    }

    public function toArray(): array
    {
        return [
            self::FIELD_CLIENT_ID => $this->clientId,
            self::FIELD_CLIENT_SECRET => $this->clientSecret,
            self::FIELD_GRANT_TYPE => $this->grantType,
        ];
    }
}
