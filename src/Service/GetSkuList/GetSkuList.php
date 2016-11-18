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

namespace YnloUltratech\PrepayNation\Service\GetSkuList;

use Rafrsr\GenericApi\ApiInterface;
use Rafrsr\GenericApi\ApiRequestBuilder;
use Rafrsr\LibArray2Object\Object2ArrayInterface;
use YnloUltratech\PrepayNation\PrepayNationApi;
use YnloUltratech\PrepayNation\Service\PrepayNationBaseService;

/**
 * Class GetSkuList
 */
class GetSkuList extends PrepayNationBaseService implements Object2ArrayInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildRequest(ApiRequestBuilder $requestBuilder, ApiInterface $api)
    {
        parent::buildRequest($requestBuilder, $api);
        $requestBuilder->withMock(new GetSkuListMock());
    }

    /**
     * {@inheritdoc}
     */
    public function __toArray()
    {
        return [
            'version' => PrepayNationApi::VERSION,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getActionName()
    {
        return 'GetSkuList';
    }
}