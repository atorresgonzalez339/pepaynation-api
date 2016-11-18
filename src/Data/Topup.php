<?php

/*
 * LICENSE: This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
 * @copyright 2016 Copyright(c) - All rights reserved.
 *
 * @author YNLO-Ultratech Development Team <developer@ynloultratech.com>
 * @package prepaynation-api
 * @version 1.0.x-dev
 */

namespace YnloUltratech\PrepayNation\Data;

/**
 * Class Topup
 */
class Topup
{
    /**
     * @var float
     */
    private $localCurrencyAmount = 0;

    /**
     * @var float
     */
    private $salesTaxAmount = 0;

    /**
     * @var float
     */
    private $localCurrencyAmountExcludingTax = 0;

    /**
     * @var string
     */
    private $localCurrencyName;

    /**
     * @var float
     */
    private $newAccountBalance;

    /**
     * @return float
     */
    public function getLocalCurrencyAmount()
    {
        return $this->localCurrencyAmount;
    }

    /**
     * @param float $localCurrencyAmount
     *
     * @return $this
     */
    public function setLocalCurrencyAmount($localCurrencyAmount)
    {
        $this->localCurrencyAmount = $localCurrencyAmount;

        return $this;
    }

    /**
     * @return float
     */
    public function getSalesTaxAmount()
    {
        return $this->salesTaxAmount;
    }

    /**
     * @param float $salesTaxAmount
     *
     * @return $this
     */
    public function setSalesTaxAmount($salesTaxAmount)
    {
        $this->salesTaxAmount = $salesTaxAmount;

        return $this;
    }

    /**
     * @return float
     */
    public function getLocalCurrencyAmountExcludingTax()
    {
        return $this->localCurrencyAmountExcludingTax;
    }

    /**
     * @param float $localCurrencyAmountExcludingTax
     *
     * @return $this
     */
    public function setLocalCurrencyAmountExcludingTax($localCurrencyAmountExcludingTax)
    {
        $this->localCurrencyAmountExcludingTax = $localCurrencyAmountExcludingTax;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocalCurrencyName()
    {
        return $this->localCurrencyName;
    }

    /**
     * @param string $localCurrencyName
     *
     * @return $this
     */
    public function setLocalCurrencyName($localCurrencyName)
    {
        $this->localCurrencyName = $localCurrencyName;

        return $this;
    }

    /**
     * @return float
     */
    public function getNewAccountBalance()
    {
        return $this->newAccountBalance;
    }

    /**
     * @param float $newAccountBalance
     *
     * @return $this
     */
    public function setNewAccountBalance($newAccountBalance)
    {
        $this->newAccountBalance = $newAccountBalance;

        return $this;
    }
}