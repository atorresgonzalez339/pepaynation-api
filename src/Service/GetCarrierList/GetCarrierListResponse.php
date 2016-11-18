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

use Rafrsr\LibArray2Object\Array2ObjectBuilder;
use YnloUltratech\PrepayNation\Data\Carrier;
use YnloUltratech\PrepayNation\PrepayNationApiResponse;

/**
 * Class GetCarrierListResponse
 */
class GetCarrierListResponse extends PrepayNationApiResponse
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

        $carriersArray = @$this->getResponse()['soap:Envelope']['soap:Body']['GetCarrierList2Response']['carrierListResponse']['carriers']['carrier'];
        $this->carriers = [];
        if ($carriersArray && is_array($carriersArray)) {
            foreach ($carriersArray as $carrierArray) {
                if (isset($carrierArray['@attributes']) && $data = $carrierArray['@attributes']) {
                    $this->carriers[] = Array2ObjectBuilder::create()->build()->createObject(Carrier::class, $data);
                }
            }
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