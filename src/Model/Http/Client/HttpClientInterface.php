<?php

namespace App\Model\Http\Client;

use App\Model\Http\Response\HttpResponseInterface;

interface HttpClientInterface
{
    public const METHOD_POST = 'POST';
    public const METHOD_GET = 'GET';
    public const METHOD_DELETE = 'DELETE';

    public function post(string $path, array $options = []): HttpResponseInterface;

    public function get(string $path, array $options = []): HttpResponseInterface;

    public function delete(string $path, array $options = []): HttpResponseInterface;
}
