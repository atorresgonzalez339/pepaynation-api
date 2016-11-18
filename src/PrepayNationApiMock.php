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

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Rafrsr\GenericApi\ApiMockInterface;
use Rafrsr\LibArray2Xml\XML2Array;

/**
 * Class PrepayNationApiMock
 */
abstract class PrepayNationApiMock implements ApiMockInterface
{
    /**
     * @inheritDoc
     */
    public function mock(RequestInterface $request)
    {
        $xml = $request->getBody()->getContents();
        /** @var array $requestArray */
        $requestArray = XML2Array::createArray($xml);
        $body         = $requestArray['soap12:Envelope']['soap12:Body'];
        $action       = current(array_keys($body));

        try {
            $responseData = $this->mockService([]);
        } catch (\RuntimeException $e) {
            return new Response(500, [], \GuzzleHttp\Psr7\stream_for($e->getMessage()));
        } catch (\Exception $e) {
            $responseData = [
                'Header' => [
                    'a:Error' => [
                        'a:ErrorCode'    => $e->getCode() ?: 99,
                        'a:ErrorMessage' => $e->getTraceAsString(),
                    ],
                ],
            ];
        }

        if ( ! $responseData) {
            throw new \Exception(sprintf('Invalid mock response for %s', $action));
        }

        if (is_array($responseData)) {
           //TODO: create response from array response
            $response = null;
        } else {
            $response = $responseData;
        }

        return new Response(200, [], \GuzzleHttp\Psr7\stream_for($response));
    }

    /**
     * @param $filename
     *
     * @return string
     */
    protected function loadFixture($filename)
    {
        $filename = implode(DIRECTORY_SEPARATOR, [__DIR__, 'Fixtures', $filename]);

        return file_get_contents($filename);
    }

    /**
     * mockService
     *
     * @param array $data
     *
     * @return mixed
     */
    abstract protected function mockService($data);
}