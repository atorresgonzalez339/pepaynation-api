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

use Rafrsr\LibArray2Object\Array2ObjectBuilder;
use YnloUltratech\PrepayNation\Data\Carrier;
use YnloUltratech\PrepayNation\Data\Sku;
use YnloUltratech\PrepayNation\PrepayNationApiResponse;

class GetCarrierInfoByMobileNumberResponse extends PrepayNationApiResponse
{
    /**
     * @var Carrier[]
     */
    private $carriers;

    /**
     * @inheritdoc
     */
    public function __construct($response)
    {
        parent::__construct($response);

        $carrierArray = @$this->getResponse()['soap:Envelope']['soap:Body']['GetCarrierInfoByMobileNumberResponse']['GetCarrierInfoByMobileNumberResult']['carrier'];
        $this->carriers = [];
        if (isset($carrierArray['@attributes']) && $data = $carrierArray['@attributes']) {
            /** @var Carrier $carrier */
            $carrier = Array2ObjectBuilder::create()->build()->createObject(Carrier::class, $data);
            if (isset($carrierArray['skus']) && $skusArray = $carrierArray['skus']) {
                $skus = [];

                //for multiple skus
                if (isset($skusArray['sku'][0])) {
                    $skusArray = $skusArray['sku'];
                }

                foreach ($skusArray as $skuArray) {
                    if (isset($skuArray['@attributes']) && $data = $skuArray['@attributes']) {
                        $skus[] = Array2ObjectBuilder::create()->build()->createObject(Sku::class, $data);
                    }
                }
                $carrier->setSkus($skus);
            }
            $this->carriers[] = $carrier;
        }
    }

    /**
     * @return \YnloUltratech\PrepayNation\Data\Carrier[]
     */
    public function getCarriers()
    {
        return $this->carriers;
    }

    /**
     * @param \YnloUltratech\PrepayNation\Data\Carrier[] $carriers
     *
     * @return $this
     */
    public function setCarriers($carriers)
    {
        $this->carriers = $carriers;

        return $this;
    }
}