<?php

namespace App\Service;

use App\Model\BinaryDecode\BinaryDecodeInterface;

class BinaryDecodeService implements BinaryDecodeInterface
{
    /**
     * @var BinaryDecodeInterface
     */
    private $decoder;

    public function __construct(BinaryDecodeInterface $decoder)
    {
        $this->decoder = $decoder;
    }

    public function convert(string $string): string
    {
        return $this->decoder->convert($string);
    }
}
