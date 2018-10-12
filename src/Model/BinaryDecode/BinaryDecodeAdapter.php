<?php

namespace App\Model\BinaryDecode;

use \Base2n;

class BinaryDecodeAdapter implements BinaryDecodeInterface
{
    private const BITS_PER_CHAR = 1;

    /**
     * @var BinaryDecodeInterface
     */
    private $decoder;

    public function __construct()
    {
        $adapter = new Base2n(self::BITS_PER_CHAR);
        $this->decoder = new BinaryDecode($adapter);
    }

    public function convert(string $binary): string
    {
        return $this->decoder->convert($binary);
    }
}
