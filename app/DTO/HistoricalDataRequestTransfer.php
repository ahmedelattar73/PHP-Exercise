<?php

namespace App\DTO;

class HistoricalDataRequestTransfer
{
    /**
     * @var string
     */
    protected string $symbol;
    /**
     * @var string
     */
    protected string $startDate;
    /**
     * @var string
     */
    protected string $endDate;
    /**
     * @var string
     */
    protected string $email;

    /**
     * @param string $symbol
     * @param string $startDate
     * @param string $endDate
     * @param string $email
     */
    public function __construct(string $symbol, string $startDate, string $endDate, string $email)
    {
        $this->symbol = $symbol;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->email = $email;
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
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
