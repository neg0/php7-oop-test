<?php

namespace App\Model\Http\Response;

use App\Model\Arrayable;

final class HttpResponse implements HttpResponseInterface, Arrayable
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var integer
     */
    private $code;

    public function __construct(string $body, int $code)
    {
        $this->body = $body;
        $this->code = $code;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function toArray(): array
    {
        return [
            self::FIELD_BODY => $this->body,
            self::FIELD_CODE => $this->code,
        ];
    }
}
