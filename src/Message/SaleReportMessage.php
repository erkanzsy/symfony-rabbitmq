<?php

namespace App\Message;

class SaleReportMessage
{
    /**
     * @var string $type
     */
    private $type;

    /**
     * @var float $amount
     */
    private $amount;

    /**
     * @var string $userName
     */
    private $userName;

    /**
     * @var string $address
     */
    private $address;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return SaleReportMessage
     */
    public function setType(string $type): SaleReportMessage
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return SaleReportMessage
     */
    public function setAmount(float $amount): SaleReportMessage
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return SaleReportMessage
     */
    public function setUserName(string $userName): SaleReportMessage
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return SaleReportMessage
     */
    public function setAddress(string $address): SaleReportMessage
    {
        $this->address = $address;
        return $this;
    }
}