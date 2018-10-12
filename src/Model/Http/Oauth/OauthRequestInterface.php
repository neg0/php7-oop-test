<?php

namespace App\Model\Http\Oauth;

interface OauthRequestInterface
{
    public const GRANT_TYPE_DEFAULT_VALUE = 'client_credentials';
    public const FIELD_CLIENT_SECRET = 'Client_Secret';
    public const FIELD_CLIENT_ID = 'Client_ID';
    public const FIELD_GRANT_TYPE = 'grant_type';
}
