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
 * Class Sku
 */
class Sku
{
    /**
     * @var string
     */
    private $skuId;

    /**
     * @var string
     */
    private $productCode;

    /**
     * @var string
     */
    private $productName;

    /**
     * @var float
     */
    private $denomination;

    /**
     * @var float
     */
    private $minAmount;

    /**
     * @var float
     */
    private $maxAmount;

    /**
     * @var float
     */
    private $discount;

    /**
     * @var string
     */
    private $category;

    /**
     * @var boolean
     */
    private $isSalesTaxCharged;

    /**
     * @var float
     */
    private $exchangeRate;

    /**
     * @var float
     */
    private $bonusAmount;

    /**
     * @var string
     */
    private $currencyCode;

    /**
     * @var string
     */
    private $carrierName;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $localPhoneNumberLength;

    /**
     * @var string
     */
    private $internationalCodes;

    /**
     * @var boolean
     */
    private $allowDecimal;

    /**
     * @return string
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * @param string $skuId
     *
     * @return $this
     */
    public function setSkuId($skuId)
    {
        $this->skuId = $skuId;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param string $productCode
     *
     * @return $this
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     *
     * @return $this
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * @return float
     */
    public function getDenomination()
    {
        return $this->denomination;
    }

    /**
     * @param float $denomination
     *
     * @return $this
     */
    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;

        return $this;
    }

    /**
     * @return float
     */
    public function getMinAmount()
    {
        return $this->minAmount;
    }

    /**
     * @param float $minAmount
     *
     * @return $this
     */
    public function setMinAmount($minAmount)
    {
        $this->minAmount = $minAmount;

        return $this;
    }

    /**
     * @return float
     */
    public function getMaxAmount()
    {
        return $this->maxAmount;
    }

    /**
     * @param float $maxAmount
     *
     * @return $this
     */
    public function setMaxAmount($maxAmount)
    {
        $this->maxAmount = $maxAmount;

        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     *
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsSalesTaxCharged()
    {
        return $this->isSalesTaxCharged;
    }

    /**
     * @param boolean $isSalesTaxCharged
     *
     * @return $this
     */
    public function setIsSalesTaxCharged($isSalesTaxCharged)
    {
        $this->isSalesTaxCharged = $isSalesTaxCharged;

        return $this;
    }

    /**
     * @return float
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * @param float $exchangeRate
     *
     * @return $this
     */
    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    /**
     * @return float
     */
    public function getBonusAmount()
    {
        return $this->bonusAmount;
    }

    /**
     * @param float $bonusAmount
     *
     * @return $this
     */
    public function setBonusAmount($bonusAmount)
    {
        $this->bonusAmount = $bonusAmount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     *
     * @return $this
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }

    /**
     * @param string $carrierName
     *
     * @return $this
     */
    public function setCarrierName($carrierName)
    {
        $this->carrierName = $carrierName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     *
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocalPhoneNumberLength()
    {
        return $this->localPhoneNumberLength;
    }

    /**
     * @param string $localPhoneNumberLength
     *
     * @return $this
     */
    public function setLocalPhoneNumberLength($localPhoneNumberLength)
    {
        $this->localPhoneNumberLength = $localPhoneNumberLength;

        return $this;
    }

    /**
     * @return string
     */
    public function getInternationalCodes()
    {
        return $this->internationalCodes;
    }

    /**
     * @param string $internationalCodes
     *
     * @return $this
     */
    public function setInternationalCodes($internationalCodes)
    {
        $this->internationalCodes = $internationalCodes;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isAllowDecimal()
    {
        return $this->allowDecimal;
    }

    /**
     * @param boolean $allowDecimal
     *
     * @return $this
     */
    public function setAllowDecimal($allowDecimal)
    {
        $this->allowDecimal = $allowDecimal;

        return $this;
    }
}