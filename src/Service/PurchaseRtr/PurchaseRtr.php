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

namespace YnloUltratech\PrepayNation\Service\PurchaseRtr;

use Rafrsr\GenericApi\ApiInterface;
use Rafrsr\GenericApi\ApiRequestBuilder;
use YnloUltratech\PrepayNation\PrepayNationApi;
use YnloUltratech\PrepayNation\Service\PrepayNationBaseService;

/**
 * Class PurchaseRtr
 */
class PurchaseRtr extends PrepayNationBaseService
{
    /**
     * @var integer
     */
    private $skuId;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $correlationId;

    /**
     * @var string
     */
    private $senderMobile;

    /**
     * @var string
     */
    private $storeId;

    /**
     * PurchaseRtr constructor.
     *
     * @param int    $skuId         skuId of the Product. The SkuId can be obtained by the GetCarrierList and
     *                              GetSkuList API as described later in the document. For this method to
     *                              succeed the category of the carrier should be ‘RTR
     * @param float  $amount        Top-up Amount
     * @param string $mobile        Mobile number of the subscriber. For national carrier the phone number
     *                              should be a 10 digit in length. For international carriers, it should be as per
     *                              carrier guile line. The format will be made available in the Test Case
     *                              Attachments.
     * @param string $correlationId The length of this parameter should limit to 50 in length. The client system
     *                              can use this parameter to save information related to the transaction.
     *                              Most common use it to pass transaction number from the client system.
     *                              The value can be null.
     * @param string $senderMobile  Mobile Number of person recharging the international topup. This number
     *                              is required, when the recharge is international topup. This value can be
     *                              null if not available.
     * @param string $storeId       This is a non-mandatory field. However if you need to do transactions for
     *                              SPG products, you would need to have an ID assigned from the SPG and
     *                              that ID need to be passed. Otherwise for those transactions you will
     *                              receive an error code of 075.
     */
    public function __construct($skuId, $amount, $mobile, $correlationId, $senderMobile = null, $storeId = null)
    {
        $this->skuId = $skuId;
        $this->amount = $amount;
        $this->mobile = $mobile;
        $this->correlationId = $correlationId;
        $this->senderMobile = $senderMobile ?: $mobile;
        $this->storeId = $storeId;
    }

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
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     *
     * @return $this
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCorrelationId()
    {
        return $this->correlationId;
    }

    /**
     * @param mixed $correlationId
     *
     * @return $this
     */
    public function setCorrelationId($correlationId)
    {
        $this->correlationId = $correlationId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSenderMobile()
    {
        return $this->senderMobile;
    }

    /**
     * @param string $senderMobile
     *
     * @return $this
     */
    public function setSenderMobile($senderMobile)
    {
        $this->senderMobile = $senderMobile;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * @param mixed $storeId
     *
     * @return $this
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function buildRequest(ApiRequestBuilder $requestBuilder, ApiInterface $api)
    {
        parent::buildRequest($requestBuilder, $api);
        $requestBuilder->withMock(new PurchaseRtrMock());
    }

    /**
     * {@inheritdoc}
     */
    public function __toArray()
    {
        return [
            'version' => PrepayNationApi::VERSION,
            'skuId' => $this->getSkuId(),
            'amount' => $this->getAmount(),
            'mobile' => $this->getMobile(),
            'correlationId' => $this->getCorrelationId(),
            'senderMobile' => $this->getSenderMobile(),
            'storeId' => null,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getActionName()
    {
        return 'PurchaseRtr2';
    }
}