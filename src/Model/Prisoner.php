<?php

namespace App\Model;

class Prisoner implements ArrayCollection
{
    /**
     * @var string
     */
    private $cell;

    /**
     * @var string
     */
    private $block;

    public function __construct(string $cell, string $block)
    {
        $this->cell = $cell;
        $this->block = $block;
    }

    public static function createFrom(array $data): self
    {
        return new self($data['cell'], $data['block']);
    }

    public function getCell(): string
    {
        return $this->cell;
    }

    public function getBlock(): string
    {
        return $this->block;
    }
}
