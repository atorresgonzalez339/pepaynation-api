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
 * Class Carrier
 */
class Carrier
{
    const CATEGORY_RTR = 'Rtr';
    const CATEGORY_PIN = 'Pin';

    /**
     * @var integer
     */
    private $carrierId;

    /**
     * @var string
     */
    private $carrierName;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $currencyCode;

    /**
     * @var integer
     */
    private $productId;

    /**
     * @var integer
     */
    private $operator;

    /**
     * @var string
     */
    private $denominationType;

    /**
     * @return int
     */
    public function getCarrierId()
    {
        return $this->carrierId;
    }

    /**
     * @param int $carrierId
     *
     * @return $this
     */
    public function setCarrierId($carrierId)
    {
        $this->carrierId = $carrierId;

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
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     *
     * @return $this
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return int
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param int $operator
     *
     * @return $this
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * @return string
     */
    public function getDenominationType()
    {
        return $this->denominationType;
    }

    /**
     * @param string $denominationType
     *
     * @return $this
     */
    public function setDenominationType($denominationType)
    {
        $this->denominationType = $denominationType;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRtr()
    {
        return $this->getCategory() === self::CATEGORY_RTR;
    }

    /**
     * @return bool
     */
    public function isPin()
    {
        return $this->getCategory() === self::CATEGORY_PIN;
    }
}