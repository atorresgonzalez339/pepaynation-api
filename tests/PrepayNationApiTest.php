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

namespace YnloUltratech\PrepayNation\Tests;

use YnloUltratech\PrepayNation\PrepayNationApi;

/**
 * Class PrepayNationApiTest
 */
class PrepayNationApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PrepayNationApi;
     */
    protected $api;

    protected function setUp()
    {
        $this->api = new PrepayNationApi(getenv('API_TEST_MODE'));
        $this->api->setCredentials(PrepayNationApiCredentialsTest::makeCredentials());
    }

    public function testGetSetCredentials()
    {
        $api = new PrepayNationApi();

        static::assertNull($api->getCredentials()->getUsername());
        $credentials = PrepayNationApiCredentialsTest::makeCredentials();
        $api->setCredentials($credentials);
        static::assertEquals($credentials, $api->getCredentials());
    }

    public function testGetCarrierList()
    {
        $carriers = $this->api->getCarrierList(null, 'USD');
        $carrier = $carriers[0];
        self::assertEquals('ATT', $carrier->getCarrierName());
    }

    public function testGetSkuList()
    {
        $skus = $this->api->getSkuList();
        $sku = $skus[0];
        self::assertEquals('Natcom Haiti $6-100', $sku->getProductName());
    }

    public function testPurchaseRTR()
    {
        $response = $this->api->purchaseRTR('1262', '1', '1111111111', time());
        self::assertEquals(15, $response->getInvoice()->getFaceValueAmount());
        self::assertEquals(14.850, $response->getInvoice()->getInvoiceAmount());
        self::assertEquals('USD', $response->getTopup()->getLocalCurrencyName());
        self::assertEquals(15, $response->getTopup()->getLocalCurrencyAmount());
    }

    public function testPurchasePin()
    {
        $response = $this->api->purchasePin('1262', time());
        self::assertEquals(15, $response->getInvoice()->getFaceValueAmount());
        self::assertEquals(14.850, $response->getInvoice()->getInvoiceAmount());
        self::assertEquals('10097505452535', $response->getInvoice()->getCard()->getFirstPin()->getPinNumber());
    }
}