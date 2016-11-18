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
 * Class Card
 */
class Card
{
    /**
     * @var integer
     */
    protected $skuId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $faceValue;

    /**
     * @var Pin[]
     */
    protected $pins = [];

    /**
     * @return int
     */
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * @param int $skuId
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getFaceValue()
    {
        return $this->faceValue;
    }

    /**
     * @param float $faceValue
     *
     * @return $this
     */
    public function setFaceValue($faceValue)
    {
        $this->faceValue = $faceValue;

        return $this;
    }

    /**
     * addPin
     *
     * @param Pin $pin
     */
    public function addPin($pin)
    {
        $this->pins[] = $pin;
    }

    /**
     * @return Pin[]
     */
    public function getPins()
    {
        return $this->pins;
    }

    /**
     * hasPins
     *
     * @return bool
     */
    public function hasPins()
    {
        return (boolean)count($this->pins);
    }

    /**
     * getFirstPin
     *
     * @return Pin
     */
    public function getFirstPin()
    {
        foreach ($this->pins as $pin) {
            return $pin;
        }

        throw new \LogicException('This card don`t have at least one PIN to get.');
    }

    /**
     * @param Pin[] $pins
     *
     * @return $this
     */
    public function setPins($pins)
    {
        $this->pins = $pins;

        return $this;
    }
}