<?php

namespace App\Model\BinaryDecode;

interface BinaryDecodeInterface
{
    public function convert(string $string): string;
}
