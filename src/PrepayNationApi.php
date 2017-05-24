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

namespace YnloUltratech\PrepayNation;

use GuzzleHttp\Exception\ServerException;
use Rafrsr\GenericApi\ApiServiceInterface;
use Rafrsr\GenericApi\Exception\ApiErrorHappenException;
use Rafrsr\GenericApi\GenericApi;
use Rafrsr\LibArray2Xml\XML2Array;
use YnloUltratech\PrepayNation\Data\Carrier;
use YnloUltratech\PrepayNation\Data\Sku;
use YnloUltratech\PrepayNation\Service\GetCarrierInfoByMobileNumber\GetCarrierInfoByMobileNumber;
use YnloUltratech\PrepayNation\Service\GetCarrierInfoByMobileNumber\GetCarrierInfoByMobileNumberResponse;
use YnloUltratech\PrepayNation\Service\BalanceInquiry\BalanceInquiry;
use YnloUltratech\PrepayNation\Service\BalanceInquiry\BalanceInquiryResponse;
use YnloUltratech\PrepayNation\Service\GetCarrierList\GetCarrierList;
use YnloUltratech\PrepayNation\Service\GetCarrierList\GetCarrierListResponse;
use YnloUltratech\PrepayNation\Service\GetSkuList\GetSkuList;
use YnloUltratech\PrepayNation\Service\GetSkuList\GetSkuListResponse;
use YnloUltratech\PrepayNation\Service\PurchasePin\PurchasePin;
use YnloUltratech\PrepayNation\Service\PurchasePin\PurchasePinResponse;
use YnloUltratech\PrepayNation\Service\PurchaseRtr\PurchaseRtr;
use YnloUltratech\PrepayNation\Service\PurchaseRtr\PurchaseRtrResponse;

/**
 * Class PrepayNationApi
 */
class PrepayNationApi extends GenericApi
{
    const VERSION = '1.0';

    /**
     * @var PrepayNationApiCredentials
     */
    private $credentials;

    /**
     * @return PrepayNationApiCredentials
     */
    public function getCredentials()
    {
        if (!$this->credentials) {
            return new PrepayNationApiCredentials();
        }

        return $this->credentials;
    }

    /**
     * @param PrepayNationApiCredentials $credentials
     *
     * @return $this
     */
    public function setCredentials(PrepayNationApiCredentials $credentials)
    {
        $this->credentials = $credentials;

        return $this;
    }

    /**
     * Return a list of the valid carriers by the mobile Number
     *
     * @param $mobileNumber
     *
     * @return Carrier[]
     */
    public function getCarrierInfoByMobileNumber($mobileNumber)
    {
        $response = $this->process(new GetCarrierInfoByMobileNumber($mobileNumber));

        return (new GetCarrierInfoByMobileNumberResponse($response))->getCarriers();
    }

    /**
     * Return a list of the valid carriers.
     *
     * @param null|string $countryCode
     * @param null|string $currencyCode
     *
     * @return Carrier[]
     */
    public function getCarrierList($countryCode = null, $currencyCode = null)
    {
        $response = $this->process(new GetCarrierList($countryCode, $currencyCode));

        return (new GetCarrierListResponse($response))->getCarriers();
    }

    /**
     * Return a list of valid skus.
     *
     * @param integer $carrierId filter by carrier
     *
     * @return Sku[]
     */
    public function getSkuList($carrierId = null)
    {
        $response = $this->process(new GetSkuList($carrierId));

        return (new GetSkuListResponse($response))->getSkus();
    }

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
     *
     * @return PurchaseRtrResponse
     */
    public function purchaseRTR($skuId, $amount, $mobile, $correlationId, $senderMobile = null, $storeId = null)
    {
        $response = $this->process(new PurchaseRtr($skuId, $amount, $mobile, $correlationId, $senderMobile, $storeId));

        return (new PurchaseRtrResponse($response));
    }

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
     *
     * @return PurchasePinResponse
     */
    public function purchasePin($skuId, $correlationId, $quantity = 1)
    {
        $response = $this->process(new PurchasePin($skuId, $correlationId, $quantity));

        return (new PurchasePinResponse($response));
    }

    public function balanceInquiry()
    {
        $response = $this->process(new BalanceInquiry());

        return (new BalanceInquiryResponse($response));
    }

    /**
     * {@inheritdoc}
     */
    public function process(ApiServiceInterface $service)
    {
        try {
            return parent::process($service);
        } catch (ServerException $e) {
            //Try to get PPN error,
            //when some error happen the server response with 500 and valid xml with error
            $response = $e->getResponse()->getBody()->getContents();
            if (strpos($response, 'soap:Envelope') !== false) {
                /** @var array $responseArray */
                $responseArray = XML2Array::createArray($response);
                $error = @$responseArray['soap:Envelope']['soap:Body']['soap:Fault']['soap:Reason']['soap:Text']['@value'];
                if ($error) {
                    throw new ApiErrorHappenException($error);
                }
            }

            throw $e;
        }
    }
}