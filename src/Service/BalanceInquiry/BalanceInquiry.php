<?php

namespace YnloUltratech\PrepayNation\Service\BalanceInquiry;

use Rafrsr\GenericApi\ApiInterface;
use Rafrsr\GenericApi\ApiRequestBuilder;
use Rafrsr\LibArray2Object\Object2ArrayInterface;
use YnloUltratech\PrepayNation\PrepayNationApi;
use YnloUltratech\PrepayNation\Service\PrepayNationBaseService;

/**
 * Class GetCarrierList
 */
class BalanceInquiry extends PrepayNationBaseService implements Object2ArrayInterface
{

    /**
     * {@inheritdoc}
     */
    public function buildRequest(ApiRequestBuilder $requestBuilder, ApiInterface $api)
    {
        parent::buildRequest($requestBuilder, $api);
        $requestBuilder->withMock(new BalanceInquiryMock());
    }

    /**
     * {@inheritdoc}
     */
    public function __toArray()
    {
        $request = [
            'version' => PrepayNationApi::VERSION,
        ];

        return $request;
    }

    /**
     * {@inheritdoc}
     */
    protected function getActionName()
    {
        return 'BalanceInquiry';
    }
}