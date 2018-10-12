<?php

namespace App\Model\Http\Token;

interface AuthTokenInterface
{
    public const FIELD_ACCESS_TOKEN = 'access_token';
    public const FIELD_EXPIRES_IN = 'expires_in';
    public const FIELD_TOKEN_TYPE = 'token_type';
    public const FIELD_SCOPE = 'scope';
}
