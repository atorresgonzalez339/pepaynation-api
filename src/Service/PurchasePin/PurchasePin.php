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

namespace YnloUltratech\PrepayNation\Service\PurchasePin;

use Rafrsr\GenericApi\ApiInterface;
use Rafrsr\GenericApi\ApiRequestBuilder;
use YnloUltratech\PrepayNation\PrepayNationApi;
use YnloUltratech\PrepayNation\Service\PrepayNationBaseService;

/**
 * Class PurchasePin
 */
class PurchasePin extends PrepayNationBaseService
{
    /**
     * @var integer
     */
    private $skuId;

    /**
     * @var float
     */
    private $quantity;

    /**
     * @var string
     */
    private $correlationId;

    /**
     * @param int     $skuId         skuId of the Product. The SkuId can be obtained by the GetCarrierList and
     *                               GetSkuList API as described later in the document. For this method to
     *                               succeed the category of the carrier should be ‘RTR
     * @param string  $correlationId The length of this parameter should limit to 50 in length. The client system
     *                               can use this parameter to save information related to the transaction.
     *                               Most common use it to pass transaction number from the client system.
     *                               The value can be null.
     * @param integer $quantity      Number of quantities requested. Currently, only a value
     *                               of ‘1’ is supported. In future higher quantities will be
     *                               supported.
     */
    public function __construct($skuId, $correlationId, $quantity = 1)
    {
        $this->skuId = $skuId;
        $this->quantity = $quantity;
        $this->correlationId = $correlationId;
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
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

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
     * {@inheritdoc}
     */
    public function buildRequest(ApiRequestBuilder $requestBuilder, ApiInterface $api)
    {
        parent::buildRequest($requestBuilder, $api);
        $requestBuilder->withMock(new PurchasePinMock());
    }

    /**
     * {@inheritdoc}
     */
    public function __toArray()
    {
        return [
            'version' => PrepayNationApi::VERSION,
            'skuId' => $this->getSkuId(),
            'quantity' => $this->getQuantity(),
            'correlationId' => $this->getCorrelationId(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getActionName()
    {
        return 'PurchasePin';
    }
}