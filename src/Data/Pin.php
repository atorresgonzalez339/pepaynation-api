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
 * Class Pin
 */
class Pin
{
    /**
     * @var string
     */
    private $pinNumber;

    /**
     * @var string
     */
    private $controlNumber;

    /**
     * @return string
     */
    public function getPinNumber()
    {
        return $this->pinNumber;
    }

    /**
     * @param string $pinNumber
     *
     * @return $this
     */
    public function setPinNumber($pinNumber)
    {
        $this->pinNumber = $pinNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getControlNumber()
    {
        return $this->controlNumber;
    }

    /**
     * @param string $controlNumber
     *
     * @return $this
     */
    public function setControlNumber($controlNumber)
    {
        $this->controlNumber = $controlNumber;

        return $this;
    }
}