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

use Rafrsr\LibArray2Object\Array2ObjectBuilder;
use YnloUltratech\PrepayNation\Data\Card;
use YnloUltratech\PrepayNation\Data\Invoice;
use YnloUltratech\PrepayNation\Data\Pin;
use YnloUltratech\PrepayNation\PrepayNationApiResponse;

/**
 * Class PurchasePinResponse
 */
class PurchasePinResponse extends PrepayNationApiResponse
{
    /**
     * @var Invoice
     */
    protected $invoice;

    /**
     * {@inheritdoc}
     */
    public function __construct($response)
    {
        parent::__construct($response);

        $orderResponse = @$this->getResponse()['soap:Envelope']['soap:Body']['PurchasePinResponse']['orderResponse'];
        if (isset($orderResponse['invoice']) && $invoice = $orderResponse['invoice']) {
            $this->invoice = $this->createInvoiceFromData($orderResponse['invoice']);
        } else {
            $this->invoice = new Invoice();
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
     * createInvoiceFromData
     *
     * @param $data
     *
     * @return Invoice
     */
    private function createInvoiceFromData($data)
    {
        /** @var Invoice $invoice */
        $invoice = $this->createObjectFromDataAttr(Invoice::class, $data);

        if (isset($data['cards']['card']) && is_array($data['cards']['card'])) {
            $card = $this->createCardFromData($data['cards']['card']);
            $invoice->setCard($card);
        }

        return $invoice;
    }

    /**
     * createCardFromData
     *
     * @param $data
     *
     * @return Card
     */
    private function createCardFromData($data)
    {
        /** @var Card $card */
        $card = $this->createObjectFromDataAttr(Card::class, $data);
        if (isset($data['pins']['pin']) && is_array($data['pins']['pin'])) {

            if (isset($data['pins']['pin']['@attributes'])) {
                $pins = [$data['pins']['pin']];
            } else {
                $pins = $data['pins']['pin'];
            }

            foreach ($pins as $pin) {
                $pin = $this->createObjectFromDataAttr(Pin::class, $pin);
                $card->addPin($pin);
            }
        }

        return $card;
    }

    /**
     * createObjectFromDataAttr
     *
     * @param string $class
     * @param array  $data
     *
     * @return object
     */
    private function createObjectFromDataAttr($class, $data)
    {
        if (isset($data['@attributes']) && $data['@attributes']) {
            $object = Array2ObjectBuilder::create()->build()->createObject($class, $data['@attributes']);
        } else {
            $object = new $class;
        }

        return $object;
    }
}