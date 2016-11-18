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

namespace YnloUltratech\PrepayNation\Service\GetCarrierList;

use Rafrsr\GenericApi\ApiInterface;
use Rafrsr\GenericApi\ApiRequestBuilder;
use Rafrsr\LibArray2Object\Object2ArrayInterface;
use YnloUltratech\PrepayNation\PrepayNationApi;
use YnloUltratech\PrepayNation\Service\PrepayNationBaseService;

/**
 * Class GetCarrierList
 */
class GetCarrierList extends PrepayNationBaseService implements Object2ArrayInterface
{
    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $currencyCode;

    /**
     * GetCarrierList constructor.
     *
     * @param string $countryCode
     * @param string $currencyCode
     */
    public function __construct($countryCode = null, $currencyCode = null)
    {
        $this->countryCode  = $countryCode;
        $this->currencyCode = $currencyCode;
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
     * {@inheritdoc}
     */
    public function buildRequest(ApiRequestBuilder $requestBuilder, ApiInterface $api)
    {
        parent::buildRequest($requestBuilder, $api);
        $requestBuilder->withMock(new GetCarrierListMock());
    }

    /**
     * {@inheritdoc}
     */
    public function __toArray()
    {
        $request = [
            'version' => PrepayNationApi::VERSION,
        ];

        if ($this->getCountryCode()) {
            $request['countryCode'] = $this->getCountryCode();
        }

        if ($this->getCurrencyCode()) {
            $request['currencyCode'] = $this->getCurrencyCode();
        }

        return $request;
    }

    /**
     * {@inheritdoc}
     */
    protected function getActionName()
    {
        return 'GetCarrierList2';
    }
}