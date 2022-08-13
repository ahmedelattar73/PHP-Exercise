<?php

namespace App\DTO;

class HistoricalDataTransfer
{
    /**
     * @var string
     */
    protected string $companySymbol;

    /**
     * @var ?int
     */
    protected ?int $date;

    /**
     * @var ?string
     */
    protected ?string $open;

    /**
     * @var string
     */
    protected ?string $high;

    /**
     * @var ?string
     */
    protected ?string $low;

    /**
     * @var ?string
     */
    protected ?string $close;

    /**
     * @var ?string
     */
    protected ?string $volume;

    /**
     * @param string $companySymbol
     * @param ?int $date
     * @param ?string $open
     * @param ?string $high
     * @param ?string $low
     * @param ?string $close
     * @param ?string $volume
     */
    public function __construct(
        string $companySymbol,
        ?int $date,
        ?string $open,
        ?string $high,
        ?string $low,
        ?string $close,
        ?string $volume
    ) {
        $this->companySymbol = $companySymbol;
        $this->date = $date;
        $this->open = $open;
        $this->high = $high;
        $this->low = $low;
        $this->close = $close;
        $this->volume = $volume;
    }

    /**
     * @return string
     */
    public function getCompanySymbol(): string
    {
        return $this->companySymbol;
    }

    /**
     * @param string $companySymbol
     */
    public function setCompanySymbol(string $companySymbol): void
    {
        $this->companySymbol = $companySymbol;
    }

    /**
     * @return ?int
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return ?string
     */
    public function getOpen(): ?string
    {
        return $this->open;
    }

    /**
     * @param string $open
     */
    public function setOpen(string $open): void
    {
        $this->open = $open;
    }

    /**
     * @return ?string
     */
    public function getHigh(): ?string
    {
        return $this->high;
    }

    /**
     * @param string $high
     */
    public function setHigh(string $high): void
    {
        $this->high = $high;
    }

    /**
     * @return ?string
     */
    public function getLow(): ?string
    {
        return $this->low;
    }

    /**
     * @param string $low
     */
    public function setLow(string $low): void
    {
        $this->low = $low;
    }

    /**
     * @return ?string
     */
    public function getClose(): ?string
    {
        return $this->close;
    }

    /**
     * @param string $close
     */
    public function setClose(string $close): void
    {
        $this->close = $close;
    }

    /**
     * @return ?string
     */
    public function getVolume(): ?string
    {
        return $this->volume;
    }

    /**
     * @param string $volume
     */
    public function setVolume(string $volume): void
    {
        $this->volume = $volume;
    }
}
