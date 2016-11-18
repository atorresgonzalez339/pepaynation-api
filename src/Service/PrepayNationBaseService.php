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

namespace YnloUltratech\PrepayNation\Service;

use Rafrsr\GenericApi\ApiInterface;
use Rafrsr\GenericApi\ApiRequestBuilder;
use Rafrsr\GenericApi\ApiServiceInterface;
use Rafrsr\LibArray2Object\Object2ArrayBuilder;
use Rafrsr\LibArray2Xml\Array2XML;
use YnloUltratech\PrepayNation\PrepayNationApi;

/**
 * Class PrepayNationBaseService
 */
abstract class PrepayNationBaseService implements ApiServiceInterface
{
    /**
     * Get service action name
     *
     * @return string
     */
    abstract protected function getActionName();

    /**
     * {@inheritdoc}
     */
    public function buildRequest(ApiRequestBuilder $requestBuilder, ApiInterface $api)
    {
        /** @var PrepayNationApi $api */
        $data = Object2ArrayBuilder::create()->build()->createArray($this);
        $data['@attributes'] = ['xmlns' => 'http://www.pininteract.com'];

        $envelope = [
            '@attributes'   => [
                'xmlns:xsi'    => 'http://www.w3.org/2001/XMLSchema-instance',
                'xmlns:xsd'    => 'http://www.w3.org/2001/XMLSchema',
                'xmlns:soap12' => 'http://www.w3.org/2003/05/soap-envelope',
            ],
            'soap12:Header' => [
                'AuthenticationHeader' => [
                    '@attributes' => ['xmlns' => 'http://www.pininteract.com'],
                    'userId'      => $api->getCredentials()->getUsername(),
                    'password'    => $api->getCredentials()->getPassword(),
                ],
            ],
            'soap12:Body'   => [
                $this->getActionName() => $data,
            ],
        ];

        $xml = Array2XML::createXML('soap12:Envelope', $envelope)->saveXML();

        $requestBuilder
            ->withUri('http://www.valuetopup.com/posaservice/servicemanager.asmx')
            ->withMethod('POST')
            ->withXMLBody($xml);
    }
}