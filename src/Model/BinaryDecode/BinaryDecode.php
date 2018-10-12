<?php

namespace App\Model\BinaryDecode;

use \Base2n;

class BinaryDecode implements BinaryDecodeInterface
{
    /**
     * @var Base2n
     */
    private $base2n;

    public function __construct(Base2n $base2n)
    {
        $this->base2n = $base2n;
    }

    public function convert(string $string): string
    {
        return $this->base2n->decode($string);
    }
}
