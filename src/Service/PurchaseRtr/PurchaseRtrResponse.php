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

use Rafrsr\LibArray2Object\Array2ObjectBuilder;
use YnloUltratech\PrepayNation\Data\Invoice;
use YnloUltratech\PrepayNation\Data\Topup;
use YnloUltratech\PrepayNation\PrepayNationApiResponse;

/**
 * Class PurchaseRtrResponse
 */
class PurchaseRtrResponse extends PrepayNationApiResponse
{
    /**
     * @var Invoice
     */
    private $invoice;

    /**
     * @var Topup
     */
    private $topup;

    /**
     * @inheritdoc
     */
    public function __construct($response)
    {
        parent::__construct($response);

        $orderResponse = @$this->getResponse()['soap:Envelope']['soap:Body']['PurchaseRtr2Response']['orderResponse'];
        if (isset($orderResponse['invoice']['@attributes']) && $invoice = $orderResponse['invoice']['@attributes']) {
            $this->invoice = Array2ObjectBuilder::create()->build()->createObject(Invoice::class, $invoice);
        } else {
            $this->invoice = new Invoice();
        }

        if (isset($orderResponse['topup']['@attributes']) && $topup = $orderResponse['topup']['@attributes']) {
            $this->topup = Array2ObjectBuilder::create()->build()->createObject(Topup::class, $topup);
        } else {
            $this->topup = new Topup();
        }
    }

    /**
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     *
     * @return $this
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return Topup
     */
    public function getTopup()
    {
        return $this->topup;
    }

    /**
     * @param Topup $topup
     *
     * @return $this
     */
    public function setTopup($topup)
    {
        $this->topup = $topup;

        return $this;
    }
}