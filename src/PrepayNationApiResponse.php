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

use Psr\Http\Message\ResponseInterface;
use Rafrsr\GenericApi\Exception\ApiErrorHappenException;
use Rafrsr\LibArray2Xml\XML2Array;

/**
 * Class PrepayNationApiResponse
 */
class PrepayNationApiResponse
{
    /**
     * @var integer
     */
    private $errorCode;

    /**
     * @var string
     */
    private $errorMessage;

    private $xml;

    /**
     * @var array
     */
    private $response = [];

    /**
     * @param ResponseInterface|null $response
     *
     * @throws ApiErrorHappenException
     */
    public function __construct(ResponseInterface $response = null)
    {
        if ($response) {
            $this->setXml($response->getBody()->getContents());

            $this->response = XML2Array::createArray($this->getXml());

            $body = @$this->getResponse()['soap:Envelope']['soap:Body'];
            /** @var array $response */
            $response = array_values(array_values($body)[0])[0];
            if (isset($response['@attributes']) && $data = $response['@attributes']) {
                $errorCode = @$data['responseCode'];
                $responseMessage = @$data['responseMessage'];
                if ($errorCode && $errorCode > 0) {
                    $responseMessage = $responseMessage ?: 'Prepay Nation Error: '.$errorCode;
                    throw new ApiErrorHappenException($responseMessage, $errorCode);
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * @param mixed $xml
     *
     * @return $this
     */
    public function setXml($xml)
    {
        $this->xml = $xml;

        return $this;
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param array $response
     *
     * @return $this
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

}