<?php

namespace App\Model\Http\Response;

interface HttpResponseInterface
{
    public const FIELD_BODY = 'body';
    public const FIELD_CODE = 'code';

    public function getBody(): string;
    public function getCode(): int;
}
