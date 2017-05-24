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

namespace YnloUltratech\PrepayNation\Service\BalanceInquiry;

use Rafrsr\LibArray2Object\Array2ObjectBuilder;
use YnloUltratech\PrepayNation\Data\Carrier;
use YnloUltratech\PrepayNation\PrepayNationApiResponse;

/**
 * Class GetCarrierListResponse
 */
class BalanceInquiryResponse extends PrepayNationApiResponse
{
    private $balance;

    /**
     * @inheritdoc
     */
    public function __construct($response)
    {
        parent::__construct($response);

        $this->balance = @$this->getResponse()['soap:Envelope']['soap:Body']['BalanceInquiryResponse']['BalanceInquiryResult'];
    }

    public function getBalance()
    {
        return $this->balance;
    }
}