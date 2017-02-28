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

use Rafrsr\LibArray2Object\Array2ObjectBuilder;
use YnloUltratech\PrepayNation\Data\Sku;
use YnloUltratech\PrepayNation\PrepayNationApiResponse;

/**
 * Class GetSkuListResponse
 */
class GetSkuListResponse extends PrepayNationApiResponse
{
    /**
     * @var Sku[]
     */
    private $skus;

    /**
     * @inheritdoc
     */
    public function __construct($response)
    {
        parent::__construct($response);

        if (isset($this->getResponse()['soap:Envelope']['soap:Body']['GetSkuListResponse']['GetSkuListResult']['skus']['sku'][0])) {
            $skuArray = @$this->getResponse()['soap:Envelope']['soap:Body']['GetSkuListResponse']['GetSkuListResult']['skus']['sku'];
        } else {
            $skuArray = @$this->getResponse()['soap:Envelope']['soap:Body']['GetSkuListResponse']['GetSkuListResult']['skus'];
        }
        if (!$skuArray) {
            if (isset($this->getResponse()['soap:Envelope']['soap:Body']['GetSkuListByCarrierResponse']['GetSkuListByCarrierResult']['skus']['sku'][0])) {
                $skuArray = @$this->getResponse()['soap:Envelope']['soap:Body']['GetSkuListByCarrierResponse']['GetSkuListByCarrierResult']['skus']['sku'];
            } else {
                $skuArray = @$this->getResponse()['soap:Envelope']['soap:Body']['GetSkuListByCarrierResponse']['GetSkuListByCarrierResult']['skus'];
            }
        }
        $this->skus = [];
        if ($skuArray && is_array($skuArray)) {
            foreach ($skuArray as $carrierArray) {
                if (isset($carrierArray['@attributes']) && $data = $carrierArray['@attributes']) {
                    $this->skus[] = Array2ObjectBuilder::create()->build()->createObject(Sku::class, $data);
                }
            }
        }
    }

    /**
     * @return Sku[]
     */
    public function getSkus()
    {
        return $this->skus;
    }

    /**
     * @param Sku[] $skus
     *
     * @return $this
     */
    public function setSkus($skus)
    {
        $this->skus = $skus;

        return $this;
    }
}