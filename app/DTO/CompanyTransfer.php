<?php

namespace App\DTO;

class CompanyTransfer
{
    /**
     * @var string
     */
    protected string $symbol;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @param string $symbol
     * @param string $name
     */
    public function __construct(string $symbol, string $name)
    {
        $this->symbol = $symbol;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
