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

namespace YnloUltratech\PrepayNation\Data;

/**
 * Class Invoice
 */
class Invoice
{
    /**
     * @var string
     */
    private $invoiceNumber;

    /**
     * @var \DateTime
     */
    private $transactionDateTime;

    /**
     * @var float
     */
    private $invoiceAmount = 0;

    /**
     * @var float
     */
    private $faceValueAmount = 0;

    /**
     * @var Card
     */
    private $card;

    /**
     * Invoice constructor.
     */
    public function __construct()
    {
        $this->transactionDateTime = new \DateTime();
        $this->card = new Card();
    }

    /**
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param string $invoiceNumber
     *
     * @return $this
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTransactionDateTime()
    {
        return $this->transactionDateTime;
    }

    /**
     * @param \DateTime $transactionDateTime
     *
     * @return $this
     */
    public function setTransactionDateTime($transactionDateTime)
    {
        $this->transactionDateTime = $transactionDateTime;

        return $this;
    }

    /**
     * @return float
     */
    public function getInvoiceAmount()
    {
        return $this->invoiceAmount;
    }

    /**
     * @param float $invoiceAmount
     *
     * @return $this
     */
    public function setInvoiceAmount($invoiceAmount)
    {
        $this->invoiceAmount = $invoiceAmount;

        return $this;
    }

    /**
     * @return float
     */
    public function getFaceValueAmount()
    {
        return $this->faceValueAmount;
    }

    /**
     * @param float $faceValueAmount
     *
     * @return $this
     */
    public function setFaceValueAmount($faceValueAmount)
    {
        $this->faceValueAmount = $faceValueAmount;

        return $this;
    }

    /**
     * @return Card
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param Card $card
     *
     * @return $this
     */
    public function setCard($card)
    {
        $this->card = $card;

        return $this;
    }
}