<?php
/*
 * LICENSE: This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
 * @copyright 2017 Copyright(c) - All rights reserved.
 *
 * @author YNLO-Ultratech Development Team <developer@ynloultratech.com>
 * @package prepaynation-api
 * @version 1.0.x-dev
 */

namespace YnloUltratech\PrepayNation\Service\GetCarrierInfoByMobileNumber;

use Rafrsr\GenericApi\ApiInterface;
use Rafrsr\GenericApi\ApiRequestBuilder;
use Rafrsr\LibArray2Object\Object2ArrayInterface;
use YnloUltratech\PrepayNation\PrepayNationApi;
use YnloUltratech\PrepayNation\Service\PrepayNationBaseService;

/**
 * Return a list of the valid carriers by the mobile Number
 */
class GetCarrierInfoByMobileNumber extends PrepayNationBaseService implements Object2ArrayInterface
{
    /**
     * @var string
     */
    protected $mobileNumber;

    /**
     * GetCarrierInfoByMobileNumber constructor.
     *
     * @param string $mobileNumber
     */
    public function __construct($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function buildRequest(ApiRequestBuilder $requestBuilder, ApiInterface $api)
    {
        parent::buildRequest($requestBuilder, $api);
        $requestBuilder->withMock(new GetCarrierInfoByMobileNumberMock());
    }

    /**
     * {@inheritdoc}
     */
    public function __toArray()
    {
        return [
            'version' => PrepayNationApi::VERSION,
            'mobile' => $this->mobileNumber,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getActionName()
    {
        return 'GetCarrierInfoByMobileNumber';
    }
}